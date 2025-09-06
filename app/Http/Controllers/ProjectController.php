<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Project_members;
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

    public function ProjectsView($id){
        $prj_info = Projects::select(
                            "projects.*",
                            "users.name as manager_name",
                            "users.email as manager_email",
                            "users.phone_number as manager_number",
                            "categories.cat_name",
                            )
                            ->join("users", "users.id", "=", "projects.project_manager_id")
                            ->join("categories", "categories.id", "=", "projects.category_id")
                            ->where("projects.id", $id)
                            ->first();

        $members = Project_members::select(
                            "project_members.*",
                            "users.name as member_name",
                            "users.email as member_email",
                            "users.category_id as member_category",
                            "users.designation_id as member_desgination",
                            "categories.cat_name",
                            "designations.desg_name",
                            "projects.id",
                        )
                        ->join("users", "users.id", "=", "project_members.user_id")
                        ->join("projects", "projects.id", "=", "project_members.projects_id")
                        ->join("categories", "categories.id", "=", "users.category_id")
                        ->join("designations", "designations.id", "=", "users.designation_id")
                        ->where("projects.id", $id)
                        ->get();
        return view('backend.projects.view_project', compact('prj_info', 'members'));
    }

    public function ProjectManage($id){
        $prj_data = Projects::findOrFail($id);
        $users = User::select(
            "users.*",
            "categories.cat_name",
            "designations.desg_name"
        )
        ->join("categories", "categories.id", "users.category_id")
        ->join("designations", "designations.id", "users.designation_id")
        ->get();
        $cate = Categories::all();

        $members = Project_members::select(
                            "project_members.*",
                            "users.name as member_name",
                            "users.email as member_email",
                            "users.category_id as member_category",
                            "users.designation_id as member_desgination",
                            "categories.cat_name",
                            "designations.desg_name",
                            "projects.id",
                        )
                        ->join("users", "users.id", "=", "project_members.user_id")
                        ->join("projects", "projects.id", "=", "project_members.projects_id")
                        ->join("categories", "categories.id", "=", "users.category_id")
                        ->join("designations", "designations.id", "=", "users.designation_id")
                        ->where("projects.id", $id)
                        ->get();

        $selectedMembers = $members->pluck('user_id')->toArray();
        return view('backend.projects.manage_projects', compact('users', 'cate', 'prj_data', 'selectedMembers'));
    }

    public function ProjectUpdate(Request $request){
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

        $project = Projects::findOrFail($request->id);
            
        $project->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'project_manager_id' => $request->project_manager_id,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'description' => $request->description,
            'priority' => $request->priority,
        ]);
        
        $project->members()->sync($request->team_members);

        return redirect()->route('projects.index')
                        ->with([
                            'message' => 'Success, Data Updated!',
                            'alert-type' => 'success',
                        ]);
    }
}