<?php

use Illuminate\Support\Facades\Route;
use App\Models\Sensor;

Route::get('/', function () {
    return view('index', [
        "sensors" => Sensor::all()
    ]);
});
