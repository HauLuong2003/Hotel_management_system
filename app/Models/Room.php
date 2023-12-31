<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';
    public $timestamps = false;
    protected $fillable = [
        'Status',
        'Number',
        'Describe',
        'Price',
        'image',
    ];
    protected $primaryKey = 'Room_ID';

     static public function getRoom(){
        return self::orderBy('Room_ID', 'desc')->get();
     }
     static public function getSingle($Room_ID){
        return self::find($Room_ID);
    }
        // Hàm để lấy giá trị của trường ENUM
    
protected $Status = [
        'Status' => 'Available room','Occupied room',
    ];
        public function getEnumStatus()
        {
           return ['Available room', 'Occupied room'];
        }
    
}
