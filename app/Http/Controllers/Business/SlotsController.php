<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Slots;
use Illuminate\Http\Request;

class SlotsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('business.slots.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('business.slots.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Slots $slots)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slots $slots)
    {
        return view('business.slots.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slots $slots)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slots $slots)
    {
        //
    }
}
