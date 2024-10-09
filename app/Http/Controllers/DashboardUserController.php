<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'title' => 'Users',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'title' => 'Create User',
            'user_types' => UserType::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        Hash::make($request->password);

        User::create($request->validated());

        return redirect()->route('users.index')->with('success', 'New user has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.users.show',[
            'title' => $user->username,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit',[
            'title' => 'Edit User',
            'user' => $user,
            'user_types' => UserType::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        Hash::make($request->password);

        $validatedUser = $request->validated();
        
        User::where('id', $user->id)
            ->update($validatedUser);

        return redirect()->route('users.index')->with('success', 'User has been updated');
   
    }

    /**
     * Remove the specified resource from storage.
     */ 
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect()->route('users.index')->with('success', 'A user has been deleted');
    }
}
