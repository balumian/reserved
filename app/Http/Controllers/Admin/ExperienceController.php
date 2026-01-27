<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $experience = Experience::all();
        return view('admin.businesses.experiences.list', ['experiences' => $experience]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.businesses.experiences.add');
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

            $experience = new Experience();
            $translations = [
                'en' => $request->title,
                'ar' => $request->title_ar
            ];
            $experience->title =  $translations;
            $experience->description =  $request->description;
            if ($request->hasFile('feature')) {
                $path = "";
                $path = store_files($request, 'feature', 'business');
                $experience->feature = $path;
            }
            if (!$request->status) {
                $experience->status = false;
            }
            $experience->save();
            return back()->with('success', 'Experience Added Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $experience = Experience::find($id);
        return view('admin.businesses.experiences.edit', ['experience' => $experience]);
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

            $experience = Experience::find($request->data_id);
            $translations = [
                'en' => $request->title,
                'ar' => $request->title_ar
            ];
            $experience->title =  $translations;
            $experience->description =  $request->description;
            if ($request->hasFile('feature')) {
                $path = "";
                $path = store_files($request, 'feature', 'business');
                $experience->feature = $path;
            }
            if (!$request->status) {
                $experience->status = false;
            }else{
                $experience->status = true;
            }
            $experience->save();
            return back()->with('success', 'Experience Updated Successfully!');
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
            $experience = Experience::find($request->data_id);
            
            if ($experience) {
                $experience->delete();
                return back()->with('success', 'Experience Deleted Successfully!');
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
                    $experience = Experience::find($list);
                    if ($experience) {
                        $experience->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
