<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $features = Feature::all();
        return view('admin.businesses.features.list', ['features' => $features]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.businesses.features.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => ['required','min:3','max:255'],
                'title_ar' => ['required','min:3','max:255'],
            ]);

            $feature = new Feature();
            $translations = [
                'en' => $request->title,
                'ar' => $request->title_ar
            ];
            $feature->title =  $translations;
            $feature->description =  $request->description;

            if (!$request->status) {
                $feature->status = false;
            } else {
                $feature->status = true;
            }
            $feature->save();
            return back()->with('success', 'Feature Added Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $feature = Feature::find($id);
        return view('admin.businesses.features.edit', ['feature' => $feature]);
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
                'data_id' => ['required'],
            ]);

            $feature = Feature::find($request->data_id);
            $translations = [
                'en' => $request->title,
                'ar' => $request->title_ar
            ];
            $feature->title =  $translations;
            $feature->description =  $request->description;

            if (!$request->status) {
                $feature->status = false;
            } else {
                $feature->status = true;
            }
            $feature->save();
            return back()->with('success', 'Feature Updated Successfully!');
        } catch (\Exception $e) {
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
            $feature = Feature::find($request->data_id);
            
            if ($feature) {
                $feature->delete();
                return back()->with('success', 'Feature Deleted Successfully!');
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
                    $feature = Feature::find($list);
                    if ($feature) {
                        $feature->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
