<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\review;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use File;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = review::all();
        
        $data['objs'] = $cat;

       return view('admin.review.index', $data);
    }

    public function post_status_review(Request $request){

        $user = review::findOrFail($request->user_id);
   
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['method'] = "post";
        $data['url'] = url('admin/review');
        $data['datahead'] = "สร้าง review ";
        return view('admin.review.create', $data);
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
             'position' => 'required',
             'detail' => 'required'
         ]);

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = asset('img/review/');
        $img = Image::make($image->getRealPath());
        $img->resize(200, 200, function ($constraint) {
        $constraint->aspectRatio();
      })->save('img/review/'.$input['imagename']);



       $package = new review();
       $package->name = $request['name'];
       $package->position = $request['position'];
       $package->detail = $request['detail'];
       $package->avatar = $input['imagename'];
       $package->save();


       return redirect(url('admin/review/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
        //
        $obj = review::find($id);
        $data['url'] = url('admin/review/'.$id);
        $data['datahead'] = "แก้ไข review";
        $data['method'] = "put";
        $data['objs'] = $obj;
        return view('admin.review.edit', $data);
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

        if($image == NULL){

          $this->validate($request, [
               'name' => 'required',
               'position' => 'required',
               'detail' => 'required'
           ]);


           $package = review::find($id);
           $package->name = $request['name'];
           $package->position = $request['position'];
           $package->detail = $request['detail'];
           $package->save();

           return redirect(url('admin/review/'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');



        }else{

          $this->validate($request, [
               'image' => 'required|max:8048',
               'name' => 'required',
               'position' => 'required',
               'detail' => 'required'
           ]);

          $objs = review::find($id)->first();

          $file_path = 'img/review/'.$objs->avatar;
          unlink($file_path);

          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(200, 200, function ($constraint) {
          $constraint->aspectRatio();
        })->save('img/review/'.$input['imagename']);

           $package = review::find($id);
           $package->name = $request['name'];
           $package->position = $request['position'];
           $package->detail = $request['detail'];
           $package->avatar = $input['imagename'];
           $package->save();

           return redirect(url('admin/review/'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_review($id)
    {
        //
        $objs = DB::table('reviews')
      ->where('reviews.id', $id)
      ->first();

      $destinationPath = 'img/review/'.$objs->avatar;
      File::delete($destinationPath);

      $obj = DB::table('reviews')
      ->where('reviews.id', $id)
      ->delete();

      return redirect(url('admin/review/'))->with('del_success','ลบข้อมูล สำเร็จ');
    }
}
