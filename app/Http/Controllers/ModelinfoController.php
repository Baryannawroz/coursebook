<?php

namespace App\Http\Controllers;

use App\Models\Modelinfo;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModelinfoRequest;
use App\Http\Requests\UpdateModelinfoRequest;
use App\Models\DeliveryPlan;
use App\Models\Module_evaluation;
use App\Models\Stage;
use App\Models\Subject;
use App\Models\SubjectContent;
use App\Models\User;
use Illuminate\Http\Request;

class ModelinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (auth()->user()->role == 0) {
            $modelinfos = Modelinfo::with('subject', 'stage.department')
                ->where('user_id', auth()->user()->id)
                ->get();
        } else
            $modelinfos = Modelinfo::with('subject', 'stage.department')->get();

        return view('models.modelinfo_index', compact('modelinfos'));
    }
    public function sameshow($id, $subject_id)
    {


        $modelinfos = Modelinfo::with('subject', 'stage.department')
            ->where('subject_id', $subject_id)
            ->get();


        return view('models.modelinfo_copy', compact('modelinfos', 'id'));
    }
    public function approved()
    {
        $modelinfos = Modelinfo::with('subject', 'stage.department')
            ->where('approved', 0)
            ->get();

        return view('models.modelinfo_approved', compact('modelinfos'));
    }
    public function copy(Modelinfo $modelinfo, $copy)
    {
        $newModuleInfo = Modelinfo::find($copy);
        $newModuleInfo->module_type = $modelinfo->module_type;
        $newModuleInfo->module_code = $modelinfo->module_code;
        $newModuleInfo->credits = $modelinfo->credits;
        $newModuleInfo->module_leader = $modelinfo->module_leader;
        $newModuleInfo->module_level = $modelinfo->module_level;
        $newModuleInfo->semester_of_delivery = $modelinfo->semester_of_delivery;
        $newModuleInfo->administering_department = $modelinfo->administering_department;
        $newModuleInfo->faculty = $modelinfo->faculty;
        $newModuleInfo->module_leader_email = $modelinfo->module_leader_email;
        $newModuleInfo->module_leader_academic_title = $modelinfo->module_leader_academic_title;
        $newModuleInfo->module_leader_qualification = $modelinfo->module_leader_qualification;
        $newModuleInfo->module_tutor_name = $modelinfo->module_tutor_name;
        $newModuleInfo->module_tutor_email = $modelinfo->module_tutor_email;
        $newModuleInfo->peer_reviewer_name = $modelinfo->peer_reviewer_name;
        $newModuleInfo->peer_reviewer_email = $modelinfo->peer_reviewer_email;
        $newModuleInfo->approval_date = $modelinfo->approval_date;
        $newModuleInfo->version_number = $modelinfo->version_number;
        $newModuleInfo->module_learning_outcomes = $modelinfo->module_learning_outcomes;
        $newModuleInfo->indicative_contents = $modelinfo->indicative_contents;
        $newModuleInfo->module_aims = $modelinfo->module_aims;
        $newModuleInfo->strategies = $modelinfo->strategies;
        $newModuleInfo->required_texts = $modelinfo->required_texts;
        $newModuleInfo->recommended_texts = $modelinfo->recommended_texts;
        $newModuleInfo->websites = $modelinfo->websites;
        $newModuleInfo->subject_id = $modelinfo->subject_id;
        $newModuleInfo->co_requisites = $modelinfo->co_requisites;
        $newModuleInfo->pre_requisites = $modelinfo->pre_requisites;
        $newModuleInfo->approved = $modelinfo->approved;
        $newModuleInfo->save();
    
        return redirect()->route('models');

    }
    public function approving(Modelinfo $modelinfo)
    {
        $modelinfo->approved = 1;
        $modelinfo->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        $users = User::where('role', 0)->get();
        $stages = Stage::with('department')->get();
        return view('models.modelinfo_create', compact('subjects', 'stages', 'users'));
    }
    public function createPresindens()
    {
        $subjects = Subject::all();
        $users = User::where('role', 0)->get();
        $stages = Stage::with('department')->get();
        return view('models.modelinfo_create', compact('subjects', 'stages', 'users'));
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

        $contents = SubjectContent::where('subject_id', $modelinfo->subject_id)->get();
        $module_evaluations = Module_evaluation::where('modelinfo_id', $modelinfo->id)->get();



        $subjectContents = DeliveryPlan::join('subject_contents', 'delivery_plans.material_covered_id', '=', 'subject_contents.id')
            ->where('delivery_plans.modelinfo_id', $modelinfo->id)
            ->select('delivery_plans.*', 'subject_contents.material_covered') // Select specific columns from SubjectContent
            ->get();




        $model_id = $modelinfo->id;




        return view('models.modelinfo_show', compact('subjectContents', "module_evaluations", 'contents', 'model_id'))->with('model', $modelinfo);
    }
    public function showpdf(Modelinfo $modelinfo)
    {

        $contents = SubjectContent::where('subject_id', $modelinfo->subject_id)->get();
        $module_evaluations = Module_evaluation::where('modelinfo_id', $modelinfo->id)->get();



        $subjectContents = DeliveryPlan::join('subject_contents', 'delivery_plans.material_covered_id', '=', 'subject_contents.id')
            ->where('delivery_plans.modelinfo_id', $modelinfo->id)
            ->select('delivery_plans.*', 'subject_contents.material_covered') // Select specific columns from SubjectContent
            ->get();




        $model_id = $modelinfo->id;




        return view('models.modelinfo_showpdf', compact('subjectContents', "module_evaluations", 'contents', 'model_id'))->with('model', $modelinfo);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modelinfo $modelinfo)
    {

        $subjects = Subject::all();
        $stages = Stage::with('department')->get();
        return view('models.modelinfo_edit', compact('subjects', 'stages'))->with('model', $modelinfo);
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

    public function related(Modelinfo $modelinfo)
    {

        return view('models.attribute.relations')->with('model', $modelinfo);
    }

    public function relatedupdate(Request $request, Modelinfo $modelinfo)
    {


        $validatedData = $request->validate([
            'pre_requisites' => 'required',
            'co_requisites' => 'required'
        ]);

        // Update the Modelinfo instance with the validated data
        $modelinfo->update($validatedData);
        return  redirect()->route('model.show', $modelinfo->id);
    }
    public function resources(Modelinfo $modelinfo)
    {

        return view('models.attribute.resources')->with('model', $modelinfo);
    }

    public function resourcesupdate(Request $request, Modelinfo $modelinfo)
    {


        $validatedData = $request->validate([
            'required_texts' => 'required',
            'recommended_texts' => 'required',
            'websites' => 'required'
        ]);

        // Update the Modelinfo instance with the validated data
        $modelinfo->update($validatedData);
        return  redirect()->route('model.show', $modelinfo->id);
    }
    public function strategie(Modelinfo $modelinfo)
    {

        return view('models.attribute.strategies')->with('model', $modelinfo);
    }

    public function strategieupdate(Request $request, Modelinfo $modelinfo)
    {


        $validatedData = $request->validate([
            'strategies' => 'required',
        ]);

        // Update the Modelinfo instance with the validated data
        $modelinfo->update($validatedData);
        return  redirect()->route('model.show', $modelinfo->id);
    }
    public function aim(Modelinfo $modelinfo)
    {

        return view('models.attribute.aims')->with('model', $modelinfo);
    }

    public function aimupdate(Request $request, Modelinfo $modelinfo)
    {


        $validatedData = $request->validate([
            'module_learning_outcomes' => 'required',
            'module_aims' => 'required',
            'indicative_contents' => 'required'
        ]);

        // Update the Modelinfo instance with the validated data
        $modelinfo->update($validatedData);
        return  redirect()->route('model.show', $modelinfo->id);
    }
    public function evalution(Modelinfo $modelinfo)
    {
        $moduleEvaluations = Module_evaluation::where('modelinfo_id', $modelinfo->id)->get();
        return view('models.attribute.evalution', compact('moduleEvaluations'))->with('model', $modelinfo);
    }

    public function evalutionupdate(Request $request, Modelinfo $modelinfo)
    {

        Module_evaluation::where('modelinfo_id', $modelinfo->id)->delete();

        foreach ($request->evaluation as $key => $value) {
            Module_evaluation::create([
                'modelinfo_id' => $modelinfo->id,
                'evaluation' => $request->evaluation[$key],
                'number_time' => $request->number_time[$key],
                'weight_mark' => $request->weight_mark[$key],
                'week_due' => $request->week_due[$key],
                'relevant_learning_outcome' => $request->relevant_learning_outcome[$key],
            ]);
        }
        return  redirect()->route('model.show', $modelinfo->id);
    }
}
