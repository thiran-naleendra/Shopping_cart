<?php

namespace App\Http\Controllers;

use  App\Models\Menu;
use App\Models\area;
use App\Models\Sales;
use Carbon\Carbon;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

        $menu = Menu::get();
        return view('order', compact('menu'));
    }

    public function foodOrder()
    {

        return view('food_order');
    }

    public function checkOut()
    {
        $area = area::get();
        return view('food_order_checkout', compact('area'));
    }

    public function addToCart($id, Request $request)
    {
        // Find the food item from the Menu model
        $food = Menu::find($id);

        // Get the current cart from session
        $menu = session()->get('menu', []);

        // Get the quantity from the form
        $qtys = $request->input('qtys', 1); // Default to 1 if no quantity is provided

        // If the item is already in the cart, update the quantity
        if (isset($menu[$id])) {
            $menu[$id]['quantity'] += $qtys; // Increment quantity if the item already exists
        } else {
            // Add the item to the cart with the quantity
            $menu[$id] = [
                "name" => $food->name,
                "price" => $food->price,
                "quantity" => $qtys,
            ];
        }

        // Store the updated cart in the session
        session()->put('menu', $menu);

        // Return back with success message
        return redirect()->back()->with('success', 'Food added to cart successfully');
    }



    public function removeFromCart($id)
    {
        $menu = session('menu', []);

        if (isset($menu[$id])) {
            unset($menu[$id]); // Remove item
            session(['menu' => $menu]); // Update session
        }

        return redirect()->route('food_order')->with('success', 'Item removed from cart.');
    }





    public function storeSales()
    {
        // if (session('menu')) {
        //     // Get the currently authenticated user (if you want to associate the sale with a user)
        //     $user = auth()->user();

        //     foreach (session('menu') as $id => $item) {
        //         Sales::create([
        //             'item_name' => $item['name'],
        //             'price' => $item['price'],
        //             'qty' => $item['quantity'],
        //             'user_id' => $user->id, // Replace with the appropriate user ID
        //             // Add other data as needed
        //         ]);
        //     }

        //     // Redirect or return a response as needed
        // }
        try {
            if (session('menu')) {
                // Get the currently authenticated user (if you want to associate the sale with a user)
                $user = auth()->user();


                foreach (session('menu') as $id => $item) {
                    Sales::create([
                        'item_name' => $item['name'],
                        'price' => $item['price'],
                        'qty' => $item['quantity'],
                        'user_id' => $user->id,
                        'user_name' => $user->name,
                        'status' => 1,
                        'created_at' => Carbon::now()


                    ]);
                }

                // Redirect or return a success message
                return back()->with('success', 'Sale successfully recorded.');
            }
        } catch (\Exception $e) {
            // Handle the exception, you can log it or display an error message
            return back()->with('error', 'An error occurred while recording the sale.');
        }
    }
}
