<?php

namespace App\Http\Controllers;

use App\Models\Project_members;
use App\Models\Projects;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class TasksController extends Controller
{
    public function TasksIndex(){
        $prjs = Projects::all();
        return view('backend.tasks', compact('prjs'));
    }

    public function getAssignedUsers($id){
        $assigned_members = Projects::with('members')->findOrFail($id);
        return response()->json($assigned_members->members);
    }

    public function TaskStore(Request $request){
        $valid = Validaotr::make($request->all(), [
            'task_name' => 'required',
            'project_id' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'priority' => 'required',
            'status' => 'required',
        ]);

        if($valid->fails()){
            return redirect()->route('tasks.index')
                             ->with([
                                'message' => 'Error, Try Again!',
                                'alert-type' => 'error',
                             ]);
        }

        Tasks::create([
            'task_name' => 'required',
            'project_id' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'priority' => 'required',
            'status' => 'required',
        ]);
    }
}