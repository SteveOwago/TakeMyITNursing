<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\DashboardService;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $dashboardService;
    public function __construct(DashboardService $dashboardService)
    {
        $this->middleware('auth');
        $this->dashboardService = $dashboardService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        //Define Dashboard Statistics
        $dashboardStatistics = $this->dashboardService->getDashboardStatistics();
        $topCategories = $this->dashboardService->getTestCategories();
        return view('home', compact('posts','dashboardStatistics','topCategories'));
    }
}
