<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Error;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RestauranteController extends Controller
{
    
    public function index()
    {
        return Restaurante::all();
    }

    public function store(Request $request)
    {   
        try {
            
            $valid = Validator::make($request->all(), [
                'name' => 'required|max:30|min:5',
                'site' => 'required|max:30|min:5',
                'email' => 'required|email',
                'rating' => 'required|integer|between:0,4',
                'phone' => 'required|max:10|min:10',
                'street' => 'required|max:30',
                'city' => 'required|max:20',
                'state' => 'required|max:20',
                'lat' => 'required|numeric|between:-90,90',
                'lng' => 'required|numeric|between:-180,180'
            ],
            [
                'name.required' => 'Nombre requerido',
                'name.max' => 'Longitud de nombre maxima: 30',
                'name.min' => 'Longitud de nombre minima: 5',
                
                'site.required' => 'Sitio requerido',
                'site.max' => 'Longitud de Sitio maxima: 30',
                'site.min' => 'Longitud de Sitio minima: 5',
                
                'rating.required' => 'rating requerido',
                'rating.integer' => 'rating debe ser un numero',
                'rating.between' => 'rating debe ser de 0 - 4',
                
                'Phone.required' => 'Telefono requerido',
                'Phone.max' => 'El telefono debe ser a 10 digitos',
                'Phone.min' => 'El telefono debe ser a 10 digitos',

                'email.required' => 'Requerido',
                'email.email' => 'Correo incorrecto',
                
                'street.required' => 'Calle requerido',
                'street.max' => 'Caracteres maximos para calle: 30',
                
                'city.required' => 'Ciudad requerido',
                'city.max' => 'Caracteres maximos para Ciudad: 20',
                
                'state.required' => 'Estado requerido',
                'state.max' => 'Caracteres maximos para Estado: 20',

                'lng.required' => 'Longitud requerida',
                'lng.numeric' => 'Longitud debe ser numerico',
                'lng.between' => 'Longitud debe estar entre -180 and 180',
                'lat.required' => 'Latitud requerida',
                'lat.numeric' => 'Latitud debe ser numerico',
                'lat.between' => 'Latitud debe estar entre -90 and 90',
            ]);
            
            if($valid->fails()){
                return $valid->errors();
            }

            $id = Str::random(30);
            $restaurante = Restaurante::create(["id"=> $id, ...$request->post()]);
            return response()->json($restaurante);
            } catch (Error $th) {
                return $th;
            }
    }

    public function show(Restaurante $restaurante)
    {
        return $restaurante;
    }

    public function update(Request $request, Restaurante $restaurante)
    {
        try {
            
            $valid = Validator::make($request->all(), [
                'name' => 'required|max:30|min:5',
                'site' => 'required|max:30|min:5',
                'email' => 'required|email',
                'rating' => 'required|integer|between:0,4',
                'phone' => 'required|max:10|min:10',
                'street' => 'required|max:30',
                'city' => 'required|max:20',
                'state' => 'required|max:20',
                'lat' => 'required|numeric|between:-90,90',
                'lng' => 'required|numeric|between:-180,180'
            ],
            [
                'name.required' => 'Nombre requerido',
                'name.max' => 'Longitud de nombre maxima: 30',
                'name.min' => 'Longitud de nombre minima: 5',
                
                'site.required' => 'Sitio requerido',
                'site.max' => 'Longitud de Sitio maxima: 30',
                'site.min' => 'Longitud de Sitio minima: 5',
                
                'rating.required' => 'rating requerido',
                'rating.integer' => 'rating debe ser un numero',
                'rating.between' => 'rating debe ser de 0 - 4',
                
                'Phone.required' => 'Telefono requerido',
                'Phone.max' => 'El telefono debe ser a 10 digitos',
                'Phone.min' => 'El telefono debe ser a 10 digitos',

                'email.required' => 'Requerido',
                'email.email' => 'Correo incorrecto',
                
                'street.required' => 'Calle requerido',
                'street.max' => 'Caracteres maximos para calle: 30',
                
                'city.required' => 'Ciudad requerido',
                'city.max' => 'Caracteres maximos para Ciudad: 20',
                
                'state.required' => 'Estado requerido',
                'state.max' => 'Caracteres maximos para Estado: 20',

                'lng.required' => 'Longitud requerida',
                'lng.numeric' => 'Longitud debe ser numerico',
                'lng.between' => 'Longitud debe estar entre -180 and 180',
                'lat.required' => 'Latitud requerida',
                'lat.numeric' => 'Latitud debe ser numerico',
                'lat.between' => 'Latitud debe estar entre -90 and 90',
            ]);
            
            if($valid->fails()){
                return $valid->errors();
            }
            $restaurante->fill($request->post())->save();
            return $restaurante;
            } catch (Error $th) {
                return $th;
            }
    }

    public function destroy(Restaurante $restaurante)
    {
        $restaurante->delete();
        return "eliminado";
    }
}
