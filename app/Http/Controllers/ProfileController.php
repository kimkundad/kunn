<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\event;

class ProfileController extends Controller
{
    //
    public function index(){

      $user = User::find(Auth::user()->id);
      $data['objs'] = $user;
      return view('profile.index', $data);
    }

    public function my_events(){

        $my_array = [];

        $event = DB::table('events')
                ->where('status', 1)
                ->Orderby('id', 'desc')
                ->get();

                

        $get_users = DB::table('get_users')
                ->where('email', Auth::user()->email)
                ->get();

        if(isset($get_users)){
            foreach($get_users as $u){
                $my_array[] = $u->status2;
            }
        }

        


        if(isset($event)){
            foreach($event as $u){
                
                if (in_array($u->id, $my_array)){
                    $u->check_event = 1;
                }else{
                    $u->check_event = 0;
                }
                
            }
        }

        $data['event'] = $event;
        
       // dd($event);

        $user = User::find(Auth::user()->id);
        $data['objs'] = $user;
        return view('profile.my_events', $data);
    }

    public function post_update_profile(Request $request){

        $this->validate($request, [
            'first_n' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'study' => 'required',
            'novice' => 'required'
        ]);
            $id = Auth::user()->id;

            $package = User::find($id);
            $package->phone = $request['phone'];
            $package->birthday = $request['birthday'];
            $package->zipcode = $request['zipcode'];
            $package->first_n = $request['first_n'];
            $package->age = $request['age'];
            $package->study = $request['study'];
            $package->novice = $request['novice'];
            $package->fname = $request['fname'];
            $package->lname = $request['lname'];
            $package->save();

            return redirect(url('success_update'))->with('edit_success','Edit successful');

    }
}
