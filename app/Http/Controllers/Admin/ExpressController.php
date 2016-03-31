<?php

namespace App\Http\Controllers\Admin;

use App\Models\Express;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExpressController extends Controller
{
    //
    function index()
    {
        $expresses =Express::get();
        return view('admin.express.index')->with('expresses',$expresses);
    }
}
