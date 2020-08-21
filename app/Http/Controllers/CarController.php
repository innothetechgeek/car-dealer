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

        $this->validateData($request);              
        
        $image_path = $this->storeImage($request);
       
        $car = new Car();
        $car->name = $request->name;
        $car->price = $request->price;
        $car->image = $image_path;
        $car->save();

        $request->session()->flash('status', "$car->name added Successfully!"); //success toast

        return redirect('car/list');

    }

    public function validateData($request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
             'name' => 'required'
        ]);

    }

    public function storeImage($request){

        $imageTmpName = $request->file($this->imageInputName);
        $imageName = $imageTmpName->getClientOriginalName();
           
       
        $image_path = $request->file($this->imageInputName)->storeAs(
            'uploads',
             $imageName,
            'public_images'
        );

        return $image_path;
    }

   public function delete(Request $request){

        $car_id = $request->car_id;
        $car = Car::find($car_id);

        $car_name = $car->name;

        //delete image from storage location
        Storage::disk('public_images')->delete($car->image);        

        $car->delete();

        $request->session()->flash('status', "$car_name deleted Successfully!"); //success toast

        //returns json response to ajax
        return response()->json(['url'=>url('car/list')]);

   }

    public function list(){        

        $cars = DB::table('cars')->orderBy('created_at', 'desc')->get();
        return view('car.list', ['cars' => $cars]);

    }
    
}
