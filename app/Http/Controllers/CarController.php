<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Car;

class CarController extends Controller
{
    public function add(Request $request){
        $car = new Car();
        $car->name = $request->name;
        $car->price = $request->price;
        $car->image = '';
        $car->save();
    }

    public function edit(){

    }

    public function list(){

        $cars = DB::table('cars')->get();
        return view('car.list', ['cars' => $cars]);
    }
    
}
