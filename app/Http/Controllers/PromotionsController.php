<?php
 
namespace App\Http\Controllers;
 
use App\Models\Promotions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

 
class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotions::latest()->paginate(5);
     
        return view('promotions.index',compact('promotions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotions.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
   
        $input = $request->all();
   
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
     
        Promotions::create($input);
      
        return redirect()->route('index')
                        ->with('success','Promotion created successfully.');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $promotions
     * @return \Illuminate\Http\Response
     */
    public function show(Promotions $promotions)
    {
  
        return view('promotions.show',compact('promotions'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotions  $promotions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('promotions.edit',compact('promotions'));
        $promotions = Promotions::find($id);
        return view('promotions.edit', compact('promotions'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotions  $promotions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);
   
        $promotions = Promotions::findOrFail($id);
   
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
           
        $promotions->update($input);
     
        return redirect()->route('index')
                        ->with('success','Product updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotions  $promotions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotions = Promotions::find($id);
        if (!$promotions) {
            return redirect()->route('index')->with('error', 'Product not found');
        }
    
        $promotions->delete();
    
        return redirect()->route('index')->with('success', 'Product deleted successfully');
    }
}