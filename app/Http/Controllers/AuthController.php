<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Move this line here
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


use App\Models\Sales;


// ...


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');



        if (Auth::attempt($credentials)) {
            // Authentication passed...


            return redirect()->intended('/menu');
        }

        return back()->withErrors(['name' => 'Invalid credentials']);
    }
    public function logout()
    {
        Auth::logout(); // Log the user out

        return redirect('/clogin'); // Redirect to the login page or any other desired page
    }



    public function Clogin()
    {


        return view('customerlogin');
    }

    public function customerLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');



        if (Auth::attempt($credentials)) {
            // Authentication passed...


            return redirect()->intended('/home');
        }

        return back()->withErrors(['name' => 'Invalid credentials']);
    }

    public function userProfile()
{
    // Check if the user is authenticated
    if (Auth::check()) {
        $user = Auth::user(); // Get the currently authenticated user
        $sales = Sales::where('user_id', $user->id)->get(); // Fetch the sales for the user
        return view('userProfile')->with('user', $user)->with('sales', $sales); // Pass the sales data to the view
    } else {
        // If the user is not logged in, return with an error message
        return redirect()->route('clogin')->with('error', 'Please log in to view your profile and order history.');
    }
}

    public function userReg()
    {


        return view('userRegister');
    }
    public function createUser(Request $request)
    {
        try {
            $customer = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
                'address' => request('address'),
                'user_role' => "user",
                'mobile_no' => request('mobileno'),
                'dob' => request('dob'),
            ]);

            return back()->with('success', 'Successfully added');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while adding the user: ' . $e->getMessage());
        }
    }
}
