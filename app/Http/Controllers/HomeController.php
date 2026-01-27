<?php

namespace App\Http\Controllers;

use App\Models\ActivitiesAttraction;
use App\Models\Business;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    // public function index()
    // {
    //     $business = Business::active()->get();
    //     $attractions = ActivitiesAttraction::active()->get();
    //     return view('index', ['business' => $business, 'attractions' => $attractions]);
    // }

    public function index():View
    {
        return view('join-now');
    }
}
