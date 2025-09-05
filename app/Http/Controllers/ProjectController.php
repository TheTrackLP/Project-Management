<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Project_user;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function ProjectsIndex(){
        $prjs = Projects::select(
            "projects.*",
            "categories.cat_name",
            "users.name as prj_man",
        )
        ->join("categories", "categories.id", "=", "projects.category_id")
        ->join("users", "users.id", "=", "projects.project_manager_id")
        ->get();
        return view('backend.projects.projects', compact('prjs'));
    }

    public function createProjects(){
        $users = User::select(
            "users.*",
            "categories.cat_name",
            "designations.desg_name"
        )
        ->join("categories", "categories.id", "users.category_id")
        ->join("designations", "designations.id", "users.designation_id")
        ->get();
        $cate = Categories::all();
        return view('backend.projects.manage_projects', compact('users', 'cate'));
    }

    public function ProjectStore(Request $request){
        $valid = Validator::make($request->all(),[
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'project_manager_id' => 'required',
            'category_id' => 'required',
            'status' => 'required',
            'description' => 'required',
            'priority' => 'required',
        ]);

        if($valid->fails()){
            return redirect()->route('projects.index')
                             ->with([
                                'message' => 'Error, Try Again!',
                                'alert-type' => 'error'
                             ]);
        }

        $project = Projects::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'project_manager_id' => $request->project_manager_id,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'description' => $request->description,
            'priority' => $request->priority,
        ]);

        $project->members()->attach($request->team_members);


        return redirect()->route('projects.index')
                        ->with([
                            'message' => 'Success, Data Stored!',
                            'alert-type' => 'success',
                        ]);
    }
}