<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessTypes;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BusinessTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $types = BusinessTypes::get();
        return view('admin.businesses.types.list', ['types' => $types]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.businesses.types.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => ['required','min:3','max:255'],
                'title_ar' => ['required','min:3','max:255']
            ]);
            $type = new BusinessTypes();
            $translations = [
                'en' => $request->title,
                'ar' => $request->title_ar
            ];
            $type->title =  $translations;
            $type->description =  $request->description;

            if (!$request->status) {
                $type->status = false;
            }
            $type->save();
            return back()->with('success', 'Business Type Added Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessTypes $businessTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $type = BusinessTypes::find($id);
        return view('admin.businesses.types.edit', ['type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'title' => ['required','min:3','max:255'],
                'title_ar' => ['required','min:3','max:255'],
                'data_id' => ['required']
            ]);
            $type = BusinessTypes::find($request->data_id);
            $translations = [
                'en' => $request->title,
                'ar' => $request->title_ar
            ];
            $type->title =  $translations;
            $type->description =  $request->description;

            if (!$request->status) {
                $type->status = false;
            }else{
                    $type->status = true;

            }
            $type->save();
            return back()->with('success', 'Business Type Updated Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try{
            $request->validate([
                'data_id' => ['required']
            ]);
            
            $type = BusinessTypes::find($request->data_id);
            $type->delete();
            return back()->with('success', 'Business Type Deleted Successfully!');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }
}
