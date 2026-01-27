<?php

namespace App\Http\Controllers\Business;
use App\Http\Controllers\Controller;
use App\Models\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Table\Table;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tables = $request->user()->business->tables;
        return view('business.tables.list',['tables' => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('business.tables.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'table' => ['required','max:255'],
                'chairs' => ['required','max:255'],
                'description' => ['max:512'],
                'photo' => ['required'],
            ]);

            $table = new Tables();
            if($table->business_id = $request->user()->business->id){
            $table->table = [
                'en' => $request->table,
                'ar' => $request->table_ar,
            ];
            $table->chairs = [
                'en' => $request->chairs,
                'ar' => $request->chairs_ar
            ];

            if ($request->hasFile('photo')) {
                $path = "";
                $path = store_files($request, 'photo', 'business');
                $table->photo = $path;
            }
            $table->description = $request->description;

            if($request->status){
                $table->status = true;
            }else{
                $table->status = false;
            }
            $table->save();
            return back()->with('success', 'Table Added Successfully!');
            }
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tables $tables)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id):View
    {
        $table = Tables::find($id);
        return view('business.tables.edit',['table' => $table]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try{
            $request->validate([
                'table' => ['required'],
                'chairs' => ['required'],
                'data_id' => ['required'],
                'description' => ['max:512'],
            ]);

            $table = Tables::find($request->data_id);
            if($table){
            $table->table = [
                'en' => $request->table,
                'ar' => $request->table_ar,
            ];
            $table->chairs = [
                'en' => $request->chairs,
                'ar' => $request->chairs_ar
            ];

            if ($request->hasFile('photo')) {
                $path = "";
                $path = store_files($request, 'photo', 'business');
                $table->photo = $path;
            }
            $table->description = $request->description;

            if($request->status){
                $table->status = true;
            }else{
                $table->status = false;
            }
            $table->save();
            return back()->with('success', 'Table Added Successfully!');
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
            $table = Tables::find($request->data_id);
            
            if ($table) {
                $table->delete();
                return back()->with('success', 'Table Deleted Successfully!');
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
                    $table = Tables::find($list);
                    if ($table) {
                        $table->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
