<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $fillable = ['name', 'firstName', 'phoneNumber', 'email'];
    use HasFactory;
}