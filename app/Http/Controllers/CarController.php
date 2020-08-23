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

        $request->session()->flash('status', ["message"=>"$car->name added Successfully!","car_id"=>$car->id]);//success toast

        return redirect('car/list');

    }

    public function validateData($request,$method = ''){

        if($method == 'edit'){ //image should not be required on edit

            $image_validation_rules = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'; 
            
        }else{ //image is required on add

            $image_validation_rules = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'; 

        }

        $request->validate([
                'image' => $image_validation_rules,
                'price' => 'required',
                'name' => 'required'
        ]);

        

    }

    public function edit(Request $request,$car_id){       
        
        $car = Car::find($car_id);

        $car  =  $car ?  $car : false;     
        $request->session()->forget('status'); //avoids 'car/daleted successfully' message being shown if the user goes back without hitting save
        $request->session()->save();
        return view('car/edit',['car' => $car]);

    }

    public function editCar(Request $request,$car_id){

        $this->validateData($request,'edit'); 
        
        $car = Car::find($car_id);       
        if($request->hasFile($this->imageInputName)){ //new image

             ///delete old image
             Storage::disk('public_images')->delete($car->image);
           
            $new_path = $this->storeImage($request);
            $car->image = $new_path;
           
            
            
        }

        $car->price = $request->price;
        $car->name = $request->name;
        
        $car->save();
        

        $request->session()->flash('status', ["message"=>"$car->name updated Successfully!",'car_id'=>$car->id]); //success toast

        return redirect('car/list');
        
    }

    public function storeImage($request){

        $imageTmpName = $request->file($this->imageInputName);
        $imageName = $imageTmpName->getClientOriginalName();

        $imageName  = (Storage::disk('public_images')->exists('uploads/'.$imageName)) ? rand().'_'.$imageName : $imageName;
           
       
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

        $request->session()->flash('status', ["message"=>"$car_name deleted Successfully!"]); //success toast

        //returns json response to ajax
        return response()->json(['url'=>url('car/list')]);

   }

    public function list(){        
       
        $cars = DB::table('cars')->orderBy('created_at', 'desc')->get();
        return view('car.list', ['cars' => $cars]);

    }
    
}
