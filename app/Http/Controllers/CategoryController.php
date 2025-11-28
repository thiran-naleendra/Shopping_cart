<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function categorystore(Request $request)
    {
        $input = $request->all();
 
        $request->validate([            
            'category_name' => 'string|max:255',
            'code' => 'string|max:255',
            'description' => 'string|max:255'
            
        ]);
       
        Category::create($input);
        return redirect('category')->with('flash_message', 'Member Added!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Category $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $department)
    {
        //
    }
}
