<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $amenities = Amenities::all();
        return view('admin.businesses.amenities.list', ['amenities' => $amenities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.businesses.amenities.add');
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

            $amenity = new Amenities();
            $translations = [
                'en' => $request->title,
                'ar' => $request->title_ar
            ];
            $amenity->title =  $translations;
            $amenity->description =  $request->description;

            if (!$request->status) {
                $amenity->status = false;
            } else {
                $amenity->status = true;
            }
            $amenity->save();
            return back()->with('success', 'Amenity Added Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Amenities $amenities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $amenity = Amenities::find($id);
        return view('admin.businesses.amenities.edit', ['amenity' => $amenity]);
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

            $amenity = Amenities::find($request->data_id);
            $translations = [
                'en' => $request->title,
                'ar' => $request->title_ar
            ];
            $amenity->title =  $translations;
            $amenity->description =  $request->description;

            if (!$request->status) {
                $amenity->status = false;
            } else {
                $amenity->status = true;
            }
            $amenity->save();
            return back()->with('success', 'Amenity Updated Successfully!');
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
            $amenity = Amenities::find($request->data_id);
            
            if ($amenity) {
                $amenity->delete();
                return back()->with('success', 'Amenity Deleted Successfully!');
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
                    $amenity = Amenities::find($list);
                    if ($amenity) {
                        $amenity->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
