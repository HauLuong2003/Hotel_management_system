<?php

namespace App\Http\Controllers;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Http\FormRequest;


class AdminController extends Controller
{
   public function insert(Request $request){

    $user = new User();
    $user->name =trim($request->name);
    $user->email= trim($request->email);
    $user->password = Hash::make($request -> password);
    $user->save();
    return redirect('/admin/list');
   }
   public function add(){
      //$data['header_title'] ="Add New Admin";
      return view('admin.admin.add');
   }
   public function list(){
      $data['getRecord']= User::getAdmin();
//   dd($data['getRecord']);
     // $data['header_title']="Admin List";
      return view('admin.admin.list',$data);
      }
      //phuong thuc edit theo ma 
      public function edit($id){
         $data['getRecord'] =User::getSingle($id);
         if(!empty($data['getRecord'])){
            return view('admin.admin.Edit',$data);
         }
         else{
            abort(404);
         }
          
      }
      // cap nhat lai len list
      public function update($id, Request $request){
         if(!empty($request->password)){

           $user = User::getSingle($id);
           $user->name =trim($request->name);
           $user->email= trim($request->email);
           if(!empty($request->password)){
            $user->password = Hash::make($request -> password);
           }
          $user->save();
    return redirect('/admin/list');
         }
      }
      public function delete($id){
         $user = User::getSingle($id);
         $user ->delete(true);
      //   $user()
         return redirect('/admin/list');
        
      }
}
