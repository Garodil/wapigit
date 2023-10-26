<?php

namespace App\Http\Controllers;

use App\Http\Resources\GoodsResource;
use App\Http\Resources\RatingsResource;
use App\Models\Ratings;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RatingsResource::collection(Ratings::all());
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
        $rate = $request->input('rate');
        $goods_id = $request->input('goods_id');
        $ratings = Ratings::create([
            'rate'=> $rate,
            'goods_id'=> $goods_id
            ]);
        return response()->json([
            'data' => new RatingsResource($ratings),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ratings $Rating)
    {
        return new RatingsResource($Rating);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ratings $ratings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ratings $Rating)
    {
        $rate = $request->input("rate");
        $goods_id = $request->input("goods_id");

        $Rating->update([
            'rate' => $rate,
            'goods_id' => $goods_id
        ]);
        return response()->json([
            'data' => new RatingsResource($Rating),
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ratings $Rating)
    {
        $Rating->delete();
        return response()->json(null);
    }
}
