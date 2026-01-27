<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessPackage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BusinessPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $packages = BusinessPackage::all();
        return view('admin.businesses.package.list', ['packages' => $packages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.businesses.package.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => ['required','min:3','max:255'],
                'contacts' => ['required', 'numeric'],
                'reservations' => ['required', 'numeric'],
            ]);
            $package = new BusinessPackage();
            $package->title = $request->title;
            $package->description = $request->description;
            $package->reservations = $request->reservations;
            $package->reservations_label = $request->reservations_label;
            $package->contacts = $request->contacts;
            $package->contacts_label = $request->contacts_label;
            $package->price = $request->price;
            $package->annual = $request->annual;
            if ($request->status) {
                $package->status = true;
            } else {
                $package->status = false;
            }
            $package->save();
            return back()->with('success', 'Package Sdded Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $package = BusinessPackage::find($id);
        return view('admin.businesses.package.show', ['package' => $package]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $package = BusinessPackage::find($id);
        return view('admin.businesses.package.edit', ['package' => $package]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'title' => ['required','min:3','max:255'],
                'contacts' => ['required', 'numeric'],
                'reservations' => ['required', 'numeric'],
                'data_id' => ['required']
            ]);
            $package = BusinessPackage::find($request->data_id);
            $package->title = $request->title;
            $package->description = $request->description;
            $package->reservations = $request->reservations;
            $package->reservations_label = $request->reservations_label;
            $package->contacts = $request->contacts;
            $package->contacts_label = $request->contacts_label;
            $package->price = $request->price;
            $package->annual = $request->annual;
             
            if ($request->status) {
                $package->status = true;
            } else {
                $package->status = false;
            }
            $package->save();
            return back()->with('success', 'Package Updated Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $request->validate([
                'data_id' => ['required']
            ]);
            $theme = BusinessPackage::find($request->data_id);

            if ($theme) {
                $theme->delete();
                return back()->with('success', 'Package Deleted Successfully!');
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
                    $theme = BusinessPackage::find($list);
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
