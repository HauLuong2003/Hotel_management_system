<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
class SearchingController extends Controller
{
    public function search(Request $request) {
         $key= $request->input('guests');
        $rooms= Room::where('Quantity', 'LIKE', "%$key%")->where('Status','Available room')  ->get();
        return view('customer.Home',['rooms'=>$rooms]);
    }

}
