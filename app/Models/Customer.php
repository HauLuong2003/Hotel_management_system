<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use  HasFactory, Notifiable;
    protected $table = 'customer';
    public $timestamps = false;
    protected $fillable = [
        'Cus_Name',
        'Cus_Phone',
        'Cus_Email',
    ];
    static public function getCustomer(){
      
        return self::orderBy('Cus_ID', 'desc')->get();

    }
    protected $primaryKey = 'Cus_ID';
    static public function getSingle($Cus_ID){
        return self::find($Cus_ID);
    }
    static public function getName($Cus_Name){  
            return Customer::where('Cus_Name','=',$Cus_Name)->first();
         }
    static public function getEmail($Cus_Email){  
        return Customer::where('Cus_Email','=',$Cus_Email)->first();
    }
    static public function getPhone($Cus_Phone){  
        return Customer::where('Cus_Phone','=',$Cus_Phone)->first();
    }

}
