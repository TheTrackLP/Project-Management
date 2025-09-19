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

        return view('backend.reports.project_reports', compact('projects', 'task_count'));
    }
    public function TaskReports(){
        return view('backend.reports.task_reports');
    }
    public function ProductivityReports(){
        return view('backend.reports.productivity_reports');
    }
}