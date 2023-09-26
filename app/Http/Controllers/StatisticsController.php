<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function statistics($latitude, $longitude, $radius){
        $statement = "SELECT count(name) as count, truncate(avg(rating), 2) as avg_raiting, truncate(STDDEV(rating), 2) as std_dev FROM restaurantes where (( 6371 * acos( cos( radians(?) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( lat ) ) ) )*1000) < ?;";
        // $statement = "SELECT rating, truncate((( 6371 * acos( cos( radians(?) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( lat ) ) ) )*1000),2) AS distance FROM restaurantes HAVING distance < ? order by distance;";
        $query = DB::select($statement, [$latitude, $longitude, $latitude, $radius]);
        return $query;
    }
}
    