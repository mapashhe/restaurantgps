<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function statistics($latitude, $longitude, $radius){
        return $latitude ." - ".$longitude." - ".$radius;
    }
}
