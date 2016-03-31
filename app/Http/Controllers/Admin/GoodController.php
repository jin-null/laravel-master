<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Good;
use App\Models\Brand;
use App\Models\Category;

class GoodController extends Controller
{
    //

    function index()
    {
        $goods=Good::with('brand','category')->get();
//        return $goods;
        return view('admin.goods.index')->with('goods',$goods);
    }

    function create()
    {
        $categories=Category::get_categories();
        $brands=Brand::get();
        return view('admin.goods.create')->with('categories',$categories)
            ->with('brands',$brands);
    }


    function store(Request $request)
    {
        return $request->all();
        $good=Good::create($request->all());
        return redirect(route('admin.good.index'));
    }


    function destroy($id)
    {
//        Good::destroy($id);
//        return redirect(route('admin.good.index'));

        $goods = Good::find($id);
        $goods->delete();
        return redirect(route('admin.good.index'));
    }


    function edit($id)
    {
        $good=Good::find($id);
        $categories=Category::get_categories();
        $brands=Brand::get();
        return view('admin.goods.edit')->with('good',$good)
            ->with('categories',$categories)
            ->with('brands',$brands);
    }

    function update(Request $request,$id)
    {
//        return $request->all();
        $result =$request->all();
        $result = isset($request->recommend)? $result : array_add($result,'recommend',0);
        $result = isset($request->hot)? $result : array_add($result,'hot',0);
        $result = isset($request->new)? $result : array_add($result,'new',0);
        Good::find($id)->update($result);
        return redirect(route('admin.good.index'));
    }


    function search(Request $request)
    {
        return $request->all();
        $keyword = "%".$request->keyword."%";
        $goods = Good::where("name","like",$keyword)->get();
        return view('admin.goods.index')->with('goods',$goods);

    }

    function change_attr(Request $request)
    {
//        $value=$request->value=="true"?1:0;
//        $good=Good::find($request->id);
//        $good->update([$request->type=>$value]);
        $value = $request->value =="true" ? 1 : 0;
        Good::find($request->id)->update([$request->type => $value]);
    }


}
