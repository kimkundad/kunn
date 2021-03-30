<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\exercise;
use App\question;
use App\option;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $objs = DB::table('exercises')
                ->Orderby('id', 'desc')
                ->paginate(15);

                foreach ($objs as $u) {
                    $options = DB::table('questions')->where('cat_id',$u->id)->count();
                    $u->option = $options;
                }

        $data['objs'] = $objs;
        return view('admin.example.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.example.create');
    }


    public function add_example(Request $request){

        $this->validate($request, [
            'ex_name' => 'required'
        ]);
    
    
          $package = new exercise();
          $package->ex_name = $request['ex_name'];
          $package->ex_detail = $request['ex_detail'];
          $package->save();
    
          return redirect(url('admin/example/'.$package->id.'/show'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $obj = DB::table('questions')
            ->where('cat_id', $id)
            ->orderBy('qu_sort', 'asc')
            ->get();

        $optionsRes = [];
        foreach ($obj as $u) {
            $options = DB::table('options')->where('qu_id',$u->id)->get();
            $u->option = $options;
        }

        $objs = exercise::find($id);
        //dd($obj);
        $data['objs'] = $objs;
        $data['obj'] = $obj;

        return view('admin.example.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $objs = exercise::find($id);
        $data['objs'] = $objs;

        return view('admin.example.edit', $data);
    }

    public function updatesort(Request $request, $id){

        $sort_order = $request['sort_order'];
        $sort_order = json_decode($sort_order,true);
        foreach($sort_order as $index=>$ids) {

            $obj = DB::table('questions')
            ->where('id', $ids['id'])
            ->update(array('qu_sort' => ($index + 1) ));

        }

        return redirect(url('admin/example/'.$id.'/show'))->with('edit_success','ทำการเรียงลำดับคำถามใหม่เรียบร้อยแล้ว');

    }


    public function post_edit_example(Request $request, $id){

        $this->validate($request, [
            'ex_name' => 'required'
        ]);

            $package = exercise::find($id);
            $package->ex_name = $request['ex_name'];
            $package->ex_detail = $request['ex_detail'];
            $package->save();

        return redirect(url('admin/edit_example/'.$id.'/edit'))->with('edit_success','เพิ่ม เสร็จเรียบร้อยแล้ว');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function add_question(Request $request){

        $this->validate($request, [
            'qu_name' => 'required'
        ]);

            $obj = new question();
            $obj->qu_name = $request['qu_name'];
            $obj->type = $request['type'];
            $obj->cat_id = $request['q_id'];
            $obj->save();

            $the_id = $obj->id;
            $name_option = request()->get('name_option');

            if($the_id){
                if (count($name_option) > 0) {
                           for ($i = 0; $i < count($name_option); $i++) {
    
                             $option = new option();
                             $option->qu_id = $the_id;
                             $option->op_name = $name_option[$i];
                             $option->save();
       
                           }
       
                       }
                    }

            return redirect(url('admin/example/'.$request['q_id'].'/show'))->with('add_success','เพิ่มแบบสอบถาม สำเร็จ');

    }


    public function add_question2(Request $request){

        $this->validate($request, [
            'qu_name' => 'required'
        ]);

            $obj = new question();
            $obj->qu_name = $request['qu_name'];
            $obj->type = $request['type'];
            $obj->cat_id = $request['q_id'];
            $obj->save();

            return redirect(url('admin/example/'.$request['q_id'].'/show'))->with('add_success','เพิ่มแบบสอบถาม สำเร็จ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_example($id)
    {
        //
        $obj = exercise::find($id);
        $obj->delete();
        return redirect(url('admin/example/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
