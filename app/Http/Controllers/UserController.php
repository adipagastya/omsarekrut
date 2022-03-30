<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidate;
use App\Models\WorkField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Candidate $candidate, WorkField $workfield)
    {
        return view('dashboard.users.index', [
            'title' => 'Role User',
            'candidateCount' => $candidate,
            'workCount' => $workfield,
            'users' => $user::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Candidate $candidate, WorkField $workfield)
    {
        return view('dashboard.users.create', [
            'title' => 'Tambah Role User',
            'candidateCount' => $candidate,
            'workCount' => $workfield
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255',
            'is_admin' => 'required'
        ]); 

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['is_admin'] = (int)$validatedData['is_admin'];

        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Candidate $candidate, WorkField $workfield)
    {
        return view('dashboard.users.edit', [
            'title' => 'Ubah Role User',
            'candidateCount' => $candidate,
            'workCount' => $workfield,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:100',
            'is_admin' => 'required'
        ];

        if ($request->email != $user->email) {
            $rules['email'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'Data berhasil dihapus');
    }
}
