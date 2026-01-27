<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = Theme::all();
        return view('admin.businesses.themes.list',['themes' => $themes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.businesses.themes.add');
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

            $theme = new Theme();
            $translations = [
                'en' => $request->title,
                'ar' => $request->title_ar
            ];
            $theme->title =  $translations;
            $theme->description =  $request->description;
             
            if (!$request->status) {
                $theme->status = false;
            }else{
                $theme->status = true;
            }
            $theme->save();
            return back()->with('success', 'Theme Added Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id):View
    {
        $theme = Theme::find($id);
        return view('admin.businesses.themes.edit',['theme'=>$theme]);
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

            $theme = Theme::find($request->data_id);
            $translations = [
                'en' => $request->title,
                'ar' => $request->title_ar
            ];
            $theme->title =  $translations;
            $theme->description =  $request->description;
             
            if (!$request->status) {
                $theme->status = false;
            }else{
                $theme->status = true;
            }
            $theme->save();
            return back()->with('success', 'Theme Updated Successfully!');
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
            $theme = Theme::find($request->data_id);
            
            if ($theme) {
                $theme->delete();
                return back()->with('success', 'Theme Deleted Successfully!');
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
                    $theme = Theme::find($list);
                    if ($theme) {
                        $theme->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
