<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Services\GoogleClassroomService; //
use Illuminate\Support\Facades\Mail; // <--- ADD THIS
use App\Mail\ApplicationReceived;

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
    // 1. Validate Inputs
    // NOTICE: We removed 'unique:enrollments' from the email rule 
    // because we want to handle the logic manually below.
    $validate = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255', 
        'phone' => 'required|string|max:11',
        'plan_type' => 'required|string|max:100',
        'payment_reference' => 'nullable|required_if:plan_type,full|unique:enrollments|max:50',
    ]);

    // 2. Check if student already exists
    $student = Enrollment::where('email', $validate['email'])->first();
    $isNewRegistration = true; // Track if we created or updated

    if ($student) {
        // --- CASE A: Student Exists ---
        
        // Scenario 1: They already have Full Access (Pending or Approved)
        if ($student->plan_type === 'full') {
            return response()->json([
                'message' => 'This email is already registered for Full Access.'
            ], 422);
        }

        // Scenario 2: They are Free and want Free again (Double Dipping)
        if ($student->plan_type === 'free' && $request->plan_type === 'free') {
            return response()->json([
                'message' => 'You have already used your Free Trial. Please upgrade to Full Access.'
            ], 422);
        }

        // Scenario 3: They are Free and want to UPGRADE to Full (The Valid Case)
        if ($student->plan_type === 'free' && $request->plan_type === 'full') {
            
            // Update their existing record
            $student->update([
                'name' => $validate['name'], // Update name just in case
                'phone' => $validate['phone'],
                'plan_type' => 'full',
                'payment_reference' => $validate['payment_reference'],
                'status' => 'pending', // Reset status to pending for review
            ]);
            
            $isNewRegistration = false; // We didn't create new, we updated
        }

    } else {
        // --- CASE B: New Student (Does not exist) ---
        $student = Enrollment::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'plan_type' => $validate['plan_type'],
            'payment_reference' => $validate['payment_reference'] ?? null,
            'status' => ($request->plan_type === 'free') ? 'approved' : 'pending',
        ]);
    }

    // 3. POST-REGISTRATION ACTIONS (Emails & Invites)

    if ($request->plan_type === 'free' && $isNewRegistration) {
        // Only invite to Classroom if it's their FIRST time registering as free
        try {
            $google = new GoogleClassroomService();
            $courseId = env('GOOGLE_CLASSROOM_FREE_ID'); 
            if ($courseId) {
                $google->inviteStudent($validate['email'], $courseId);
            }
        } catch (\Exception $e) {
            Log::error('Google Classroom Invite Failed: ' . $e->getMessage());
        }
    } 
    elseif ($request->plan_type === 'full') {
        // Send email for BOTH new full users AND upgraded users
        try {
            Mail::to($student->email)->send(new ApplicationReceived($student));
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
        }
    }

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