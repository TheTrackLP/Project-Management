<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function AdminDashboard(){
        $usersCount = User::count();
        $projectsCount = Projects::count();
        $TasksCount = Tasks::count();
        $allProjects = Projects::all();
        return view('admin.dashboard', compact('usersCount', 'projectsCount', 'TasksCount', 'allProjects'));
    }

    public function getProjectsTasks($id){
        $tasks = DB::table("tasks")
                ->select("tasks.*",
                                  "users.name as task_assigned")
                ->join("users", "users.id", "=", "tasks.assigned_user")
                ->where('tasks.project_id', $id)
                ->get();
        
        return response()->json([
            "task"=>$tasks,
        ]);
    }
}