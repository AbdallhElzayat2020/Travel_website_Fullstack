<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Statistics
        $totalCategories = Category::count();
        $activeCategories = Category::where('status', 'active')->count();
        $totalSubCategories = SubCategory::count();
        $activeSubCategories = SubCategory::where('status', 'active')->count();
        $totalUsers = User::count();
        $recentCategories = Category::latest()->take(5)->get();
        $recentSubCategories = SubCategory::with('category')->latest()->take(5)->get();

        // Chart data - Categories created per month (last 6 months)
        $categoriesChartData = Category::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Chart data - Sub Categories created per month (last 6 months)
        $subCategoriesChartData = SubCategory::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        return view('dashboard.pages.index', compact(
            'totalCategories',
            'activeCategories',
            'totalSubCategories',
            'activeSubCategories',
            'totalUsers',
            'recentCategories',
            'recentSubCategories',
            'categoriesChartData',
            'subCategoriesChartData'
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
