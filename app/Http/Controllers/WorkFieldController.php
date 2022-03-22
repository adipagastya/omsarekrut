<?php

namespace App\Http\Controllers;

use App\Models\WorkField;
use App\Http\Requests\StoreWorkFieldRequest;
use App\Http\Requests\UpdateWorkFieldRequest;

class WorkFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkFieldRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkFieldRequest $request)
    {
        //
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
    public function edit(WorkField $workField)
    {
        //
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
        //
    }
}
