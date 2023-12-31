<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
class RoomController extends Controller
{
    //lay du lieu tu database dua len table
    public function list(Request $request){
      $data['getRecord'] = Room::getRoom() ;
      return view('admin.admin.Room',$data);
    }
    //xoa du liệu 
    public function delete($Room_ID){
        $room =Room::getSingle($Room_ID);
        $room->delete();
        return redirect('/room/list');
    }
    public function add(){   
        $model = new Room();
        $Status = $model->getEnumStatus();
        $data['getRecord'] = Room::getRoom() ;
        return view('admin.admin.AddRoom',$data,['Status' => $Status]);
    }
    
    public function insert(Request $request){     
      $request ->validate([
         'roomID'=>'required',
         'status'=>'required',
         'roomNumber'=>'required',
         'roomDescription'=>'required',
         'Price'=>'required',
         'image' => 'required', // Add image validation rules
         'Quantity'=>'required',

        ]);
             
            $imgPath = $request->file('image')->store('public/image');
            $room = new Room();
            $room->Room_ID =$request->roomID;
            $allowedStatusValues = ['Available room','Occupied room'];
            $validatedStatus = in_array($request->status, $allowedStatusValues) ? $request->status : null;    
            $room->Status = $validatedStatus;

            $room->Number = $request->roomNumber;
            $room->Describe= $request->roomDescription;
            $room->Price =$request->Price;
            $room->image = $imgPath;
            $room ->Quantity = $request->Quantity;
            $room->save();
            return redirect('/room/list');        
    }
    public function edit($Room_ID){
    
      //  $enumValues = Room::getStatus('Status'); // Thay 'status' bằng tên trường ENUM của bạn
      $model = new Room();
      $Status = $model->getEnumStatus();
        $data['getRecord'] =Room::getSingle($Room_ID);
        if(!empty($data['getRecord'])){
           return view('admin.admin.EditRoom',$data,['Status' => $Status]);
        }
        else{
           abort(404);
        }    
     }
     public function update($Room_ID, Request $request)
     {  
      $request ->validate([
        'status'=>'required',
        'roomNumber'=>'required',
        'roomDescription'=>'required',
        'Price'=>'required',
        'image' => 'required',
        'Quantity'=>'required',
       ]);
       if ($request->hasFile('image')) {
        // Nếu có, lưu trữ hình ảnh mới và cập nhật đường dẫn
        $imgPath = $request->file('image')->store('public/image');
    } else {
        // Nếu không, kiểm tra giá trị của $request->image và cập nhật nếu cần
        $imgPath=$request->prve_image;
    }  

        $room = Room::getSingle($Room_ID);         
        $allowedStatusValues = ['Available room','Occupied room'];
        $validatedStatus = in_array($request->status, $allowedStatusValues) ? $request->status : null;
        $room->Status = $validatedStatus;

        $room->Describe = $request->roomDescription;
        $room->Price =$request->Price;
        $room->Quantity =$request->Quantity;
        $room->image = $imgPath;
         $room->Number = $request->roomNumber;
        $room->save();
        return redirect('/room/list');        
      }              

      //di den chi tiet phong
      public function detailRoom($Room_ID){
        $data['room'] = Room::getSingle($Room_ID) ;
        return view('customer.detailRoom',$data);
      }    
}
