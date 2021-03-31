<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $id = 1;
        $event = DB::table('events')
        ->where('id', $id)
        ->first();

            $obj = DB::table('questions')
                ->where('cat_id', $event->ex_id)
                ->orderBy('qu_sort', 'asc')
                ->get();

                $data['obj'] = $obj;


            $objs = DB::table('get_users')
                    ->where('status2', $id)
                    ->get();

        

                if(isset($objs)){
                    foreach($objs as $u){

                        $answers = DB::table('answers')
                        ->where('user_id', $u->id)
                        ->get();

                        if(isset($answers)){
                            foreach($answers as $j){
                                
                                if($j->answers != null){
                                if($j->type == 0){
                                    $event = DB::table('options')
                                        ->where('id', $j->answers)
                                        ->first();

                                        $j->my_ans = $event->op_name;
                                }
                            }else{
                                $j->my_ans = "ไม่ได้ตอบในข้อนี้";
                            }
                                

                            }
                        }

                        $u->ans = $answers;

                    }
                }

        return $objs;
    }
}
