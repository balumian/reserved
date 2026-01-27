<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;

use App\Models\Menu;
use App\Models\MenuGroup;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $menus = $request->user()->business->menus;
        return view('business.menus.list',['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $groups = MenuGroup::where('business_id',$request->user()->business->id)->active()->get();
        return view('business.menus.add',['groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'title' => ['required', 'max:255'],
                'title_ar' => ['required', 'max:255'],
                'description' => ['max:512'],
                'description_ar' => ['max:512'],
                'group' => ['required']
            ]);

            $menus = [
                'title' => [
                    'en' => $request->title,
                    'ar' => $request->title_ar,
                ],
                'menu_group_id' => $request->group,
                'price' => $request->price,
                'business_id' => $request->user()->business->id,
                'description' => [
                    'en' => $request->description,
                    'ar' => $request->description_ar
                ],
            ];

            if($request->status){
                $menus['status'] = true;
            }else{
                $menus['status'] = false;
            }

            Menu::create($menus);

            return back()->with('success', 'Menu Added Successfully!');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menus = Menu::find($id);
        $groups = MenuGroup::active()->get();
        return view('business.menus.edit',['groups' => $groups, 'menu' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        try{
            $request->validate([
                'title' => ['required', 'max:255'],
                'title_ar' => ['required', 'max:255'],
                'description' => ['max:512'],
                'description_ar' => ['max:512'],
                'group' => ['required'],
                'data_id' => ['required']
            ]);

            $menus = Menu::find($request->data_id);
            $menus->title = [
                    'en' => $request->title,
                    'ar' => $request->title_ar
            ];
            $menus->menu_group_id = $request->group;
            $menus->price = $request->price;
            $menus->description = [
                'en' => $request->description,
                'ar' => $request->description_ar
            ];
           

            if($request->status){
                $menus->status = true;
            }else{
                $menus->status = false;
            }

            $menus->save();

            return back()->with('success', 'Menu Updated Successfully!');
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
            $menu = Menu::find($request->data_id);
            
            if ($menu) {
                $menu->delete();
                return back()->with('success', 'Menu Deleted Successfully!');
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
                    $menu = Menu::find($list);
                    if ($menu) {
                        $menu->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
