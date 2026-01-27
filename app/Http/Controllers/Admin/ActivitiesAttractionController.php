<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivitiesAttraction;
use App\Models\Areas;
use App\Models\Countries;
use App\Models\Emirates;
use Illuminate\Http\Request;

class ActivitiesAttractionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attractions = ActivitiesAttraction::all();
        return view('admin.attractions.list', ['attractions' => $attractions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Countries::all();
        $emirates = Emirates::all();
        $areas = Areas::all();
        return view('admin.attractions.add', ['countries' => $countries, 'emirates' => $emirates, 'areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        try {
            $request->validate([
                'title' => ['required','min:3','max:255'],
                'title_ar' => ['required','min:3','max:255'],
                'stitle' => ['required','min:3','max:255'],
                'stitle_ar' => ['required','min:3','max:255'],
                'phone' => ['required','numeric'],
                'price' => ['required','numeric'],
                'emirate' => ['required'],
                'area' => ['required'],
            ]);

            $attraction = new ActivitiesAttraction();
            $attraction->title = [
                'en' => $request->title,
                'ar' => $request->title_ar,
            ];
            $attraction->stitle = [
                'en' => $request->stitle,
                'ar' => $request->stitle_ar,
            ];
            $attraction->code = $request->code;
            $attraction->phone = $request->phone;
            $attraction->price = $request->price;
            $attraction->emirates_id = $request->emirate;
            $attraction->areas_id = $request->area;
            $attraction->description = [
                'en' => $request->description,
                'ar' => $request->description_ar,
            ];
            if ($request->hasFile('gallery')) {
                $paths = array();
                foreach ($request->file('gallery') as $key => $file) {
                    $path = "";
                    $path = multi_files_store($request, $file, 'gallery', 'attraction', $key);
                    array_push($paths, $path);
                }
                $attraction->gallery = json_encode($paths);
            }

            if ($request->hasFile('cover_photo')) {
                $request->validate([
                    'cover_photo' => 'mimes:gif,jpg,png,pdf'
                ]);
                $path = "";
                $path = store_files_with_thumbnail($request, 'cover_photo', 'attraction');
                $attraction->cover_photo = $path;
            }

            if ($request->status) {
                $attraction->status = true;
            } else {
                $attraction->status = false;
            }
            $attraction->user_id = $request->user()->id;
            $attraction->save();

            return back()->with('success', 'Activities & Attraction Saved Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $attraction = ActivitiesAttraction::find($id);
        return view('admin.attractions.show', ['attraction' => $attraction]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $attraction = ActivitiesAttraction::find($id);
        $countries = Countries::all();
        $emirates = Emirates::all();
        $areas = Areas::all();
        return view('admin.attractions.edit', ['attraction' => $attraction, 'countries' => $countries, 'emirates' => $emirates, 'areas' => $areas]);
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
                'stitle' => ['required','min:3','max:255'],
                'stitle_ar' => ['required','min:3','max:255'],
                'phone' => ['required','numeric'],
                'price' => ['required','numeric'],
                'emirate' => ['required'],
                'area' => ['required'],
                'data_id' => ['required'],
            ]);

            $attraction = ActivitiesAttraction::find($request->data_id);

            $attraction->title = [
                'en' => $request->title,
                'ar' => $request->title_ar,
            ];

            $attraction->stitle = [
                'en' => $request->stitle,
                'ar' => $request->stitle_ar,
            ];

            $attraction->code = $request->code;
            $attraction->phone = $request->phone;
            $attraction->price = $request->price;
            $attraction->emirates_id = $request->emirate;
            $attraction->areas_id = $request->area;

            $attraction->description = [
                'en' => $request->description,
                'ar' => $request->description_ar,
            ];

            if ($request->hasFile('gallery')) {
                $paths = array();
                foreach ($request->file('gallery') as $key => $file) {
                    $path = multi_files_store($request, $file, 'gallery', 'attraction', $key);
                    array_push($paths, $path);
                }
                $attraction->gallery = $paths;
            }

            if ($request->hasFile('cover_photo')) {
                $request->validate([
                    'cover_photo' => 'mimes:gif,jpg,png,pdf'
                ]);
                $path = "";
                $path = store_files_with_thumbnail($request, 'cover_photo', 'attraction');
                $attraction->cover_photo = $path;
            }

            if ($request->status) {
                $attraction->status = true;
            } else {
                $attraction->status = false;
            }
            $attraction->user_id = $request->user()->id;

            $attraction->save();

            return back()->with('success', 'Activities & Attraction Update Successfully!');
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
            $attraction = ActivitiesAttraction::find($request->data_id);

            if ($attraction) {
                $attraction->delete();
                return back()->with('success', 'Attraction Deleted Successfully!');
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
                    $attraction = ActivitiesAttraction::find($list);
                    if ($attraction) {
                        $attraction->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
