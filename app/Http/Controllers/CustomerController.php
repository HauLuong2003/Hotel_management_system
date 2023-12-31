<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
   
    public function list(Request $request){
        $data['getRecord']= Customer::getCustomer();
       return view('customer.customer',$data);
    }
    public function delete($Cus_ID){
        $customer = Customer::getSingle($Cus_ID);
        $customer ->delete(true);
        return redirect('/customer/list');
       
     }
     //vao form edit
     public function edit($Cus_ID){
        $data['getValue'] = Customer::getSingle($Cus_ID);
        if(!empty($data['getValue'])){
           return view('customer.editCustomer',$data);
        }
        else{
           abort(404);
        }
        
     }
     
     // update len list 
     public function update($Cus_ID, Request $request)
     {
       // $data = new Customer;
            $customer = Customer::getSingle($Cus_ID);         
          $customer->Cus_Name = $request->name;
          $customer->Cus_Phone =$request->Phone;
           $customer->Cus_Email = $request->email;
           $customer->save();
           return redirect('/customer/list');
      } 
    
}



