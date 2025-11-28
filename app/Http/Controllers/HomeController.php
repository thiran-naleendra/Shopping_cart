<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotions;

class HomeController extends Controller
{
    public function index()
    {
        $promotions = Promotions::all(); // Retrieve all promotions from the database

        return view('home', compact('promotions')); // Pass the $promotions variable to the view
    }

    
}
