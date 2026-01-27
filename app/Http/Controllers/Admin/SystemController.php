<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    //
    public function smtp_show(): View
    {
        return view('admin.system.smtp');
    }
}
