<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\folder;
use App\gallery_f;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = folder::paginate(15);

        if(isset($objs)){
            foreach($objs as $u){
                $u->count = DB::table('gallery_fs')->where('folder_id', $u->id)->count();
            }
        }

        $data['objs'] = $objs;
        return view('admin.myfolder.index', $data);
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
        $data['url'] = url('admin/folder');
        return view('admin.myfolder.create', $data);
    }

    public function folder_status(Request $request){

        //  dd($request->all());
    
          $user = folder::findOrFail($request->user_id);
    
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
             'name' => 'required'
         ]);

            $path = 'img/folder/';
            $filename = time()."-".$image->getClientOriginalName();
            $image->move($path, $filename);

      $package = new folder();
      $package->name = $request['name'];
      $package->image = $filename;
      $package->save();

      return redirect(url('admin/folder/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function my_gallery_f($id)
    {
        //
        $objs = folder::find($id);
        $data['objs'] = $objs;

        $obj = DB::table('gallery_fs')
                    ->where('folder_id', $objs->id)
                    ->get();
                    $data['obj'] = $obj;

        return view('admin.myfolder.my_gallery', $data);
    }

    public function add_my_gallery(Request $request, $id){
        
        $gallary = $request->file('image');

        if (sizeof($gallary) > 0) {
            for ($i = 0; $i < sizeof($gallary); $i++) {
              $path = 'img/folder/';
              $filename = time()."-".$gallary[$i]->getClientOriginalName();
              $gallary[$i]->move($path, $filename);
              $admins[] = [
                  'g_name' => $filename,
                  'folder_id' => $id
              ];
            }
            gallery_f::insert($admins);
          }

          return redirect(url('admin/my_gallery_f/'.$id))->with('add_success','คุณทำการแก้ไขอสังหา สำเร็จ');

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
        $objs = folder::find($id);

        $data['url'] = url('admin/folder/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.myfolder.edit', $data);
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
             'name' => 'required'
         ]);

         $package = folder::find($id);
      $package->name = $request['name'];
      $package->save();

      if($image != NULL){

        $objs = DB::table('folders')
               ->where('id', $id)
               ->first();

               if(isset($objs->image)){
                $file_path = 'img/folder/'.$objs->image;
                 unlink($file_path);
              }

            $path = 'img/folder/';
            $filename = time()."-".$image->getClientOriginalName();
            $image->move($path, $filename);

          $package = folder::find($id);
          $package->image = $filename;
          $package->save();

      }
      return redirect(url('admin/folder/'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function del_image_ff($id){

        $objs = DB::table('gallery_fs')->where('id', $id)->first();
      //  dd($objs);

        if(isset($objs->g_name)){
            $file_path = 'img/folder/'.$objs->g_name;
             unlink($file_path);
          }
          DB::table('gallery_fs')->where('id', $id)->delete();

          return redirect(url('admin/my_gallery_f/'.$objs->folder_id))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }
    public function del_folder($id)
    {
        //
        $objs = DB::table('folders')
            ->where('id', $id)
            ->first();

            if(isset($objs->image)){
              $file_path = 'img/folder/'.$objs->image;
               unlink($file_path);
            }

            $gallery = DB::table('gallery_fs')->where('folder_id', $objs->id)->get();

            if(isset($gallery)){
                foreach($gallery as $u){

                    $obj = DB::table('gallery_fs')
                    ->where('id', $u->id)
                    ->first();

                    $file_path1 = 'img/folder/'.$obj->g_name;
                    unlink($file_path1);

                    DB::table('gallery_fs')->where('id', $obj->id)->delete();

                }
            }


             DB::table('folders')->where('id', $id)->delete();
             return redirect(url('admin/folder'))->with('del_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }
}
