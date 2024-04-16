<?php

namespace App\Http\Controllers;

use App\Models\SubjectContent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectContentRequest;
use App\Http\Requests\UpdateSubjectContentRequest;
use App\Models\Subject;

class SubjectContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = SubjectContent::with('subject')->get();
        return view('contents.content_index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('contents.content_create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectContentRequest $request)
    {
        $content = new  SubjectContent($request->validated());
        $content->save();
        return redirect()->route('contents');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubjectContent $subjectContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubjectContent $subjectContent)
    {
        $subjects = Subject::all();
        return view("contents.content_edit",  compact('subjects', 'subjectContent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectContentRequest $request, SubjectContent $subjectContent)
    {

        // dd($request);
        $subjectContent->material_covered = $request['material_covered'];
        $subjectContent->subject_id = $request['subject_id'];
        $subjectContent->update();
        return redirect()->route('contents');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubjectContent $subjectContent)
    {
        //
    }
}
