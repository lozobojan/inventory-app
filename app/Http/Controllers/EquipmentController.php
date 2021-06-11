<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentRequest;
use App\Models\Equipment;
use App\Models\EquipmentCategory;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipment = Equipment::all();
        $content_header = "Equipment list";
        $breadcrumbs = [
            ['name' => 'Home', 'link' => '/'],
            ['name' => 'Equipment list', 'link' => '/equipment'],
        ];
        return view('equipment.index', compact(['equipment', 'content_header', 'breadcrumbs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = EquipmentCategory::all();
        $content_header = "Add New Equipment";
        $breadcrumbs = [
            ['name' => 'Home', 'link' => '/'],
            ['name' => 'Equipment list', 'link' => '/equipment'],
            ['name' => 'New Equipment', 'link' => '/equipment/create'],
        ];
        return view('equipment.create', compact(['categories', 'content_header', 'breadcrumbs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentRequest $request)
    {
        Equipment::query()->create($request->validated());
        return redirect(route('equipment.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        $content_header = "Equipment details";
        $serial_numbers = $equipment->serial_numbers;
        $breadcrumbs = [
            ['name' => 'Home', 'link' => '/'],
            ['name' => 'Equipment list', 'link' => '/equipment'],
            ['name' => 'Equipment details', 'link' => '/equipment/' . $equipment->id],
        ];
        return view('equipment.show', compact(['content_header', 'breadcrumbs', 'equipment', 'serial_numbers']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        $categories = EquipmentCategory::all();
        $content_header = "Edit Equipment details";
        $breadcrumbs = [
            ['name' => 'Home', 'link' => '/'],
            ['name' => 'Equipment list', 'link' => '/equipment'],
            ['name' => 'Edit Equipment details', 'link' => '/equipment/' . $equipment->id . '/edit'],
        ];
        return view('equipment.edit', compact(['categories', 'content_header', 'breadcrumbs', 'equipment']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(EquipmentRequest $request, Equipment $equipment)
    {
        $equipment->update($request->validated());
        return redirect('/equipment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect('/equipment');
    }

    public function serials(Equipment $equipment)
    {
        return $equipment->serial_numbers;
    }
}
