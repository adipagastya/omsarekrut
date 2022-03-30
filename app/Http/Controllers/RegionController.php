<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\User;
use App\Models\Candidate;
use App\Models\WorkField;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Region $region, Candidate $candidate, WorkField $workfield)
    {
        return view('dashboard.regions.index', [
            'title' => 'Wilayah',
            'userCount' => $user,
            'candidateCount' => $candidate,
            'workCount' => $workfield,
            'regions' => $region::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Candidate $candidate, WorkField $workfield)
    {
        return view('dashboard.regions.create', [
            'title' => 'Tambah Wilayah',
            'candidateCount' => $candidate,
            'workCount' => $workfield,
            'userCount' => $user::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegionRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        Region::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull! Please login');

        return redirect('/dashboard/regions')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region, Candidate $candidate, WorkField $workfield)
    {
        return view('dashboard.regions.edit', [
            'title' => 'Ubah Wilayah',
            'candidateCount' => $candidate,
            'workCount' => $workfield,
            'region' => $region
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegionRequest  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegionRequest $request, Region $region)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        Region::where('id', $region->id)
            ->update($validatedData);

            return redirect('/dashboard/regions')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        Region::destroy($region->id);
        return redirect('/dashboard/regions')->with('success', 'Data berhasil dihapus');
    }
}
