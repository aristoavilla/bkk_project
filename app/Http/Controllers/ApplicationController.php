<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = auth()->user()->applications()->with('career')->get();

        return view('dashboard.applications.index',[
            'title' => 'My Applications',
            'applications' => $applications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($career)
    {
        $career = Career::findOrFail($career); // Retrieve all careers for the dropdown
        return view('dashboard.applications.create', compact('career'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        $request->validated();

        $application = new Application();
        $application->user_id = Auth::id();
        $application->career_id = $request->career_id;
        $application->domicile = $request->domicile;
        $application->description = $request->description;

        // Store files in the 'uploads' folder
        $application->resume = $request->file('resume')->store('uploads/resumes', 'public');
        $application->self_picture = $request->file('self_picture')->store('uploads/self_pictures', 'public');
        $application->competence_certificate = $request->file('competence_certificate')->store('uploads/competence_certificates', 'public');
        $application->identity_card = $request->file('identity_card')->store('uploads/identity_cards', 'public');


        // Set status to 'pending'
        $application->status = 'pending';

        $application->save();

        return redirect()->route('applications.index')->with('success', 'Application created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
