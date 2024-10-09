<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alumni;
use App\Models\Career;
use App\Models\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $users;
    public $careers;
    public $alumnus;

    // Constructor to initialize properties globally for this controller
    public function __construct()
    {
        // Initialize the database queries here
        $this->users = User::all();
        $this->careers = Career::all();
        $this->alumnus = Alumni::all();
    }

    public function index() {
        $acceptedCount = Application::where('status', 'accepted')->count();
        $rejectedCount = Application::where('status', 'rejected')->count();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'users' => $this->users,
            'careers' => $this->careers,
            'paginatedCareers' => Career::paginate(4),
            'acceptedCount' => $acceptedCount,
            'rejectedCount' => $rejectedCount,
            'alumnus' => $this->alumnus
        ]);
    }
}
