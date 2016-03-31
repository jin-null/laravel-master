<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Good;

class TrashController extends Controller
{
    //
    function index()
    {
        $goods=Good::onlyTrashed()->get();
//        dd($goods);
        return view('admin.trash.index')->with('goods',$goods);
    }


    function restore($id)
    {
        $good=Good::onlyTrashed()->find($id);
        $good->restore();
//
        return redirect('/admin/trash');
    }

    function forceDelete($id)
    {
        $good=Good::onlyTrashed()->find($id);
        $good->forceDelete();
        return redirect('/admin/trash');
    }
}
