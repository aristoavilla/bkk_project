<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.applicants.index', [
            'title' => 'Applicants',
            'applicants' => Application::latest()->get()
        ]);
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
    public function show(Application $applicant)
    {
        return view('dashboard.applicants.show', [
            'applicant' => $applicant,
            'title' => 'Detail of Applicant: ' . $applicant->user->username
        ]);
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

    // ApplicantController.php
    public function accept(Application $applicant)
    {
        $applicant->status = 'accepted';
        $applicant->save();

        return redirect()->back()->with('success', 'Application accepted successfully!');
    }

    public function reject(Application $applicant)
    {
        $applicant->status = 'rejected';
        $applicant->save();

        return redirect()->back()->with('success', 'Application rejected successfully!');
    }


    // ApplicantController.php
    public function accepted()
    {
        $applicants = Application::where('status', 'accepted')->get();
        return view('dashboard.applicants.index', [
            'title' => 'Accepted Applications',
            'applicants' => $applicants
        ]);
    }

    public function rejected()
    {
        $applicants = Application::where('status', 'rejected')->get();
        return view('dashboard.applicants.index', [
            'title' => 'Rejected Applications',
            'applicants' => $applicants
        ]);
    }

    public function pending()
    {
        $applicants = Application::where('status', 'pending')->get();
        return view('dashboard.applicants.index', [
            'title' => 'Pending Applications',
            'applicants' => $applicants
        ]);
    }

}
