<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class DashboardCareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.careers.index', [
            'title' => 'Careers',
            'careers' => Career::all(),
            'paginatedCareers' => Career::paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.careers.create', [
            'title' => 'Create Career',
            'careers' => Career::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $career = $request->validate([
            'company' => 'required|max:100',
            'location' => 'required|max:255',
            'job_title' => 'required|max:100',
            'description' => 'required',
            'user_id' => 'required'
        ]);

        Career::create($career);

        return redirect('/dashboard/careers')->with('success', 'New career has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        return view('dashboard.careers.show', [
            'title' => $career->job_title,
            'career' => $career
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {

        return view('dashboard.careers.edit', [
            'title' => 'Update Career',
            'career' => $career
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Career $career)
    {
        $updateCareer = $request->validate([
            'company' => 'required|max:100',
            'location' => 'required|max:255',
            'job_title' => 'required|max:100',
            'description' => 'required',
            'user_id' => 'required'
        ]);

        Career::where('id', $career->id)
            ->update($updateCareer);

        return redirect('/dashboard/careers')->with('success', 'A career has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
            Career::destroy($career->id);
            return redirect('/dashboard/careers')->with('success', 'A Career has been deleted');
    }
}
