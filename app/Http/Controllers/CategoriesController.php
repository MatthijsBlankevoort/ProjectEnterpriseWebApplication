<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll()
    {

        $categories = \App\Category::all();

        return view('pages/submitpost')->with('categories', $categories);

    }

  


}
