<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuisines;
use Illuminate\Http\Request;

class CuisinesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuisines = Cuisines::all();
        return view('admin.businesses.cuisines.list', ['cuisines' => $cuisines]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.businesses.cuisines.add');
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
                'feature' => ['required', 'image']
            ]);

            $cuisine = new Cuisines();
            $translations = [
                'en' => $request->title,
                'ar' => $request->title_ar
            ];
            $cuisine->title =  $translations;
            $cuisine->description =  $request->description;
            if ($request->hasFile('feature')) {
                $path = "";
                $path = store_files($request, 'feature', 'business');
                $cuisine->feature = $path;
            }
            if (!$request->status) {
                $cuisine->status = false;
            }
            $cuisine->save();
            return back()->with('success', 'Cuisines Added Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuisines $cuisines)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cuisine = Cuisines::find($id);
        return view('admin.businesses.cuisines.edit', ['cuisine' => $cuisine]);
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

            $cuisine = Cuisines::find($request->data_id);
            $translations = [
                'en' => $request->title,
                'ar' => $request->title_ar
            ];
            $cuisine->title =  $translations;
            $cuisine->description =  $request->description;

            if ($request->hasFile('feature')) {
                $path = "";
                $path = store_files($request, 'feature', 'business');
                $cuisine->feature = $path;
            }

            if (!$request->status) {
                $cuisine->status = false;
            } else {
                $cuisine->status = true;
            }
            $cuisine->save();
            return back()->with('success', 'Cuisines Updated Successfully!');
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
            $cuisine = Cuisines::find($request->data_id);
            if ($cuisine) {
                $cuisine->delete();
                return back()->with('success', 'Cuisines Deleted Successfully!');
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
                    $cuisine = Cuisines::find($list);
                    if ($cuisine) {
                        $cuisine->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
