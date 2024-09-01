<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitions extends Model
{
    protected $fillable = ['name', 'sport_id', 'place_id', 'type', 'timeStart', 'timeEnd', 'price'];

    public function sport()
    {
        return $this->belongsTo(Sports::class);
    }

    public function place()
    {
        return $this->belongsTo(Places::class);
    }

    use HasFactory;
}
