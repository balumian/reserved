<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Emirates;
use App\Models\Perks;
use Illuminate\Http\Request;

class PerksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perks = $request->user()->business->perks;
        return view('business.perks.index',['perks' => $perks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $emirates = Emirates::active()->get();
        return view('business.perks.add',['emirates' => $emirates]);
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
                'emirate' => ['required'],
                'area' => ['required'],
            ]);

            $perk = new Perks();

            if($perk){
            $perk->title = [
                'en' => $request->title,
                'ar' => $request->title_ar,
            ];
            $perk->emirate_id = $request->emirate;
            $perk->area_id = $request->area;
            $perk->expiry = $request->expiry;
            $perk->type = $request->type;
            $perk->business_id = $request->user()->business->id;

            if($request->status){
                $perk->status = true;
            }else{
                $perk->status = false;
            }

            $perk->save();

            return back()->with('success', 'Perks & Offers Added Successfully!');
            }
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Perks $perks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $perk = Perks::find($id);
        $emirates = Emirates::active()->get();
        return view('business.perks.edit',['perk' => $perk, 'emirates' => $emirates]);
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
                'emirate' => ['required'],
                'area' => ['required'],
                'data_id' => ['required']
            ]);

            $perk =  Perks::find($request->data_id);

            if($perk){
            $perk->title = [
                'en' => $request->title,
                'ar' => $request->title_ar,
            ];
            $perk->emirate_id = $request->emirate;
            $perk->area_id = $request->area;
            $perk->expiry = $request->expiry;
            $perk->type = $request->type;

            if($request->status){
                $perk->status = true;
            }else{
                $perk->status = false;
            }

            $perk->save();

            return back()->with('success', 'Perks & Offers Updated Successfully!');
            }
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
            $perk = Perks::find($request->data_id);
            
            if ($perk) {
                $perk->delete();
                return back()->with('success', 'Perk & Offer Deleted Successfully!');
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
                    $perk = Perks::find($list);
                    if ($perk) {
                        $perk->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
