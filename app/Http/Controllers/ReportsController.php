<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Tasks;
use Illuminate\Http\Request;
use DB;

class ReportsController extends Controller
{
    public function ProjectReports(){
        $projects = Projects::all();
        $task_count = DB::table('tasks')
            ->select('project_id', DB::raw('COUNT(*) as total_tasks'))
            ->groupBy('project_id')
            ->get()
            ->keyBy('project_id');
        
        $on_progress = DB::table('tasks')
            ->select('project_id', DB::raw('COUNT(*) as ongoing'))
            ->groupBy('project_id', 'status')
            ->whereIn('status', [0, 1])
            ->get()
            ->keyBy('project_id');

        $completed = DB::table('tasks')
            ->select('project_id', DB::raw('COUNT(*) as complete'))
            ->groupBy('project_id', 'status')
            ->where('status', 2)
            ->get()
            ->keyBy('project_id');
        
        $project_members = DB::table("project_members")
            ->select("projects_id", DB::raw("COUNT(user_id) as members"))
            ->groupBy("projects_id")
            ->get()
            ->keyBy('projects_id');
        

        return view('backend.reports.project_reports', compact('projects', 'task_count', 'on_progress', 'completed', 'project_members'));
    }
    public function TaskReports(){
        $task_progress = Tasks::select(
            "tasks.*",
            "projects.name as project_name",
            "users.name as user_name"
        )
        ->join("projects", "projects.id", "=", "tasks.project_id")
        ->join("users", "users.id", "=", "tasks.assigned_user")
        ->get();
        return view('backend.reports.task_reports', compact('task_progress'));
    }
    public function ProductivityReports(){
        return view('backend.reports.productivity_reports');
    }
}