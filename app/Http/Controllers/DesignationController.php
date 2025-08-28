<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function DesignationIndex(){
        return view('backend.designation');
    }
}