<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // UPIT 1: Ispisati opremu koja se najčešće koristila u vježbi.
        $most_common_equipments = DB::table('equipment')
            ->select('equipment.*', DB::raw('count(*) as brojac'))
            ->groupBy('equipment.id')
            ->join('workouts', 'equipment.id', '=', 'workouts.equipment')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // UPIT 2: Ispisati težinu opreme koja se najviše koristila u vježbama.
        $most_common_equipment_weights = DB::table('equipment')
            ->select('equipment.weight', DB::raw('count(*) as brojac'))
            ->groupBy('equipment.id')
            ->join('workouts', 'equipment.id', '=', 'workouts.equipment')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // UPIT 3: Ispisati termin u kojem su se najčešće radile vježbe.
        $most_common_workout_periods = DB::table('workout_periods')
            ->select('workout_periods.*', DB::raw('count(*) as brojac'))
            ->groupBy('workout_periods.id')
            ->join('workouts', 'workout_periods.id', '=', 'workouts.workout_period')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // UPIT 4: Ispisati trenera sa najviše održanih vježbi.
        $most_common_trainers = DB::table('trainers')
            ->select('trainers.*', DB::raw('count(*) as brojac'))
            ->groupBy('trainers.id')
            ->join('workouts', 'trainers.id', '=', 'workouts.trainer')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // UPIT 5: Ispisati trenere koji su držali vježbe koristeći težinu opreme od 5 kg.
        $most_common_trainer_weights = DB::table('trainers')
            ->select('trainers.*')
            ->groupBy('trainers.id')
            ->join('workouts', 'trainers.id', '=', 'workouts.trainer')
            ->join('equipment', 'workouts.equipment', '=', 'equipment.id')
            ->where('equipment.weight', 5)
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        return view('dashboard', [
            'most_common_equipments' => $most_common_equipments,
            'most_common_equipment_weights' => $most_common_equipment_weights,
            'most_common_workout_periods' => $most_common_workout_periods,
            'most_common_trainers' => $most_common_trainers,
            'most_common_trainer_weights' => $most_common_trainer_weights
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
