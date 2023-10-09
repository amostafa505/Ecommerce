<?php

namespace App\Http\Controllers\backend;

use App\Models\ShipState;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingAreaController extends Controller
{
    public function viewDivision(){
        $divisions = ShipDivision::latest()->get();
        return view('backend.ShippingArea.division.all_divisions' , compact('divisions'));
    }//end function viewDivison

    public function storeDivision(Request $request){
        $validate = $request->validate([
            'division_name' => 'required|string',
        ]);
        ShipDivision::insert([
            'division_name' =>$request->division_name,
        ]);
            return redirect()->route('all.divisions')->with('success' , 'Division Added Successfully');
    }//end function storeDivision

    public function editDivision($id){
        $division = ShipDivision::find($id);
        return view('backend.ShippingArea.division.edit_division' , compact('division'));
    }//end editDivision

    public function updateDivision(Request $request){
        $validate = $request->validate([
            'division_name' => 'required|string',
        ]);
        $division = ShipDivision::find($request->id);
        $division->division_name = $request->division_name;
        $division->save();
        return redirect()->route('all.divisions')->with('success' , 'Division Updated Successfully');
    }//end update division

    public function deleteDivision($id){
        $Division = ShipDivision::findOrFail($id);
        $Division->delete();
        return redirect()->back()->with('success' , 'Division Deleted Successfully');
    }//end delete Division

    ////////////// Start District Area 

    public function viewDistrict(){
        $divisions = ShipDivision::latest()->get();
        $districts = ShipDistrict::latest()->get();
        return view('backend.ShippingArea.district.all_districts' , compact('districts', 'divisions'));
    }//end function viewdistrict

    public function storeDistrict(Request $request){
        $validate = $request->validate([
            'district_name' => 'required|string',
            'division_id' => 'required',
        ]);
        ShipDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' =>$request->district_name,
        ]);
            return redirect()->route('all.districts')->with('success' , 'District Added Successfully');
    }//end function storedistrict

    public function editDistrict($id){
        $district = ShipDistrict::find($id);
        return view('backend.ShippingArea.district.edit_district' , compact('district'));
    }//end editdistrict

    public function updateDistrict(Request $request){
        $validate = $request->validate([
            'district_name' => 'required|string',
        ]);
        $district = ShipDistrict::find($request->id);
        $district-> division_id = $request->division_id;
        $district->division_name = $request->division_name;
        $district->save();
        return redirect()->route('all.coupons')->with('success' , 'District Updated Successfully');
    }//end update district

    public function deleteDistrict($id){
        $district = ShipDistrict::findOrFail($id);
        $district->delete();
        return redirect()->back()->with('success' , 'District Deleted Successfully');
    }//end delete district

        ////////////// Start States Area 

        public function viewStates(){
            $divisions = ShipDivision::latest()->get();
            $districts = ShipDistrict::latest()->get();
            $states = ShipState::with('division' , 'district')->get();
            return view('backend.ShippingArea.state.all_states' , compact('districts', 'divisions', 'states'));
        }//end function viewdistrict
    
        public function storeState(Request $request){
            $validate = $request->validate([
                'District_name' => 'required|string',
            ]);
            ShipState::insert([
                'district_id' => $request->district_id,
                'division_id' => $request->division_id,
                'state_name' =>$request->state_name,
            ]);
                return redirect()->route('all.states')->with('success' , 'State Added Successfully');
        }//end function storedistrict
    
        public function editState($id){
            $state = ShipState::find($id);
            return view('backend.ShippingArea.state.edit_state' , compact('state'));
        }//end editdistrict
    
        public function updateState(Request $request){
            $validate = $request->validate([
                'state_name' => 'required|string',
            ]);
            $state = ShipState::find($request->id);
            $state-> division_id = $request->division_id;
            $state-> district_id = $request->district_id;
            $state->state_name = $request->state_name;
            $state->save();
            return redirect()->route('all.states')->with('success' , 'State Updated Successfully');
        }//end update district
    
        public function deleteState($id){
            $state = ShipState::findOrFail($id);
            $state->delete();
            return redirect()->back()->with('success' , 'State Deleted Successfully');
        }//end delete district

}
