<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jizhruof;

class jzruofPagesController extends Controller
{
    //
     public function ruofugai()
    {
    	$jizhruofs = Jizhruof::orderBy('id', 'asc')->paginate(9);
    	return view('pages.ruo', compact('jizhruofs'));
    }

    public function create()
    {
    	return view('pages.ruo.create');
    }

    public function jianjie()
    {
        $jizhruofs = Jizhruof::orderBy('id', 'asc')->limit(500)->get();

        $arr = array(); // 把$jizhans对象转换为数组
        foreach ($jizhruofs as $key => $value) {
            $arr_item = array(); // 临时数组，用于保存每一条基站数据
            $arr_item['id'] = $value->id;
            $arr_item['splon'] = $value->splon;
            $arr_item['splat'] = $value->splat;
            $arr_item['name'] = $value->name;
            $arr_item['quyu'] = $value->quyu;
            $arr_item['wangge'] = $value->wangge;

            $arr[] = $arr_item; // 将每一条基站数据装进总数组里
        }
        $Jizhruof_json = json_encode($arr); // 把数组转json
        return view('layouts.chakanRuo', compact('Jizhruofs', 'Jizhruof_json'));
    }

}
