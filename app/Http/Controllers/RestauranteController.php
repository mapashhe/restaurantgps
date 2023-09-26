<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    
    public function index()
    {
        return Restaurante::all();
    }

    public function store(Request $request)
    {
        $restaurante = Restaurante::create($request->post());
        return response()->json($restaurante);
    }

    public function show(Restaurante $restaurante)
    {
        return $restaurante;
    }

    public function update(Request $request, Restaurante $restaurante)
    {
        $restaurante->fill($request->post())->save();
        return $restaurante;
    }

    public function destroy(Restaurante $restaurante)
    {
        $restaurante->delete();
        return "eliminado";
    }
}
