<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


class CommonController extends Controller
{
    function __construct()
    {
        $admin = \Auth::user();
        view()->share('admin', $admin);
    }


    function tree(&$data, $parent_id = 0, $count = 1)
    {
        static $treeList = [];

        foreach ($data as $key => $value) {
            if ($value['parent_id'] == $parent_id) {
                $value['count'] = $count;
                $treeList [] = $value;
                unset($data[$key]);
                tree($data, $value['id'], $count + 1);
            }
        }
        return $treeList;
    }
}
