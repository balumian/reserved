<?php

namespace App\Http\Controllers\Business;
use App\Http\Controllers\Controller;
use App\Models\MenuGroup;
use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $groups = $request->user()->business->menugroups;
        return view('business.menu-groups.list',['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menucat = MenuCategory::all();
        return view('business.menu-groups.add',['menucat' => $menucat]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $request->validate([
                'title' => ['required','max:255'],
                'title_ar' => ['required','max:255'],
                'category' => ['required']
            ]);

            $groups = [
                'title' => [
                    'en' => $request->title,
                    'ar' => $request->title_ar,
                ],
                'menu_cat_id' => $request->category,
                'description' => $request->description,
            ];
            if($request->status){
                $groups['status'] = true;
            } else{
                $groups['status'] = false;
            }
            $request->user()->business->menugroups()->create($groups);

            return back()->with('success', 'Menu Group Created Successfully!');

        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuGroup $menuGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $group = MenuGroup::find($id);
        $menucat = MenuCategory::all();
        return view('business.menu-groups.edit',['group' => $group, 'menucat' => $menucat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try{

            $request->validate([
                'title' => ['required','max:255'],
                'title_ar' => ['required','max:255'],
                'category' => ['required'],
                'data_id' => ['required'],
            ]);
            $groups = MenuGroup::find($request->data_id);
             
            $groups->title = [
                    'en' => $request->title,
                    'ar' => $request->title_ar,
                        ];
            $groups->menu_cat_id = $request->category;
            $groups->description = $request->description;

            if($request->status){
                $groups->status = true;
            } else{
                $groups->status = false;
            }

            $groups->save();

            return back()->with('success', 'Menu Group Updated Successfully!');

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
            $group = MenuGroup::find($request->data_id);
            
            if ($group) {
                $group->delete();
                return back()->with('success', 'Menu Group Deleted Successfully!');
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
                    $group = MenuGroup::find($list);
                    if ($group) {
                        $group->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
