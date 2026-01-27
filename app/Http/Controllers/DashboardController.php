<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Existing Stats
        $enrolleeCount = Enrollment::count();
        $pendingEnrolleeCount = Enrollment::where('status', 'pending')->count();
        $fullAccessWithActiveEnrolleeCount = Enrollment::where('plan_type', 'full')
            ->where('status', 'approved')
            ->count();

        // 2. Get Available Years (Distinct years from DB + Current Year)
        $availableYears = Enrollment::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        // Ensure current year is always available even if no data yet
        if (!in_array(date('Y'), $availableYears)) {
            array_unshift($availableYears, date('Y'));
        }

        // 3. Prepare Monthly Data for EACH available year
        $monthlyDataByYear = [];

        foreach ($availableYears as $year) {
            // Initialize 12 months with 0
            $monthlyCounts = array_fill(1, 12, 0); 
            
            $data = Enrollment::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->whereYear('created_at', $year)
                ->groupBy('month')
                ->pluck('count', 'month')
                ->toArray();

            foreach ($data as $month => $count) {
                $monthlyCounts[$month] = $count;
            }

            $monthlyDataByYear[$year] = [
                'labels' => collect(range(1, 12))->map(fn($m) => Carbon::create()->month($m)->format('M'))->toArray(),
                'data'   => array_values($monthlyCounts)
            ];
        }

        // 4. Prepare Chart Data (All Time / Yearly)
        $yearlyEnrollees = Enrollment::selectRaw('YEAR(created_at) as year, COUNT(*) as count')
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('count', 'year')
            ->toArray();

        $chartDataAllTime = [
            'labels' => array_keys($yearlyEnrollees),
            'data'   => array_values($yearlyEnrollees)
        ];

        return view('admin.dashboard', compact(
            'enrolleeCount', 
            'pendingEnrolleeCount', 
            'fullAccessWithActiveEnrolleeCount',
            'monthlyDataByYear',
            'chartDataAllTime',
            'availableYears'
        ));
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
