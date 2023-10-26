<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProducersResource;
use App\Models\Producers;
use Illuminate\Http\Request;

class ProducersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Producers::query();

        $sort = null;
        if($request->filled("sort"))
        {
            $sort = $request->input("sort");
            $query->orderBy($sort,"desc");
        }

        if($sort == "amount")
        {
            $query = $query->get()->sortBy("amount", SORT_REGULAR, true);
        } 
        else $query = $query->get();
        return ProducersResource::collection($query);
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
        $name = $request->input('name');
        $producers = Producers::create([
            'name'=> $name
            ]);
        return response()->json([
            'data' => new ProducersResource($producers),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Producers $Producer)
    {
        return new ProducersResource($Producer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producers $producers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producers $Producer)
    {
        $name = $request->input('name');
        $Producer->update([
            'name'=> $name
        ]);
        return response()->json([
            'data' => new ProducersResource($Producer),
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producers $Producer)
    {
        $Producer->delete();
        return response()->json(null);
    }

    public function search($name, Producers $Producer)
    {
        $producers = $Producer->where('name','like','%'. $name .'%')->get();
        return ProducersResource::collection($producers);
    }
}
