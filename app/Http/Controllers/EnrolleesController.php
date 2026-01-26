<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Services\GoogleClassroomService;
use Illuminate\Http\Request;

class EnrolleesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Enrollment::latest();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;

            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%'.$searchTerm.'%')
                    ->orWhere('email', 'LIKE', '%'.$searchTerm.'%')
                    ->orWhere('phone', 'LIKE', '%'.$searchTerm.'%')
                    ->orWhere('plan_type', 'LIKE', '%'.$searchTerm.'%')
                    ->orWhere('payment_reference', 'LIKE', '%'.$searchTerm.'%')
                    ->orWhere('status', 'LIKE', '%'.$searchTerm.'%');
            });
        }

        $enrollees = $query->paginate(10)->withQueryString();

        return view('admin.enrollees', compact('enrollees'));
    }

   public function approve($id)
    {
        try {
            $enrollment = Enrollment::findOrFail($id);
            
            // 1. Get the ID
            $courseId = env('GOOGLE_CLASSROOM_FULL_ID'); 

            // 2. CHECK if the ID is missing (Prevent Silent Failure)
            if (!$courseId) {
                throw new \Exception("Classroom ID not found in .env file.");
            }

            // 3. Update Status
            $enrollment->update(['status' => 'approved']);

            // 4. Invite
            $google = new GoogleClassroomService();
            $google->inviteStudent($enrollment->email, $courseId);
            
            return back()->with('success', 'Student approved and invited successfully.');

        } catch (\Exception $e) {
            // This will now catch the missing ID error and show it in your SweetAlert
            return back()->with('error', 'System Error: ' . $e->getMessage());
        }
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
