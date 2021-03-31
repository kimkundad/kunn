<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\event;
use App\get_user;
use Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = DB::table('events')
                ->Orderby('id', 'desc')
                ->paginate(15);

        $data['objs'] = $objs;
        return view('admin.events.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ex = DB::table('exercises')->get();
        $data['ex'] = $ex;

        $data['method'] = "post";
        $data['url'] = url('admin/events');
        return view('admin.events.create', $data);
    }


    public function events_status(Request $request){

        //  dd($request->all());
    
          $user = event::findOrFail($request->user_id);
    
                  if($user->status == 1){
                      $user->status = 0;
                  } else {
                      $user->status = 1;
                  }
    
          return response()->json([
          'data' => [
            'success' => $user->save(),
          ]
        ]);
    
        }


        public function getuser_status(Request $request){

            //  dd($request->all());
        
              $user = get_user::findOrFail($request->user_id);
        
                      if($user->status == 1){
                          $user->status = 0;
                      } else {
                          $user->status = 1;
                      }
        
              return response()->json([
              'data' => [
                'success' => $user->save(),
              ]
            ]);
        
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
        
        $image = $request->file('image');

        $this->validate($request, [
             'image' => 'required',
             'name' => 'required',
             'detail' => 'required',
             'type' => 'required',
             'start_event_date' => 'required',
             'start_event_time' => 'required'
         ]);

        $path = 'img/events/';
        $filename = time().'.'.$image->getClientOriginalExtension();
        $image->move($path, $filename);

      $package = new event();
      $package->name = $request['name'];
      $package->start_event_date = $request['start_event_date'];
      $package->end_event_date = $request['end_event_date'];
      $package->start_event_time = $request['start_event_time'];
      $package->detail = $request['detail'];
      $package->total = $request['total'];
      $package->type = $request['type'];
      $package->image = $filename;
      $package->name_address = $request['name_address'];
      $package->address = $request['address'];
      $package->ex_id = $request['ex_id'];
      $package->save();

      return redirect(url('admin/events/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_user_event($id)
    {

        $obj = DB::table('get_users')
                ->where('status2', $id)
                ->paginate(15);

        $data['obj'] = $obj;


        //
        $objs = event::find($id);

        $data['objs'] = $objs;

        return view('admin.events.get_user_event', $data);
    }

    public function report_event($id)
    {
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

                $data['objs'] = $objs;

        return view('admin.events.report_event', $data);
    }


    public function random_user5($id){


        $obj = get_user::inRandomOrder()->limit(5)->get();

        $data['obj'] = $obj;


        //
        $objs = event::find($id);

        $data['objs'] = $objs;

        return view('admin.events.random_user5', $data);
    }

    public function random_user10($id){


        $obj = get_user::inRandomOrder()->limit(10)->get();

        $data['obj'] = $obj;


        //
        $objs = event::find($id);

        $data['objs'] = $objs;

        return view('admin.events.random_user10', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $ex = DB::table('exercises')->get();
        $data['ex'] = $ex;            
        //
        $objs = event::find($id);

        $data['url'] = url('admin/events/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.events.edit', $data);
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
        $image = $request->file('image');

        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
            'type' => 'required',
            'start_event_date' => 'required',
            'start_event_time' => 'required'
        ]);


        $package = event::find($id);
        $package->name = $request['name'];
        $package->start_event_date = $request['start_event_date'];
        $package->end_event_date = $request['end_event_date'];
        $package->start_event_time = $request['start_event_time'];
        $package->detail = $request['detail'];
        $package->total = $request['total'];
        $package->type = $request['type'];
        $package->name_address = $request['name_address'];
        $package->address = $request['address'];
        $package->ex_id = $request['ex_id'];
        $package->save();



        if($image != NULL){

            $objs = DB::table('events')
               ->where('id', $id)
               ->first();

               if(isset($objs->image)){
                $file_path = 'img/events/'.$objs->image;
                 unlink($file_path);
              }

       $path = 'img/events/';
       $filename = time().'.'.$image->getClientOriginalExtension();
       $image->move($path, $filename);

     $package = event::find($id);
     $package->name = $request['name'];
     $package->start_event_date = $request['start_event_date'];
     $package->end_event_date = $request['end_event_date'];
     $package->start_event_time = $request['start_event_time'];
     $package->detail = $request['detail'];
     $package->total = $request['total'];
     $package->type = $request['type'];
     $package->image = $filename;
     $package->name_address = $request['name_address'];
     $package->address = $request['address'];
     $package->ex_id = $request['ex_id'];
     $package->save();

        }

     return redirect(url('admin/events/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_events($id)
    {
        //

        $objs = DB::table('events')
            ->where('id', $id)
            ->first();

            if(isset($objs->image)){
              $file_path = 'img/events/'.$objs->image;
               unlink($file_path);
            }

             DB::table('events')->where('id', $id)->delete();

             return redirect(url('admin/events'))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function del_user_event_ans($id){

        $user = DB::table('get_users')
        ->where('id', $id)
        ->first();

        DB::table('get_users')->where('id', $id)->delete();
        DB::table('answers')->where('user_id', $user->id)->delete();
        return redirect(url('admin/get_user_event/'.$user->status2))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }
}
