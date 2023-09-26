<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeedController extends Controller
{
    public function fillTable(){
        $filePath = storage_path('app/restaurantes.csv');
        $file = fopen($filePath, 'r');
        $header = fgetcsv($file);
        while ($row = fgetcsv($file)) {
            DB::table('restaurantes')->insert([
                array_combine($header, $row)
            ]);
        }
        fclose($file);
        return "done";
    }
}
