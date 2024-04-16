<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Models\Department;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stages = Stage::with('department.faculty')->get();
        return view('stages.stage_index', compact('stages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('stages.stage_create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStageRequest $request)
    {

        $stage = new Stage();
        $stage->name = $request->input('name');
        $stage->code = $request->input('code');
        $stage->department_id = $request->input('department_id');
        $stage->save();

        return redirect()->route('stages'); // Ensure the correct route name
    }

    /**
     * Display the specified resource.
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stage $stage)
    {

        $departments = Department::all();
        return view('stages.stage_edit', compact('departments', 'stage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStageRequest $request, Stage $stage)
    {

        $stage->name = $request->input('name');
        $stage->code = $request->input('code');
        $stage->department_id = $request->input('department_id');
        $stage->update();
        return redirect()->route('stages');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stage $stage)
    {
        //
    }
}
