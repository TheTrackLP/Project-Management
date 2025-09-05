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
        $users = User::select(
                        "users.*",
                        "designations.desg_name",
                        )
                        ->join("designations", "designations.id", "=", 'users.designation_id')
                        ->get();
        return view('backend.users', compact('cat', 'desg', 'users'));
    }

    public function UsersStore(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
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
        
        $path = '';

        if($request->hasFile('avatar')){
            $filename = str_replace(' ', '_', $request->name) . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('img'), $filename);
            $path = 'img/'. $filename;
        } else {
            $path = 'img/profile-blank.png';
        }
        User::create([
            'avatar' => $path,
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

    public function UserInfo($id){
        $info = User::findOrFail($id);
        return response()->json([
            'info'=>$info,
        ]);
    }

    public function UserInfoUpdate(Request $request){
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
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
                
        $path = $request->curr_avatar ?: 'img/profile-blank.png';

        if ($request->hasFile('avatar')) {
            if ($request->curr_avatar && $request->curr_avatar !== 'img/profile-blank.png') {
                $oldPath = public_path($request->curr_avatar);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $filename = str_replace(' ', '_', $request->name) . '.' .
                        $request->file('avatar')->getClientOriginalExtension();

            $request->file('avatar')->move(public_path('img'), $filename);
            $path = 'img/' . $filename;
        }

        User::findOrFail($request->id)->update([
            'avatar' => $path,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'category_id' => $request->category_id,
            'designation_id' => $request->designation_id,
            'status' => $request->status,
            'roles' => $request->roles,
        ]);

        return redirect()->route("users.index")
            ->with([
                'message' => 'Success, Data Updated!',
                'alert-type' => 'success',
            ]);
    }

    public function UserDelete($id){
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with([
            'message' => 'Success, Data Deleted!',
            'alert-type' => 'warning',
        ]);
    }
}