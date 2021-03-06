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
use App\user_event;
use Session;
use App\User;
use Auth;

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

        $objs = folder::limit(4)->Orderby('id', 'desc')->get();

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

        $message = $request['name'].", ".$request['email'].", ".$request['subject'].", ????????????????????? : ".$request['comments'];
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

    public function success_update(){
        return view('success_update');
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


    public function user_review($id){

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

        return view('user_review', $data);
    }

    public function events(){
        $event = DB::table('events')
                ->where('status', 1)
                ->Orderby('id', 'desc')
                ->get();

        $data['event'] = $event;

        return view('events', $data);
    }

    public function submit_my_events(Request $request){

        if (Auth::check()){

            $ch = DB::table('user_events')
            ->where('event_id', $request['id_event'])
            ->where('user_id', Auth::user()->id)
            ->count();

            if($ch > 0){

                return response()->json([
                    'data' => [
                      'status' => 100,
                      'msg' => '?????????????????????????????????????????????????????????????????????????????????'
                    ]
                  ]);

            }else{

            $package = new user_event();
            $package->event_id = $request['id_event'];
            $package->user_id = Auth::user()->id;
            $package->save();

            $get_ev = DB::table('events')
            ->where('id', $request['id_event'])
            ->first();



            $details = [
                'title' => '??????????????????????????????????????????????????????????????????????????? khunsukto.com ??????????????????????????????',
                'fname' => Auth::user()->name,
                'image' => $get_ev->image,
                'qrcode' => Auth::user()->code_user,
                'url' => url('events/'.$request['id_event']),
                'subject' => $get_ev->name,
                'address' => $get_ev->name_address .','. $get_ev->address,
                'time' => $get_ev->start_event_date .','. $get_ev->end_event_date.' ?????????????????? '. $get_ev->start_event_time,
            ];
        
           // dd($details);
           
            \Mail::to(Auth::user()->email)->send(new \App\Mail\Regismail($details));


            return response()->json([
                'data' => [
                  'status' => 200,
                  'msg' => '????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? ???????????????????????????????????????????????????????????????????????????????????????'
                ]
              ]);

                }

        }else{

            return response()->json([
                'data' => [
                  'status' => 100,
                  'msg' => '???????????????????????????????????????????????????????????????????????????????????????????????????????????? ?????????????????????????????????????????????????????????'
                ]
              ]);

        }

    }


    public function add_data_user(Request $request){

        //dd($request->all());
        $this->validate($request, [
            'first_n' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'email' => 'required',
            'study' => 'required',
            'novice' => 'required'
        ]);

        $check_phone = 0;

        $check_email = 0;

     if($check_phone > 0){
        return redirect(url('user_review/'.$request['e_id']))->with('error_phone','????????????????????????????????????????????????????????? ??????????????????');
     }else{

     

     if($check_email > 0){

        return redirect(url('user_review/'.$request['e_id']))->with('error_email','????????????????????????????????????????????????????????? ??????????????????');

     }else{

     

  
      $get_ev = DB::table('events')
      ->where('id', $request['e_id'])
      ->first();

      $loop_check = DB::table('questions')
        ->where('cat_id', $get_ev->ex_id)
        ->get();

      $packag = new get_user();
      $packag->fname = $request['fname'];
      $packag->lname = $request['lname'];
      $packag->email = $request['email'];
      $packag->phone = $request['phone'];
      $packag->line = $request['line'];
      $packag->facebook = $request['facebook'];
      $packag->status2 = $request['e_id'];
      $packag->status3 = $get_ev->ex_id;
      $packag->first_n = $request['first_n'];
      $packag->age = $request['age'];
        $packag->study = $request['study'];
        $packag->novice = $request['novice'];
      $packag->save();

      $user_id_ans = $packag->id;

      if (Auth::check()){

        $id = Auth::user()->id;

            $package = User::find($id);
            $package->phone = $request['phone'];
            $package->birthday = $request['facebook'];
            $package->zipcode = $request['line'];
            $package->first_n = $request['first_n'];
            $package->age = $request['age'];
            $package->study = $request['study'];
            $package->novice = $request['novice'];
            $package->fname = $request['fname'];
            $package->lname = $request['lname'];
            $package->save();

            $qrcode = $package->code_user;

      }else{
        $qrcode = null;
      }



      if(isset($loop_check)){
        foreach($loop_check as $u){

            $value = $request['value_'.$u->id];

                if($u->type == 0){
                $pay = new answer();
                $pay->user_id  = $user_id_ans;
                $pay->answers = $value;
                $pay->type = $u->type;
                $pay->e_id = $request['e_id'];
                $pay->ex_id = $get_ev->ex_id;
                $pay->qu_id = $u->id;
                $pay->save(); 
                }else{
                $pay = new answer();
                $pay->user_id  = $user_id_ans;
                $pay->answers = $request['valuex_'.$u->id];
                $pay->type = $u->type;
                $pay->e_id = $request['e_id'];
                $pay->ex_id = $get_ev->ex_id;
                $pay->qu_id = $u->id;
                $pay->save();
                }

        }
    }

   


      return redirect(url('thx_you'))->with('add_success','????????????????????????????????????????????????????????? ??????????????????');

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
