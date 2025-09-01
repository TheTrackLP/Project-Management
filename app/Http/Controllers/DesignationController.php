<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Designation;
use Validator;

class DesignationController extends Controller
{
    public function DesignationIndex(){
        $cate = Categories::all();
        $desg = Designation::select(
                            "designations.*",
                            "categories.cat_name"
                            )
                            ->join("categories", 'categories.id', '=', 'designations.category_id')
                            ->get();
        return view('backend.designation', compact('cate', 'desg'));
    }

    public function DesignationStore(Request $request){
        $valid = Validator::make($request->all(), [
            'desg_name' => 'required',
            'category_id' => 'required',
            'desg_notes' => 'required',
        ]);

        if ($valid->fails()) {
            return redirect()->route('desig.index')
                 ->with([
                    'meesage' => 'Error, Try Again!',
                    'alert-type' => 'error',
                 ]);
        }

        Designation::create([
            'desg_name' => $request->desg_name,
            'category_id' => $request->category_id,
            'desg_notes' => $request->desg_notes,
        ]);
    
        return redirect()->route('desig.index')
             ->with([
                'meesage' => 'Success, Data Stored!',
                'alert-type' => 'success',
             ]);
    }

    public function DesignationEdit($id){
        $desg = Designation::findOrFail($id);
        return response()->json([
            'desg'=>$desg,
        ]);
    }

     public function DesignationUpdate(Request $request){
        $valid = Validator::make($request->all(), [
            'desg_name' => 'required',
            'category_id' => 'required',
            'desg_notes' => 'required',
        ]);

        if ($valid->fails()) {
            return redirect()->route('desig.index')
                 ->with([
                    'meesage' => 'Error, Try Again!',
                    'alert-type' => 'error',
                 ]);
        }

        Designation::findOrFail($request->id)->update([
            'desg_name' => $request->desg_name,
            'category_id' => $request->category_id,
            'desg_notes' => $request->desg_notes,
        ]);
    
        return redirect()->route('desig.index')
             ->with([
                'meesage' => 'Success, Data Updated!',
                'alert-type' => 'success',
             ]);
    }

    public function DesignationDelete($id){
        Designation::findOrFail($id)->delete();
        return redirect()->route('desig.index')
         ->with([
            'meesage' => 'Success, Data Deleted!',
            'alert-type' => 'warning',
         ]); 
    }
}