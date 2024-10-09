<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Batch;
use App\Models\Alumni;
use App\Models\Gender;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAlumniRequest;
use App\Http\Requests\UpdateAlumniRequest;

class DashboardAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Fetch genders and batches for the dropdowns
        $genders = Gender::all();
        $batches = Batch::all();

        // Fetch alumni with filtering
        $alumnus = Alumni::with('gender', 'batch')
            ->when($request->search, function ($query, $search) {
                $query->where('firstName', 'like', "%{$search}%")
                    ->orWhere('lastName', 'like', "%{$search}%");
            })
            ->when($request->filter_gender, function ($query, $genderId) {
                $query->where('gender_id', $genderId);
            })
            ->when($request->filter_batch, function ($query, $batchId) {
                $query->where('batch_id', $batchId);
            })
            ->get();

        return view('dashboard.alumnus.index', [
            'title' => 'Alumnus',
            'alumnus' => $alumnus,
            'genders' => $genders,
            'batches' => $batches,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.alumnus.create', [
            'title' => 'Create Alumnus',
            'genders' => Gender::all(),
            'batches' => Batch::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumniRequest $request)
    {
        
        $alumni = $request->validated();
        
        Alumni::create($alumni);

        return redirect()->route('alumnus.index')->with('success', 'New alumni has been added');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumni $alumni)
    {
        return view('dashboard.alumnus.show', [
            'title' => $alumni->firstName.' '.$alumni->lastName,
            'alumni' => $alumni
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumni $alumni)
    {
        return view('dashboard.alumnus.edit', [
            'title' => 'Update Alumni',
            'alumni' => $alumni,
            'genders' => Gender::all(),
            'batches' => Batch::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumniRequest $request, Alumni $alumni)
    {
        $validatedAlumni = $request->validated();
        
        Alumni::where('id', $alumni->id)
            ->update($validatedAlumni);

        return redirect()->route('alumnus.index')->with('success', 'Alumni has been updated');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumni $alumni)
    {
        Alumni::destroy($alumni->id);
        return redirect()->route('alumnus.index')->with('success', 'An Alumni has been deleted');
    }
}
