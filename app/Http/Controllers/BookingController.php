<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class BookingController extends Controller
{
    public function showBookingForm($id)
    {
        $room = Room::find($id);

        if (Auth::guest()) {
            return redirect('/dangnhap');
        }
        return view('customer.BookingPage',['room'=> $room]);
    }

    public function createBooking($id, Request $request){
        $request->validate([
            'cus_id' => 'required',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after:checkin_date',
            'Price'=>'required',
        ]);

        $room = Room::find($id);

        $booking = new Booking();

        $booking->Cus_ID = $request->input('cus_id');
        $booking->Room_ID = $room->Room_ID;
        $booking->Checkin_Date = $request->input('checkin_date');
        $booking->Checkout_Date = $request->input('checkout_date');
         $room->update(['Status' => 'Occupied room']);
        $booking->Price =$request->input('Price');
        $booking->save();
        return redirect()->back()->with('success','đặt phòng thành công !!!');
    }
}
