<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'adresses'; 

    protected $fillable = ['user_id', 'isdefault']; // Adjust based on your columns
}

