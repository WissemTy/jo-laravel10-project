<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spectators extends Model
{

    
    protected $fillable = ['name', 'firstName', 'phoneNumber', 'email'];
    use HasFactory;

    
}
