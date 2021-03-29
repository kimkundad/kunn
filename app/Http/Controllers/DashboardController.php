<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\setting;
use App\head_image;
use Auth;

class DashboardController extends Controller
{
    //
    public function index(){

        $blog = DB::table('blogs')
                ->count();

                $view = DB::table('blogs')
                ->sum('view');

                $data['view'] = $view;
                $data['blog'] = $blog;

                $slide = DB::table('slides')
                ->count();

                $data['slide'] = $slide;

         

        return view('admin.dashboard.index', $data);
    }
    public function docs(){

        $objs = DB::table('settings')
                ->Where('id', 1)
                ->first();

            $data['objs'] = $objs;

        return view('admin.dashboard.docs', $data);
    }

    public function pics(){

        $objs = DB::table('head_images')
                ->Where('id', 1)
                ->first();

            $data['objs'] = $objs;

        return view('admin.dashboard.pics', $data);
    }

    public function post_docs(Request $request){

        $id = 1;
        $obj = setting::find($id);
        $obj->get_my_file = $request['get_my_file'];
        $obj->save();

        return redirect(url('admin/docs/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    public function post_pics(Request $request){

        $path = 'img/head/';
        $id = 1;

        $page1 = $request->file('page1');
        $page2 = $request->file('page2');
        $page3 = $request->file('page3');
        $page4 = $request->file('page4');
        $page5 = $request->file('page5');
        $page6 = $request->file('page6');
        $page7 = $request->file('page7');
        $page8 = $request->file('page8');
        $page9 = $request->file('page9');
        $page10 = $request->file('page10');
        $page11 = $request->file('page11');
        $page12 = $request->file('page12');
        $page13 = $request->file('page13');
        $page14 = $request->file('page14');
        $page15 = $request->file('page15');
        $page16 = $request->file('page16');
        $page17 = $request->file('page17');
        $page18 = $request->file('page18');
        $page19 = $request->file('page19');
        $page20 = $request->file('page20');

        if($page1 != NULL){
        $filename = time()."-".$page1->getClientOriginalName();
        $page1->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page1 = $filename;
        $obj->save();
        }

        if($page2 != NULL){
        $filename = time()."-".$page2->getClientOriginalName();
        $page2->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page2 = $filename;
        $obj->save();
        }

        if($page3 != NULL){
        $filename = time()."-".$page3->getClientOriginalName();
        $page3->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page3 = $filename;
        $obj->save();
        }

        if($page4 != NULL){
        $filename = time()."-".$page4->getClientOriginalName();
        $page4->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page4 = $filename;
        $obj->save();
        }

        if($page5 != NULL){
        $filename = time()."-".$page5->getClientOriginalName();
        $page5->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page5 = $filename;
        $obj->save();
        }

        if($page6 != NULL){
        $filename = time()."-".$page6->getClientOriginalName();
        $page6->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page6 = $filename;
        $obj->save();
        }

        if($page7 != NULL){
        $filename = time()."-".$page7->getClientOriginalName();
        $page7->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page7 = $filename;
        $obj->save();
        }

        if($page8 != NULL){
        $filename = time()."-".$page8->getClientOriginalName();
        $page8->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page8 = $filename;
        $obj->save();
        }

        if($page9 != NULL){
        $filename = time()."-".$page9->getClientOriginalName();
        $page9->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page9 = $filename;
        $obj->save();
        }

        if($page10 != NULL){
        $filename = time()."-".$page10->getClientOriginalName();
        $page10->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page10 = $filename;
        $obj->save();
        }

        if($page11 != NULL){
        $filename = time()."-".$page11->getClientOriginalName();
        $page11->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page11 = $filename;
        $obj->save();
        }

        if($page12 != NULL){
        $filename = time()."-".$page12->getClientOriginalName();
        $page12->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page12 = $filename;
        $obj->save();
        }

        if($page13 != NULL){
        $filename = time()."-".$page13->getClientOriginalName();
        $page13->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page13 = $filename;
        $obj->save();
        }

        if($page14 != NULL){
        $filename = time()."-".$page14->getClientOriginalName();
        $page14->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page14 = $filename;
        $obj->save();
        }

        if($page15 != NULL){
        $filename = time()."-".$page15->getClientOriginalName();
        $page15->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page15 = $filename;
        $obj->save();
        }

        if($page16 != NULL){
        $filename = time()."-".$page16->getClientOriginalName();
        $page16->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page16 = $filename;
        $obj->save();
        }

        if($page17 != NULL){
        $filename = time()."-".$page17->getClientOriginalName();
        $page17->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page17 = $filename;
        $obj->save();
        }

        if($page18 != NULL){
        $filename = time()."-".$page18->getClientOriginalName();
        $page18->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page18 = $filename;
        $obj->save();
        }

        if($page19 != NULL){
        $filename = time()."-".$page19->getClientOriginalName();
        $page19->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page19 = $filename;
        $obj->save();
        }


        if($page20 != NULL){
        $filename = time()."-".$page20->getClientOriginalName();
        $page20->move($path, $filename);

        $obj = head_image::find($id);
        $obj->page20 = $filename;
        $obj->save();
        }


        return redirect(url('admin/pics/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    
}
