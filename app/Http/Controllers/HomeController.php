<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\blog;
use App\get_user;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $event = DB::table('events')
                ->where('status', 1)
                ->Orderby('id', 'desc')
                ->get();

                

        $data['event'] = $event;

        return view('welcome', $data);
    }

    public function about()
    {
        return view('about');
    }

    public function thx_you()
    {
        return view('thx_you');
    }

    

    public function events_id($id){

        $event = DB::table('events')
                ->where('id', $id)
                ->first();

        $data['event'] = $event;

        $obj = DB::table('questions')
            ->where('cat_id', $event->ex_id)
            ->orderBy('qu_sort', 'asc')
            ->get();

        $optionsRes = [];
        foreach ($obj as $u) {
            $options = DB::table('options')->where('qu_id',$u->id)->get();
            $u->option = $options;
        }
        $s = 1;
        $data['obj'] = $obj;
        $data['s'] = $s;
       // dd($obj);

        return view('event_detail', $data);
    }

    public function events(){
        $event = DB::table('events')
                ->where('status', 1)
                ->Orderby('id', 'desc')
                ->get();

        $data['event'] = $event;

        return view('events', $data);
    }


    public function add_data_user(Request $request){

        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

      $package = new get_user();
      $package->fname = $request['fname'];
      $package->lname = $request['lname'];
      $package->email = $request['email'];
      $package->phone = $request['phone'];
      $package->line = $request['line'];
      $package->facebook = $request['facebook'];
      $package->save();

      return redirect(url('thx_you'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');


    }


    public function blog_detail($id){
        $slide = DB::table('blogs')
                ->Orderby('view', 'desc')
                ->limit(5)
                ->get();

               // dd($objs);

        $data['slide'] = $slide;

        $pre = DB::table('blogs')->where('id', $id+1)->first();
        $next = DB::table('blogs')->where('id', $id-1)->first();
        $data['pre'] = $pre;
        $data['next'] = $next;
        
        $objs = DB::table('blogs')->where('id', $id)->first();

        DB::table('blogs')
            ->where('id', $id)
            ->update(['view' => $objs->view+1]);

        $data['objs'] = $objs;

        return view('blog_detail', $data);
    }

    public function blog(){

        $slide = DB::table('blogs')
                ->Orderby('view', 'desc')
                ->limit(5)
                ->get();

               // dd($objs);

        $data['slide'] = $slide;

        $objs = DB::table('blogs')
                ->Orderby('id', 'desc')
                ->paginate(15);

               // dd($objs);

        $data['objs'] = $objs;

        return view('blog', $data);

    }

}
