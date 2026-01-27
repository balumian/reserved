<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $countries = Countries::get();
        // return $country->name;
        return view('admin.config.countries.countries',['countries'=> $countries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.config.countries.add');
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
                'name_ar' => ['required','min:3','max:255'],
                'code' => ['required'],
                'iso' => ['required']
            ]);

        $country = new Countries();

        $translations = [
            'en' => $request->name,
            'ar' => $request->name_ar
        ];
        $country->name = $translations;
        $country->iso = $request->iso;
        $country->code = $request->code;
        if(!$request->status){
            $country->active = false;
        }
        $country->save();
        return back()->with('success', 'Country Added Successfully!');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $country = Countries::find($id);
        return View('admin.config.countries.edit',['country' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
        try {
            $request->validate([
                'name' => ['required','min:3','max:255'],
                'name_ar' => ['required','min:3','max:255'],
                'code' => ['required'],
                'iso' => ['required'],
                'data_id' => ['required']
            ]);

        $country = Countries::find($request->data_id);

        $translations = [
            'en' => $request->name,
            'ar' => $request->name_ar
        ];
        $country->name = $translations;
        $country->iso = $request->iso;
        $country->code = $request->code;
        if(!$request->status){
            $country->active = false;
        }
        $country->save();
        return back()->with('success', 'Country Updated Successfully!');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Countries $countries)
    {
        //
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
            $country = Countries::find($request->data_id);
            $country->delete();
            return back()->with('success', 'Country Deleted Successfully!');

        }catch(\Exception $e){
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
                    $cuisine = Countries::find($list);
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
