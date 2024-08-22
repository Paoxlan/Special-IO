<?php

use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Log;

Route::post('/update-sensor', function (Request $request) {
    $json = $request->json();
    $sensorId = $json->get("sensor");
    $temperature = $json->get("temperature");

    $sensor = Sensor::find($sensorId);
    if (!$sensor) {
        Sensor::create([
            'sensor' => $sensorId,
            'temperature' => $temperature
        ]);

        return;
    }

    $sensor->update([
        'temperature' => $temperature
    ]);
});

Route::get('/sensors', function () {
    return Sensor::all();
});
