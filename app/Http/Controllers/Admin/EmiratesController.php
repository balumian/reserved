<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emirates;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmiratesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $emirates = Emirates::get();
        return view('admin.config.emirates.list',['emirates'=>$emirates]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.config.emirates.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'name' => ['required','min:3','max:255'],
                'name_ar' => ['required','min:3','max:255']
            ]);
            $emirate = new Emirates();
            $translations = [
                'en' => $request->name,
                'ar' => $request->name_ar
            ];
            $emirate->name =  $translations;

            if(!$request->status){
                $emirate->status = false;
            }
            $emirate->save();
            return back()->with('success', 'Emirates Added Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Emirates $emirates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        //
        $emirate = Emirates::where('id',$id)->first();
        return view('admin.config.emirates.edit',['emirate'=>$emirate]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
         
         try {
            $request->validate([
                'name' => ['required','min:3','max:255'],
                'name_ar' => ['required','min:3','max:255'],
                'data_id' => ['required']
            ]);

            $emirate = Emirates::find($request->data_id);

            $translations = [
                'en' => $request->name,
                'ar' => $request->name_ar
            ];
            $emirate->name =  $translations;

            if(!$request->status){
                $emirate->status = false;
            }
            $emirate->save();
            return back()->with('success', 'Emirates Update Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try{
            $request->validate([
                'data_id' => ['required']
            ]);
            $emirate = Emirates::find($request->data_id);
            $emirate->delete();
            return back()->with(['success'=>'Emirate Deleted Successfully!']);

        }catch(\Exception $e){
            return back()->with(['error'=>$e->getMessage()]);
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
                    $emirate = Emirates::find($list);
                    if ($emirate) {
                        $emirate->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
