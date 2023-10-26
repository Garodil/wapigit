<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesResource;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoriesResource::collection(Categories::all());
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
        $categories = Categories::create([
            'name'=> $name
            ]);
        return response()->json([
            'data' => new CategoriesResource($categories),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $Category)
    {
        return new CategoriesResource($Category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $Category)
    {
        $name = $request->input('name');
        $Category->update([
            'name'=> $name
        ]);
        return response()->json([
            'data' => new CategoriesResource($Category),
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $Category)
    {
        $Category->delete();
        return response()->json(null);
    }
}
