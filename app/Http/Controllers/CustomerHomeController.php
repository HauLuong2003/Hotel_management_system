<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class CustomerHomeController extends Controller
{
    public function index()
    {
        $rooms = Room::where('Status','Available room')->get();
        return view('customer.Home', ['rooms' => $rooms]);
    }

}
