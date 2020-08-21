<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Car;

class CarController extends Controller
{
    private  $imageInputName = 'image';
    private  $imagePath = false;

    public function add(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
        
            $imageTmpName = $request->file($this->imageInputName);
	    	$imageName = $imageTmpName->getClientOriginalName();
            
            $image_path = $request->file($this->imageInputName)->store('cars',['disk' => 'public_images']);
            // dd(public_path().'assets/images/cars');
            // $request->image->move(public_path().'/assets/images/cars', $image_path);
        

        $car = new Car();
        $car->name = $request->name;
        $car->price = $request->price;
        $car->image = $image_path;
        $car->save();
    }

    public function edit(){

    }

    public function list(){

        $cars = DB::table('cars')->get();
        return view('car.list', ['cars' => $cars]);
    }
    
}
