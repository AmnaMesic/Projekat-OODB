<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workouts = DB::table('workouts')->get();

        return view('workouts.index', ['workouts' => $workouts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipments = DB::table('equipment')->get();
        $workout_periods = DB::table('workout_periods')->get();
        $trainers = DB::table('trainers')->get();

        return view('workouts.add', [
            'equipments' => $equipments,
            'workout_periods' => $workout_periods,
            'trainers' => $trainers
        ]);
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

        DB::table('workouts')->insert([
            'name' => $request->name,
            'body_part' => $request->body_part,
            'workout_level' => $request->workout_level,
            'series_number' => $request->series_number,
            'repetitions_number' => $request->repetitions_number,
            'calories_burned' => $request->calories_burned,
            'equipment' => $request->equipment,
            'workout_period' => $request->workout_period,
            'trainer' => $request->trainer,
        ]);

        return redirect()->route('workouts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function show(Workout $workout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;

        $workouts = DB::table('workouts')
            ->where('id', $id)
            ->get();

        $equipments = DB::table('equipment')->get();
        $workout_periods = DB::table('workout_periods')->get();
        $trainers = DB::table('trainers')->get();

        return view('workouts.edit', [
            'workouts' => $workouts,
            'equipments' => $equipments,
            'workout_periods' => $workout_periods,
            'trainers' => $trainers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'body_part' => 'required|string',
        ]);

        $update_query = DB::table('workouts')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'body_part' => $request->body_part,
                'workout_level' => $request->workout_level,
                'series_number' => $request->series_number,
                'repetitions_number' => $request->repetitions_number,
                'calories_burned' => $request->calories_burned,
                'equipment' => $request->equipment,
                'workout_period' => $request->workout_period,
                'trainer' => $request->trainer,
            ]);

        return redirect()->route('workouts');
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

        Workout::destroy($id);

        // ILI
        // DB::table('workouts')->where('id', $id)->delete();

        return redirect()->route('workouts');
    }
}
