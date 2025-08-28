<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryIndex(){
        return view('backend.categories');
    }
}