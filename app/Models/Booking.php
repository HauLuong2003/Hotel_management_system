<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "booking";

    protected $primaryKey = "Book_ID";

    protected $fillable = ['Book_ID','Cus_ID','Room_ID','Checkin_date','Checkout_date','Price'];
}
