<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Trip::with('places')->get();
        return response()->json($data, 201);
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
    public function store(Request $request)
    {
        $data = $request->all();
        $tripData = Trip::create($data);
        if (array_key_exists('places', $data)) {
            $placesData = $data['places'];
            $tripData->places()->createMany($placesData);
        };
        return response()->json($tripData, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Trip::with('places')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);
        $trip->update($request->all());
        return response()->json($trip, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Trip::destroy($id);
        return response()->json(null, 204);
    }
}
