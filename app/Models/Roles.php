<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = "roles";

    protected $primaryKey = "Roles_ID";

    protected $fillable = ['Roles_ID','Roles_Name'];
}
