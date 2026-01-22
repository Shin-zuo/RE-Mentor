<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;

class EnrolleesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Enrollment::latest();

        if($request -> has('search') && $request -> search != '') {
            $searchTerm = $request -> search;

            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('email', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('phone', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('plan_type', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('payment_reference', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('status', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $enrollees = $query->paginate(10)->withQueryString();

        return view('admin.enrollees', compact('enrollees'));
    }

    public function approve($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update(['status' => 'approved']);
        
        return back()->with('success', 'Student approved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
