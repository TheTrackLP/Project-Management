<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Designation;
use Illuminate\Http\Request;
use Validator;
use Hash;
use App\Models\User;

class UsersController extends Controller
{
    public function UsersIndex()
    {
        $cat = Categories::all();
        $desg = Designation::all();
        return view('backend.users', compact('cat', 'desg'));
    }

    public function UsersStore(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'avatar' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'category_id' => 'required',
            'designation_id' => 'required',
        ]);

        if ($valid->fails()) {
            return redirect()->route("users.index")
                ->with([
                    'message' => 'Error, Try Again!',
                    'alert-type' => 'error',
                ]);
        }

        User::create([
            'avatar' => $request->avatar,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'category_id' => $request->category_id,
            'designation_id' => $request->designation_id,
        ]);

        return redirect()->route("users.index")
            ->with([
                'message' => 'Success, Data Stored!',
                'alert-type' => 'success',
            ]);
    }
}
