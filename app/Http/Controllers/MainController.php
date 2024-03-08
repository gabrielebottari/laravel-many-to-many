<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Technology;
use App\Models\Type;

class MainController extends Controller
{

    public function index()
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('guest.welcome', compact('technologies', 'types'));
    }

}



