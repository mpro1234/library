<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Rental::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return Rental::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }
    public function show(Rental $rental)
    {
        //
        return $rental;
    }
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }
    public function update(Request $request, Rental $rental)
    {
        //
        $rental->update($request->all());
        return $rental;

    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
    public function destroy(Rental $rental)
    {
        //
        $rental->delete();
        return response()->noContent();
    }
}
