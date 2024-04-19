<?php

namespace App\Http\Controllers;

use App\Models\DeliveryPlan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeliveryPlanRequest;
use App\Http\Requests\UpdateDeliveryPlanRequest;

class DeliveryPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreDeliveryPlanRequest $request)
    {
        $validatedData = $request->validated();
        $deliveryPlan = DeliveryPlan::create($validatedData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryPlan $deliveryPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryPlan $deliveryPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeliveryPlanRequest $request, DeliveryPlan $deliveryPlan)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $deliveryPlan)
    {
        $deliveryPlan = DeliveryPlan::find($deliveryPlan);
        $deliveryPlan->delete();

        return redirect()->back();
    }
}
