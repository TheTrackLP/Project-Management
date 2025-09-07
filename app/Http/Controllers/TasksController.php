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
        $tasks = Tasks::select(
            "tasks.*",
            "projects.name as project_name",
            "users.name as assigned_name"
        )
        ->join("projects", "projects.id", "=", "tasks.project_id")
        ->join("users", "users.id", "=", "tasks.assigned_user")
        ->get();
        return view('backend.tasks', compact('prjs', 'tasks'));
    }

    public function getAssignedUsers($id){
        $assigned_members = Projects::with('members')->findOrFail($id);
        return response()->json($assigned_members->members);
    }

    public function TaskStore(Request $request){
        $valid = Validator::make($request->all(), [
            'task_name' => 'required',
            'project_id' => 'required',
            'description' => 'required',
            'assigned_user' => 'required',
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
            'task_name' => $request->task_name,
            'project_id' => $request->project_id,
            'description' => $request->description,
            'assigned_user' => $request->assigned_user,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'priority' => $request->priority,
            'status' => $request->status,
        ]);
        return redirect()->route('tasks.index')
                 ->with([
                    'message' => 'Success, Data Stored!',
                    'alert-type' => 'success',
                 ]);
    }

    public function TaskInfo($id){
        $task = Tasks::findorfail($id);
        return response()->json([
            "task"=>$task,
        ]);
    }

    public function taskUpdate(Request $request){
        $valid = Validator::make($request->all(), [
            'task_name' => 'required',
            'project_id' => 'required',
            'description' => 'required',
            'assigned_user' => 'required',
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

        Tasks::findOrFail($request->id)->update([
            'task_name' => $request->task_name,
            'project_id' => $request->project_id,
            'description' => $request->description,
            'assigned_user' => $request->assigned_user,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'priority' => $request->priority,
            'status' => $request->status,
        ]);
        
        return redirect()->route('tasks.index')
                 ->with([
                    'message' => 'Success, Data Updated!',
                    'alert-type' => 'success',
                 ]);
    }
}