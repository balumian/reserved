<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Capacity;
use Illuminate\Http\Request;

class CapacityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $capacity = $request->user()->business->capacity;
        return view('business.capacity.index',['capacity' => $capacity]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('business.capacity.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            // Validation
            $request->validate([
                'capacity' => ['required','max:255'],
                'capacity_ar' => ['required','max:255'],
                'description' => ['max:512']
            ]);

            $business = $request->user()->business;
            
            $capacity = [
                'capacity' => [
                    'en' => $request->capacity,
                    'ar' => $request->capacity_ar
                ],
                'description' => $request->description
                ];

            if($request->status){

                $capacity['status'] = true;

            }else{

                $capacity['status'] = false;
                
            }

            $business->capacity()->create($capacity);

            return back()->with('success', 'Capacity Added Successfully!');

        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Capacity $capacity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $capacity = Capacity::find($id);
        return view('business.capacity.edit',['capacity' => $capacity]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Capacity $capacity)
    {
        try{
            // Validation
            $request->validate([
                'capacity' => ['required','max:255'],
                'capacity_ar' => ['required','max:255'],
                'data_id' => ['required'],
                'description' => ['max:512']
            ]);

            $capacity = Capacity::find($request->data_id);
            
            $capacity->capacity =  [
                    'en' => $request->capacity,
                    'ar' => $request->capacity_ar
            ]; 
            $capacity->description = $request->description;
            if($request->status){

                $capacity->status = true;

            }else{

                $capacity->status = false;
                
            }

            $capacity->save();

            return back()->with('success', 'Capacity Added Successfully!');

        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $request->validate([
                'data_id' => ['required']
            ]);
            $capacity = Capacity::find($request->data_id);
            
            if ($capacity) {
                $capacity->delete();
                return back()->with('success', 'Capacity Deleted Successfully!');
            }
            return back()->with('error', 'Something went wrong!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the bulk resource from storage.
     */
    public function bulk_destroy(Request $request)
    {
        try {
            $request->validate([
                'action' => ['required'],
                'list' => ['required']
            ]);
            if ($request->action == 'delete') {
                foreach ($request->list as $list) {
                    $capacity = Capacity::find($list);
                    if ($capacity) {
                        $capacity->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
