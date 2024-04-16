<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties  = Faculty::all();

        return View("faculties.faculty_index", compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("faculties.faculty_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacultyRequest $request)
    {
        $faculty = new Faculty();
        $faculty->name = $request['name'];
        $faculty->code = $request['code'];
        $faculty->save();
        return redirect()->route('faculties');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $faculty)
    {
        $content = $faculty->input('content');

        // Do whatever you need to do with the submitted data
        dd($content);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {

        return view("faculties.faculty_edit", compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacultyRequest $request, Faculty $faculty)
    {

        $faculty->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('faculties');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        //
    }
}
