<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Old_price;
use App\Models\Promotions;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function menu()
    {
        $Category = Category::get();
        $Starters = Menu::where('category_id', 6)->get();
        $Pasta = Menu::where('category_id', 7)->get();
        $Juice = Menu::where('category_id', 8)->get();
        $promotions = Promotions::all(); // Retrieve all promotions from the database
        //dd($Pasta);

        return view('menu')->with(['Category' => $Category, 'Starters' => $Starters, 'Pasta' => $Pasta, 'Juice' => $Juice, 'promotions' => $promotions]);
    }
    public function index()
    {

        $Category = Category::get();
        $Menu = Menu::get();
        //dd($Menu);
        return view('AdminDashboard.menu_create')->with(['Category' => $Category, 'Menu' => $Menu,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:255',
            'category_id' => 'nullable',
            'price' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable'
        ]);

        // insert record
        $menu = Menu::create([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'qty' => $request->input('qty')
        ]);

        // upload menu image
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '-menu' . '.' . $extention;
            $file->move('uploads/menu/', $filename);
            $menu->image = $filename;

            $menu->save();
        }

        return redirect('menu_create')->with('flash_message', 'Menu Added!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function menuedit(Menu $menu, $id)
    {
        $Category = Category::get();
        $menu = Menu::where('id', $id)->firstOrfail();
        return view('menu_edit', compact('menu', 'Category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function menu_update(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'code' => 'nullable|string|max:255',
        'category_id' => 'nullable|exists:category,id',
        'price' => 'nullable|numeric',
        'old_price' => 'nullable|numeric',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'id' => 'required|exists:menu,id', // Ensure the ID exists in the menus table
    ]);

    // Find the menu record by ID
    $menu = Menu::find($request->input('id'));

    if (!$menu) {
        // Redirect back with an error message if the menu is not found
        return back()->withErrors(['id' => 'The menu with the provided ID does not exist.'])->withInput();
    }

    // Update the menu fields
    $menu->name = $request->input('name');
    $menu->code = $request->input('code');
    $menu->category_id = $request->input('category_id');
    $menu->price = $request->input('price');
    $menu->old_price = $request->input('old_price');
    $menu->description = $request->input('description');

    // Save updated menu
    $menu->save();

    // Update old price history
    $oldPriceHistory = new Old_price();
    $oldPriceHistory->menu_id = $menu->id;
    $oldPriceHistory->old_price = $request->input('old_price', $menu->old_price);
    $oldPriceHistory->save();

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '-menu.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/menu'), $filename);

        $menu->image = $filename;
        $menu->save();
    }

    // Redirect back with success message
    return back()->with('success', 'Menu updated successfully!');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Menu::find($request->input('id'))->delete();
        return back()->with('success', 'Successfully deleted Item !');
    }


    // category create

    public function createCategory(Request $request)
    {
        $category = Category::create(
            [
                'category_name' => request('catagory_name'),
                'CODE' => "",
                'description' => request('catagory_discription'),
            ]
        );
        return back()->with('success', 'Sucessfully added');
    }
}
