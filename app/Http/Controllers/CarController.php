<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Car;

class CarController extends Controller
{
    private  $imageInputName = 'image';
    
    public function add(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $imageTmpName = $request->file($this->imageInputName);
        $imageName = $imageTmpName->getClientOriginalName();
           
       
        $image_path = $request->file($this->imageInputName)->storeAs(
            'uploads',
             $imageName,
            'public_images'
        );
       
        
       
        $car = new Car();
        $car->name = $request->name;
        $car->price = $request->price;
        $car->image = $image_path;
        $car->save();

    }

    public function edit(){

    }

    public function list(){

        $storage_path = Storage::disk('public_images')->getAdapter()->getPathPrefix();

        $cars = DB::table('cars')->get();
        return view('car.list', ['cars' => $cars,'storage_path'=>$storage_path]);
    }
    
}
