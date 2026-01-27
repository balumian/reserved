<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Opening;
use Illuminate\Http\Request;

class OpeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $opening = $request->user()->business->opening;
        return view('business.opening.index',['opening' => $opening]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('business.opening.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $business = $request->user()->business;

            $opening = [
                'days_id' => $request->day,
                'open' => $request->open,
                'close' => $request->close,
                'break_start' => $request->break_start,
                'break_end' => $request->break_end,
            ];

            if($request->working){
                $opening['working'] = true;
            }else{
                $opening['working'] = false;
            }

            if($request->break){
                $opening['break'] = true;
            }else{
                $opening['break'] = false;
            }

            if($request->status){
                $opening['status'] = true;
            }else{
                $opening['status'] = false;
            }

            $business->opening()->create($opening);

            return back()->with('success', 'Opening & Closing Saved Successfully!');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Opening $opening)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $open = Opening::find($id);
        return view('business.opening.edit',['open' => $open]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try{
            
            $request->validate([
                'data_id' => ['required']
            ]);

            $opening = [
                'days_id' => $request->day,
                'open' => $request->open,
                'close' => $request->close,
                'break_start' => $request->break_start,
                'break_end' => $request->break_end,
            ];

            if($request->working){
                $opening['working'] = true;
            }else{
                $opening['working'] = false;
            }

            if($request->break){
                $opening['break'] = true;
            }else{
                $opening['break'] = false;
            }

            if($request->status){
                $opening['status'] = true;
            }else{
                $opening['status'] = false;
            }

            Opening::where('id',$request->data_id)->update($opening);

            return back()->with('success', 'Opening & Closing Update Successfully!');
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
            $open = Opening::find($request->data_id);
            
            if ($open) {
                $open->delete();
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
                    $open = Opening::find($list);
                    if ($open) {
                        $open->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
