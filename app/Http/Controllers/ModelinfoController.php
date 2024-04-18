<?php

namespace App\Http\Controllers;

use App\Models\Modelinfo;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModelinfoRequest;
use App\Http\Requests\UpdateModelinfoRequest;
use App\Models\Stage;
use App\Models\Subject;

class ModelinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modelinfos = Modelinfo::with('subject', 'stage.department')->get();

        return view('models.modelinfo_index',compact('modelinfos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects=Subject::all();
        $stages=Stage::with('department')->get();
        return view('models.modelinfo_create',compact('subjects','stages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModelinfoRequest $request)
    {
        $validatedData = $request->validated();


        Modelinfo::create($validatedData);
       return redirect()->route("models");

    }

    /**
     * Display the specified resource.
     */
    public function show(Modelinfo $modelinfo)
    {
        return view('models.modelinfo_show')->with('model',$modelinfo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modelinfo $modelinfo)
    {

        $subjects = Subject::all();
        $stages = Stage::with('department')->get();
        return view('models.modelinfo_edit',compact('subjects','stages'))->with('model',$modelinfo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModelinfoRequest $request, Modelinfo $modelinfo)
    {
        $validatedData = $request->validated();

        // Update the Modelinfo instance with the validated data
        $modelinfo->update($validatedData);
      return  redirect()->route('models');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modelinfo $modelinfo)
    {
        //
    }
}
