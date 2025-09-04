<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function ProjectsIndex(){
        return view('backend.projects.projects');
    }

    public function createProjects(){
        return view('backend.projects.manage_projects');
    }
}