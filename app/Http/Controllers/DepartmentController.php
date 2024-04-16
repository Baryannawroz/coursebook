<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Faculty;
use App\Policies\DepartmentPolicy;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::with('faculty')->get();


        return view('departments.department_index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculty::all();

        return view('departments.department_create', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $department = new Department();
        $department->name = $request['name'];
        $department->code = $request['code'];
        $department->faculty_id = $request['faculty_id'];
        $department->save();
        return redirect()->route('departments');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {


        $faculties = Faculty::all();
        return view('departments.department_edit', compact('faculties', 'department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
       $department->name= $request['name'];
       $department->code=$request['code'];
       $department->faculty_id=$request['faculty_id'];
       $department->update();
       return  redirect()->route("departments");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
