<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentRequest;
use App\Models\Equipment;
use App\Models\EquipmentCategory;
use App\Models\SerialNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EquipmentController extends Controller
{
    public function serial_numbers(Equipment $equipment){
        return $equipment->available_serial_numbers;
    }
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
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Equipment list', 'link' => '/equipment' ],
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
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Equipment list', 'link' => '/equipment' ],
            [ 'name' => 'New Equipment', 'link' => '/equipment/create' ],
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
        /*if($request->validateSerialNumbers($request->serial_numbers) === false)
            return redirect()->back()->withErrors(['serial_number', '"Invalid format of the serial number']);*/

        $equipment = Equipment::query()->create($request->validated());
        foreach ($request->serial_numbers as $serial_number){
            SerialNumber::query()->create(['serial_number'=>$serial_number, 'equipment_id'=>$equipment->id]);
        }
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
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Equipment list', 'link' => '/equipment' ],
            [ 'name' => 'Equipment details', 'link' => '/equipment/'.$equipment->id ],
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
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Equipment list', 'link' => '/equipment' ],
            [ 'name' => 'Edit Equipment details', 'link' => '/equipment/'.$equipment->id.'/edit' ],
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
        DB::beginTransaction();

        $equipment->update($request->validated());

        //Ova logika vazi pod uslovom da je serijski broj jedinstven za razlicitu opremu!!!
        foreach ($request->serial_numbers as $serial_number){
            if(SerialNumber::query()->where('equipment_id',$equipment->id)->where('serial_number',$serial_number)->count()){
                continue;
            }
            else{
                SerialNumber::query()->create(['serial_number'=>$serial_number, 'equipment_id'=>$equipment->id]);
            }
        }

        $old_equipment = SerialNumber::query()->where('equipment_id',$equipment->id)->whereNotIn('serial_number',array_values($request->serial_numbers))->get();

        try{
            foreach($old_equipment as $equipment){
                if(!$equipment->is_used)$equipment->delete();
            }
        }catch (\Exception $e){
            DB::rollback();
        }

        DB::commit();

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
        $equipment->serial_numbers()->delete();
        $equipment->delete();
        return redirect('/equipment');
    }
}
