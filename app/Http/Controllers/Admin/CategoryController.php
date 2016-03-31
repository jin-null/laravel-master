<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

use Cache;

class CategoryController extends CommonController
{
    //
    function  index()
    {
        $categories=Category::get_categories();
//      return $categories;
        return view('admin.categories.index')->with('categories',$categories);
    }

    function create()
    {
        $categories=Category::get_categories();
        return view('admin.categories.create')->with('categories',$categories);
    }

    function store(Request $request)
    {

        Category::create($request->all());
        Cache::forget('admin_category_categories');

        return redirect(route('admin.category.index'));



//        $category=$request->all();
//        p($category);

    }

    function destroy($id)
    {
        Cache::forget('admin_category_categories');
        Category::destroy($id);
        return redirect(route('admin.category.index'))->with('msg', '删除成功！');
    }

    function edit($id)
    {
//        dd($id);
        $category=Category::find($id);
        $categories=Category::get_categories();
        return view ('admin.categories.edit')
            ->with('category',$category)
            ->with('categories',$categories);
    }

    function  update(Request $request,$id)
    {
        Cache::forget('admin_category_categories');
        $category=Category::find($id);
        $category->update($request->all());
        return redirect(route('admin.category.index'))->with('msg', '修改成功！');
    }


    function sort_order(Request $request)
    {
        $id=$request->id;
        p($id);
//        $category = Category::find($request->id);
//        Cache::forget('admin_category_categories');
//        $category->update(['sort_order' => $request->sort_order]);
    }


    function  is_show()
    {

        return 1313;
    }
}
