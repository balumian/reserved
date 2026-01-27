<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Areas;
use App\Models\Countries;
use App\Models\Emirates;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Areas::all();
        return view('admin.config.areas.list',['areas' => $areas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $emirates = Emirates::all();
        return view('admin.config.areas.add', ['emirates' => $emirates]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required','min:3','max:255'],
                'emirate' => ['required']
            ]);

            $emirate = Emirates::find($request->emirate);

            if ($emirate) {

                $area = [
                    'name' => [
                        'en' => $request->name,
                        'ar' => $request->name_ar,
                    ],
                    'description' => $request->description,
                ];

                if ($request->status) {
                    $area['status'] = true;
                } else {
                    $area['status'] = false;
                }

                $emirate->areas()->create($area);
            }
            return back()->with('success', 'Areas Added Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Areas $areas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $emirates = Emirates::all();
        $area = Areas::find($id);
        return view('admin.config.areas.edit', ['area' => $area,'emirates' => $emirates]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Areas $areas)
    {
        try {
            $request->validate([
                'name' => ['required','min:3','max:255'],
                'emirate' => ['required'],
                'data_id' => ['required']
            ]);

            $area = Areas::find($request->data_id);

            if ($area) {

                $area->name = [
                        'en' => $request->name,
                        'ar' => $request->name_ar,
                    ];
                $area->description = $request->description;
                $area->emirates_id = $request->emirate;
                if ($request->status) {
                    $area['status'] = true;
                } else {
                    $area['status'] = false;
                }

                $area->save();
            }
            return back()->with('success', 'Area Update Successfully!');
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
            $area = Areas::find($request->data_id);

            if ($area) {
                $area->delete();
                return back()->with('success', 'Area Deleted Successfully!');
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
                    $area = Areas::find($list);
                    if ($area) {
                        $area->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // Get Specific Areas

    public function get_specific_areas(Request $request){
        try{
            $request->validate([
                'data_id' => ['required']
            ]);

            $areas = Areas::where('emirates_id','=',$request->data_id)->pluck('name','id');

            return response()->json(['areas' => $areas]);

        }catch(\Exception $e){
            return response()->json(['error'  => $e->getMessage()]);
        }
    }
}
