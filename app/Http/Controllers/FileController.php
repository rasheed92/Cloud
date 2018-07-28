<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\file;
use Storage;
use App\category;
use App\User;
use Validator;
use DB;
class FileController extends Controller
{




  public function profile($id)
  {

    $user = User::find($id);
    $sum=0;
    $users= File::all();
    foreach ($users as $file) {
      $results_numeric = (int) $file->size;
      if ($file->user_id==auth()->user()->id) {
      $sum=$sum+$results_numeric;
      }
    }
    $mb=$sum/1048576;
  //  $gb= $mb /‪ 1000‬;
  $gb=$mb/1024;
  $storge = number_format($gb, 2, ',', ' ');
    $a=$gb/20 *100;
    $b=$gb/50 *100;
    $c=$gb/100 *100;
$x=1024;
$y=1048576;
$z=1024;
$limit=0;
if (auth()->user()->pakeage=="Free") {
  $limit=20;
}elseif (auth()->user()->pakeage=="Standard") {
    $limit=50;
}else {
    $limit=100;
}
return view('layouts.profile',compact('user','storge','a','b','c','x','y','limit'));
  }
  public function editUser(Request $request,$id)
  {

      $user = User::find($id);
    $user ->pakeage = $request->pakeage;
      $user->save();
      return back();
  }
  public function showAll()
  {

      $files = file::all();
      $size = $files->size;
      $xc=$sum/1048576;
      //  return Storage::download($files->file);
      return view('layouts.files2',compact('files','size','xc'));
  }
  public function stor(Request $request)
  {
    // $validator = Validator::make($request->all(),[  #Validator to add item
    //     'name'=>'required',
    //     'body'=>'required',
    //     'user_id'=>'required',
    //     'file'=>'required|image',
    // ]);
    // if($validator->fails())
    //     return back()->withErrors($validator->errors())->withInput();

    $files = new file;

    $files->name =$request->file('file')->getClientOriginalName();;
    $files->user_id =auth()->user()->id;
   $files ->file = Storage::putFile('uploads', request('file'));
   $files ->size =$request->file('file')->getClientSize();
    $files->save();
    return back();
  }
  public function delete($id) #delete File  from DB by model
  {
$files = file::findOrFail($id);
    $files->delete();
  return back();
  }
  public function getFile(Request $req)
  {
    $file = urldecode($req->file);
    if (Storage::exists($file)) {
      return response()->file(storage_path('app/'.$file));

    }
    return abort(404);
  }
  public function get_file(Request $req) {
      $like= $req->like;
      $url = '../storage/app/'.$like;
      $name = basename($url);
      return response()->download($url, $name);

      // $file = download($req->file);
      // if (Storage::exists($file)) {
      //   $name = basename($file);
      //   return response()->download($file, $name);
      //
      // }
      // return abort(404);



  }
  public  function admin()
  {
    $users = User::all();
    $files= file::paginate(10);
      $n= file::all();


    return view('layouts.admin',compact('users','files','n'));
  }

}
