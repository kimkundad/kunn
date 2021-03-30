<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\event;
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
    public function show($id)
    {
        //
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
}