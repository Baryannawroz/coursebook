<?php

namespace App\Http\Controllers;

use App\Models\Modelinfo;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModelinfoRequest;
use App\Http\Requests\UpdateModelinfoRequest;

class ModelinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modelinfos = Modelinfo::get('id', 'name');
        return view('models.modleinfo_index');
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
    public function store(StoreModelinfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Modelinfo $modelinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modelinfo $modelinfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModelinfoRequest $request, Modelinfo $modelinfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modelinfo $modelinfo)
    {
        //
    }
}
