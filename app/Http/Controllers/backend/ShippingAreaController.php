<?php

namespace App\Http\Controllers\backend;

use App\Models\ShipCity;
use App\Models\ShipCountry;
// use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingAreaController extends Controller
{
    // public function viewDivision(){
    //     $divisions = ShipDivision::latest()->get();
    //     return view('backend.ShippingArea.division.all_divisions' , compact('divisions'));
    // }//end function viewDivison

    // public function storeDivision(Request $request){
    //     $validate = $request->validate([
    //         'division_name' => 'required|string',
    //     ]);
    //     ShipDivision::insert([
    //         'division_name' =>$request->division_name,
    //     ]);
    //         return redirect()->route('all.divisions')->with('success' , 'Division Added Successfully');
    // }//end function storeDivision

    // public function editDivision($id){
    //     $division = ShipDivision::find($id);
    //     return view('backend.ShippingArea.division.edit_division' , compact('division'));
    // }//end editDivision

    // public function updateDivision(Request $request){
    //     $validate = $request->validate([
    //         'division_name' => 'required|string',
    //     ]);
    //     $division = ShipDivision::find($request->id);
    //     $division->division_name = $request->division_name;
    //     $division->save();
    //     return redirect()->route('all.divisions')->with('success' , 'Division Updated Successfully');
    // }//end update division

    // public function deleteDivision($id){
    //     $Division = ShipDivision::findOrFail($id);
    //     $Division->delete();
    //     return redirect()->back()->with('success' , 'Division Deleted Successfully');
    // }//end delete Division

    ////////////// Start Country Area 

    public function viewCountry(){
        $countries = ShipCountry::latest()->get();
        return view('backend.ShippingArea.country.all_countries' , compact('countries'));
    }//end function viewcountry

    public function storeCountry(Request $request){
        $validate = $request->validate([
            'country_name' => 'required|string',
        ]);
        ShipCountry::insert([
            'country_name' =>$request->country_name,
        ]);
            return redirect()->route('all.countries')->with('success' , 'Country Added Successfully');
    }//end function storecountry

    public function editCountry($id){
        $country = ShipCountry::find($id);
        return view('backend.ShippingArea.country.edit_country' , compact('country'));
    }//end editcountry

    public function updateCountry(Request $request){
        $validate = $request->validate([
            'country_name' => 'required|string',
        ]);
        $country = ShipCountry::find($request->id);
        $country->country_name = $request->country_name;
        $country->save();
        return redirect()->route('all.countries')->with('success' , 'Country Updated Successfully');
    }//end update country

    public function deleteCountry($id){
        $country = ShipCountry::findOrFail($id);
        $country->delete();
        return redirect()->back()->with('success' , 'Country Deleted Successfully');
    }//end delete country

        ////////////// Start Cities Area 

        public function viewCities(){
            $countries = ShipCountry::latest()->get();
            $cities = ShipCity::with('country')->get();
            return view('backend.ShippingArea.city.all_cities' , compact('countries', 'cities'));
        }//end function viewCities
    
        public function storeCity(Request $request){
            $validate = $request->validate([
                'city_name' => 'required|string',
            ]);
            ShipCity::insert([
                'country_id' => $request->country_id,
                'city_name' =>$request->city_name,
            ]);
                return redirect()->route('all.cities')->with('success' , 'City Added Successfully');
        }//end function storeCity
    
        public function editCity($id){
            $city = ShipCity::find($id);
            return view('backend.ShippingArea.city.edit_city' , compact('city'));
        }//end editCity
    
        public function updateCity(Request $request){
            $validate = $request->validate([
                'city_name' => 'required|string',
            ]);
            $city = ShipCity::find($request->id);
            $city-> country_id = $request->country_id;
            $city->city_name = $request->city_name;
            $city->save();
            return redirect()->route('all.cities')->with('success' , 'City Updated Successfully');
        }//end update updateCity
    
        public function deleteCity($id){
            $city = ShipCity::findOrFail($id);
            $city->delete();
            return redirect()->back()->with('success' , 'City Deleted Successfully');
        }//end delete deleteCity

        public function GetCountry($country_id){
            $country = ShipCountry::where('country_id',$country_id)->get();
            return json_encode($country);
        }//end Ajax GetCountry Function
    
        // public function GetDivision($division_id){
        //     $division = ShipDivision::where('division_id',$division_id)->get();
        //     return json_encode($division);
        // }//end Ajax GetDivision Function

}
