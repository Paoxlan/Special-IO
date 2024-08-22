<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $primaryKey = 'sensor';
    protected $fillable = [
        'sensor',
        'temperature'
    ];
}
