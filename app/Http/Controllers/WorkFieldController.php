<?php

namespace App\Http\Controllers;

use App\Models\WorkField;
use App\Models\Region;
use App\Models\User;
use App\Http\Requests\StoreWorkFieldRequest;
use App\Http\Requests\UpdateWorkFieldRequest;

class WorkFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, WorkField $workfield)
    {
        return view('dashboard.workfields.index', [
            'title' => 'Bidang Pekerjaan',
            'userCount' => $user,
            'workfields' => $workfield::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Region $region, User $user)
    {
        return view('dashboard.workfields.create', [
            'title' => 'Tambah Bidang Pekarjaan',
            'regions' => $region::all(),
            'userCount' => $user::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkFieldRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkFieldRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'region_id' => 'required',
            'type' => 'required'
        ]); 

        WorkField::create($validatedData);

        return redirect('/dashboard/workfields')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkField  $workField
     * @return \Illuminate\Http\Response
     */
    public function show(WorkField $workField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkField  $workField
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkField $workField, Region $region)
    {
        return view('dashboard.workfields.edit', [
            'title' => 'Ubah Bidang Pekerjaan',
            'workfield' => $workField,
            'regions' => $region::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkFieldRequest  $request
     * @param  \App\Models\WorkField  $workField
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkFieldRequest $request, WorkField $workField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkField  $workField
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkField $workField)
    {
        WorkField::destroy($workField->id);
        return redirect('/dashboard/workfields')->with('success', 'Data berhasil dihapus');
    }
}
