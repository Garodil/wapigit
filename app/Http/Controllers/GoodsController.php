<?php

namespace App\Http\Controllers;

use App\Http\Resources\GoodsResource;
use App\Models\Categories;
use App\Models\Goods;
use App\Models\Producers;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Goods::query();

        if ($request->filled("category_id")) {
        $category = $request->input("category_id");
        $query->where("categories_id", $category);
        }
        if ($request->filled("producer_id")) {
        $producer = $request->input("producer_id");
        $query->where("producers_id", $producer);
        }
        if ($request->filled("category")) {
        $category = Categories::all()->where("name", $request->input("category"))->first()->id;
        $query->where("categories_id", $category);
        }
        if($request->filled("producer"))
        {
        $producer = Producers::all()->where("name", $request->input(""))->first()->id;
        $query->where("producers_id", $producer);
        }

        $sort = null;
        if($request->filled("sort"))
        {
            $sort = $request->input("sort");
            $query->orderBy($sort,"desc");
        }
        
        if($sort == "rating")
        {
            $query = $query->get()->sortBy("rating", SORT_REGULAR, true);
        } 
        else $query = $query->get();
        //$result = Goods::query()->where("categories_id", $category)->orWhere("producers_id", $producer)->get();



        return GoodsResource::collection($query);
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
        $cost = $request->input('cost');
        $producer = $request->input('producer_id');
        $category = $request->input('category_id');
        $goods = Goods::create([
            'name'=> $name,
            'cost'=> $cost,
            'category_id'=> $category,
            'producer_id'=> $producer
            ]);
        return response()->json([
            'data' => new GoodsResource($goods),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Goods $Good)
    {
        return new GoodsResource($Good);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goods $Goods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goods $Good)
    {
        $name = $request->input('name');
        $cost = $request->input('cost');
        $producer = $request->input('producer_id');
        $category = $request->input('category_id');

        $Good->update([
            'name' => $name,
            'cost' => $cost,
            'category_id' => $category,
            'producer_id' => $producer
        ]);
        return response()->json([
            'data' => new GoodsResource($Good)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goods $Good)
    {
        $Good->delete();
        return response()->json(null);
    }

    public function search($name, Goods $Good)
    {
        $goods = $Good->where('name','like','%'. $name .'%')->get();
        return GoodsResource::collection($goods);
    }
}
