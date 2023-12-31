<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Customer;
use Hash;
class AuthController extends Controller
{
    //login
    public function login(Request $request){
     
        return view("auth.login");
    }
  public function register(Request $request){
     
        return view("auth.register");
    }
  public function Authologin(Request $request){
       
        if(Auth::attempt(['email'=> $request -> email,'password'=> $request -> password])){
            if(Auth::user()->Roles_ID == 0){              
                return redirect('admin/dashbaord');             
            }
            $email = $request->email;
            $user = User::where('email',$email)->first();
            if(Auth::user()->Roles_ID == 1){
                
               $request->session()->put('user_id', $user->Cus_ID);
                return redirect('/');
            }
            
        }
        else{
            return redirect()->back()->with('erro','please enter currenr email and pass');
        }
      
    }
    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate(); // Xóa tất cả dữ liệu phiên

    $request->session()->regenerateToken(); // Tạo lại mã thông báo phiên mới

    return redirect('/');
}
public function signup(Request $request)
{
    $request->validate([
        'name' => 'required',
         'email' => 'required|email|unique:customer,Cus_Email',
         'phone' => 'required|numeric',
        'password' => 'required',
    ]);
    $customer = new Customer();
        $customer->Cus_Name = $request->input('name');
        $customer->Cus_Phone = $request->input('phone');
        $customer->Cus_Email = $request->input('email');
     $customer->save();
  
    $user = new User();
    $user->name =$request->name;
    $user->Roles_ID =1;
  	$user->Cus_ID = $customer->Cus_ID;
    $user->email=$request->email;
    $user->password = Hash::make($request -> password);
    $user->save();
    Auth::login($user);
    return redirect('/');
}
}
