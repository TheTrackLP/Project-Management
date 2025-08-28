<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Validator;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function CategoryIndex(){
        $category = Categories::all();
        return view('backend.categories', compact('category'));
    }

    public function CategoryStore(Request $request){
        $valid = Validator::make($request->all(), [
            'cat_name' => 'required',
            'cat_notes' => 'required',
        ]);

        if($valid->fails()){
            return redirect()->route('cat.index')
                             ->with([
                                'meesage' => 'Error, Try Again!',
                                'alert-type' => 'error',
                             ]);
        }

        Categories::create([
            'cat_name' => $request->cat_name,
            'cat_notes' => $request->cat_notes,
        ]);

        return redirect()->route('cat.index')
                 ->with([
                    'meesage' => 'Success!, Data Stored',
                    'alert-type' => 'success',
                 ]);
    }
}