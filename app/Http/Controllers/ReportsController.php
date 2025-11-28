<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Sales;


class ReportsController extends Controller
{
    public function index()
    {
        $sales = Sales::get();
        return view('AdminDashboard.Reports')->with('sales', $sales);
    }

    public function updateStatus(Request $request, $id)
    {
        // Retrieve the sale record
    $sale = Sales::findOrFail($id);

    // Call the updateStatus method defined in the Sales model
    $sale->updateStatus($request->status);

    // Redirect back with a success message
    return back()->with('success', 'Status updated successfully!');
    }
}
