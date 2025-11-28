<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterUserController extends Controller
{
    public function addUser(Request $request)
    {
        try {
            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
                'user_role' => request('user_role'),
            ]);
        
            return back()->with('success', 'Successfully added');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while adding the user: ' . $e->getMessage());
        }
    }
    public function deleteUser(Request $request)
    {
        User::find($request->input('id'))->delete();
        return back()->with('success', 'Successfully deleted Item!');
    }
}
