<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\banner;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class BanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = banner::get();

        $data['objs'] = $objs;
        return view('admin.pics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_my_banner(Request $request)
    {
        //
        $gallary = $request->file('image');

        if (sizeof($gallary) > 0) {
            for ($i = 0; $i < sizeof($gallary); $i++) {
              $path = 'img/banner/';
              $filename = time()."-".$gallary[$i]->getClientOriginalName();
              $gallary[$i]->move($path, $filename);
              $admins[] = [
                  'image' => $filename
              ];
            }
            banner::insert($admins);
          }

          return redirect(url('admin/pics/'))->with('add_success','คุณทำการแก้ไขอสังหา สำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_image_banner($id)
    {
        //
        $objs = DB::table('banners')->where('id', $id)->first();
      //  dd($objs);

        if(isset($objs->image)){
            $file_path = 'img/banner/'.$objs->image;
             unlink($file_path);
          }
          DB::table('banners')->where('id', $id)->delete();

          return redirect(url('admin/pics/'))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
