<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\blog;
use App\folder;
use App\get_user;
use App\answer;
use App\banner;
use App\review;
use Session;

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
        $event = DB::table('slides')
                ->where('status', 1)
                ->Orderby('id', 'desc')
                ->get();

                

        $data['event'] = $event;


        $review = DB::table('reviews')
                ->where('status', 1)
                ->Orderby('id', 'desc')
                ->get();

        $data['review'] = $review;

        $blog = DB::table('blogs')
        ->Orderby('id', 'desc')
        ->limit(3)
        ->get();

        $data['blog'] = $blog;

        $objs = folder::limit(4)->get();

        if(isset($objs)){
            foreach($objs as $u){
                $u->count = DB::table('gallery_fs')->where('folder_id', $u->id)->count();
            }
        }

        $data['objs'] = $objs;

        $ban = banner::get();

        $data['ban'] = $ban;

        return view('welcome', $data);
    }



    public function add_contact(Request $request){

        $secret="6LdBOl8UAAAAAM-iNnghy4tPxFpCOPG6J1Hg8xLu";
    //  $response = $request['captcha'];

      $captcha = "";
      if (isset($request["g-recaptcha-response"]))
        $captcha = $request["g-recaptcha-response"];

    //  $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
      $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);
      //$captcha_success=json_decode($verify);

    //  dd($captcha_success);

    if($response["success"] == false) {

        return response()->json([
          'data' => [
            'status' => 100,
            'msg' => 'This user was not verified by recaptcha.'
          ]
        ]);

      }else{

        //BoSMNzMqkODt0pdl8fJQXB9aY5mjFaZcIyQ8jWqvS6P

        $message = $request['name'].", ".$request['email'].", ".$request['subject'].", ข้อความ : ".$request['comments'];
        $lineapi = setting()->line_token;

        $mms =  trim($message);
        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=$mms");
        curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);
        if(curl_error($chOne)){
        echo 'error:' . curl_error($chOne);
        }else{
        $result_ = json_decode($result, true);
    //    echo "status : ".$result_['status'];
    //    echo "message : ". $result_['message'];
        }
        curl_close($chOne);

        return response()->json([
            'data' => [
              'status' => 200,
              'msg' => 'This user is verified by recaptcha.'
            ]
          ]);

            }


    }


    public function gallery(){
        $objs = DB::table('folders')
                ->where('status', 1)
                ->Orderby('id', 'desc')
                ->get();

                if(isset($objs)){
                    foreach($objs as $u){
                        $u->count = DB::table('gallery_fs')->where('folder_id', $u->id)->count();
                    }
                }

        $data['objs'] = $objs;

        return view('gallery', $data);
    }


    public function gallery_detail($id){

        $obj = DB::table('folders')
                ->where('id', $id)
                ->first();

        $objs = DB::table('gallery_fs')->where('folder_id', $id)->get();
        $data['obj'] = $obj;
        $data['objs'] = $objs;

        return view('gallery_detail', $data);

    }

    public function about()
    {
        return view('about');
    }

    public function terms()
    {
        return view('terms');
    }

    public function policy()
    {
        return view('policy');
    }

    public function thx_you()
    {
        return view('thx_you');
    }

    public function regis_event($id){
        Session::put('my_events', $id);
        return redirect(url('register'));
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

        $check_phone = DB::table('get_users')
        ->where('phone', $request['phone'])
        ->count();

        $check_email = DB::table('get_users')
        ->where('email', $request['email'])
        ->count();

     if($check_phone > 0){
        return redirect(url('events/'.$request['e_id']))->with('error_phone','คุณทำการเพิ่มอสังหา สำเร็จ');
     }else{

     

     if($check_email > 0){

        return redirect(url('events/'.$request['e_id']))->with('error_email','คุณทำการเพิ่มอสังหา สำเร็จ');

     }else{

     

  
      $get_ev = DB::table('events')
      ->where('id', $request['e_id'])
      ->first();

      $loop_check = DB::table('questions')
        ->where('cat_id', $get_ev->ex_id)
        ->get();

      $package = new get_user();
      $package->fname = $request['fname'];
      $package->lname = $request['lname'];
      $package->email = $request['email'];
      $package->phone = $request['phone'];
      $package->line = $request['line'];
      $package->facebook = $request['facebook'];
      $package->status2 = $request['e_id'];
      $package->status3 = $get_ev->ex_id;
      $package->save();

      if(isset($loop_check)){
        foreach($loop_check as $u){

            $value = $request['value_'.$u->id];

                if($u->type == 0){
                $pay = new answer();
                $pay->user_id  = $package->id;
                $pay->answers = $value;
                $pay->type = $u->type;
                $pay->e_id = $request['e_id'];
                $pay->ex_id = $get_ev->ex_id;
                $pay->qu_id = $u->id;
                $pay->save(); 
                }else{
                $pay = new answer();
                $pay->user_id  = $package->id;
                $pay->answers = $request['valuex_'.$u->id];
                $pay->type = $u->type;
                $pay->e_id = $request['e_id'];
                $pay->ex_id = $get_ev->ex_id;
                $pay->qu_id = $u->id;
                $pay->save();
                }

        }
    }


      return redirect(url('thx_you'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

}
     }

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
