<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $categories = MenuCategory::all();
        return view('admin.businesses.menu-cat.list',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.businesses.menu-cat.add');
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

            $cat = new MenuCategory();
            $translations = [
                'en' => $request->title,
                'ar' => $request->title_ar
            ];
            $cat->title =  $translations;
            $cat->description =  $request->description;

            if (!$request->status) {
                $cat->status = false;
            } else {
                $cat->status = true;
            }
            $cat->save();
            return back()->with('success', 'Menu Category Added Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuCategory $menuCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = MenuCategory::find($id);
        return view('admin.businesses.menu-cat.edit',['category' => $category]);
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

            $cat = MenuCategory::find($request->data_id);
            $translations = [
                'en' => $request->title,
                'ar' => $request->title_ar
            ];
            $cat->title =  $translations;
            $cat->description =  $request->description;

            if (!$request->status) {
                $cat->status = false;
            } else {
                $cat->status = true;
            }
            $cat->save();
            return back()->with('success', 'Menu Category Update Successfully!');
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
            $cat = MenuCategory::find($request->data_id);
            
            if ($cat) {
                $cat->delete();
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
                    $cat = MenuCategory::find($list);
                    if ($cat) {
                        $cat->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
