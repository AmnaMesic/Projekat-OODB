<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = DB::table('equipment')
            ->orderBy('weight')
            ->get();

        return view('equipment.index', ['equipments' => $equipments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipment.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::table('equipment')->insert([
            'name' => $request->name,
            'weight' => $request->weight,
        ]);

        return redirect()->route('equipments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;

        $equipments = DB::table('equipment')
            ->where('id', $id)
            ->get();

        return view('equipment.edit', ['equipments' => $equipments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'weight' => 'required|integer'
        ]);

        $update_query = DB::table('equipment')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'weight' => $request->weight,
            ]);

        return redirect()->route('equipments');
    }

    /**
     * Remove the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id;

        Equipment::destroy($id);

        // ILI
        // DB::table('equipment')->where('id', $id)->delete();

        return redirect()->route('equipments');
    }

    public function file_add(Request $request)
    {
        $id = $request->id;

        $equipments = Equipment::find($id);

        return view('equipment.file_add', [
            'id' => $id,
            'equipments' => $equipments
        ]);
    }

    public function process(Request $request)
    {
        $id = $request->id;

        $equipments = Equipment::find($id);

        $folder_to_save = Str::replace(' ', '_', $equipments->name);

        $file = $request->file('file');

        $filename = $equipments->id . time() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs($folder_to_save, $filename);

        return redirect()->route('equipments');
    }
}
