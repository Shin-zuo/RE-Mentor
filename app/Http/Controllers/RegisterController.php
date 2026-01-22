<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register');
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
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            // FIX BELOW: Changed 'unique' to 'unique:enrollments'
            'email' => 'required|string|email|max:255|unique:enrollments',
            'phone' => 'required|string|max:11',
            'plan_type' => 'required|string|max:100',
            'payment_reference' => 'nullable|required_if:plan_type,full|unique:enrollments|max:50',
        ]);

        Enrollment::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'plan_type' => $validate['plan_type'],
            'payment_reference' => $validate['payment_reference'] ?? null,
            'status' => ($request->plan_type === 'free') ? 'approved' : 'pending',
        ]);

        return response()->json(['success' => true, 'message' => 'Registration successful.']);
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
