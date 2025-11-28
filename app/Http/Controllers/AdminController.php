<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        
        return view('AdminDashboard.AdminHome'); // Pass the $promotions variable to the view
    }

    public function addUser()
    {   $user = User::get();
        return view('AdminDashboard.addUser')->with('user', $user); 
    }

    public function adminLogout()
    {
        Auth::logout(); // Log the user out

        return redirect('/login'); // Redirect to the login page or any other desired page
    }

    
}
