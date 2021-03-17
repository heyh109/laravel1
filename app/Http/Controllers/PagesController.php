<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jizhan;
use App\Models\Jizhruof;

class PagesController extends Controller
{
    public function home()
    {
    	$jizhans = Jizhan::orderBy('id', 'asc')->paginate(9);
    	return view('pages.root', compact('jizhans'));
    }

    public function create()
    {
    	return view('pages.create');
    }

    public function store(Request $request)
    {
    	$jizhan = new Jizhan;

        $jizhan->bh = $request->bh;
        $jizhan->name = $request->name;
        $jizhan->region = $request->region;
        $jizhan->lat = $request->lat;
        $jizhan->lon = $request->lon;
        $jizhan->add = $request->add;

        $jizhan->save();
		return redirect()->route('index');
    }

    public function edit(Request $request)
    {
    	$jizhan = Jizhan::where('id', $request->id)->first();
    	$id = $request->id;
    	return view('pages.edit', compact('jizhan', 'id'));
    }

    public function update(Request $request)
    {
    	$jizhan = Jizhan::find($request->id);

        $jizhan->bh = $request->bh;
        $jizhan->name = $request->name;
        $jizhan->region = $request->region;
        $jizhan->lat = $request->lat;
        $jizhan->lon = $request->lon;
        $jizhan->add = $request->add;

        $jizhan->save();
		return redirect()->route('index');
    }


    public function delete(Request $request)
    {

    	$jizhan = Jizhan::find($request->id);
		$jizhan->delete();
		return redirect()->route('index');
    }
    public function jianjie()
    {
        $jizhans = Jizhan::whereIn('region', ['金水区分中心'])->limit(500)->get();
        //$jizhans = Jizhan::orderBy('id', 'asc')->get();
        $arr = array(); // 把$jizhans对象转换为数组
        foreach ($jizhans as $key => $value) {
            $arr_item = array(); // 临时数组，用于保存每一条基站数据
            $arr_item['id'] = $value->id;
            $arr_item['bh'] = $value->bh;
            $arr_item['lon'] = $value->lon;
            $arr_item['lat'] = $value->lat;
            $arr_item['name'] = $value->name;
            $arr_item['region'] = $value->region;
            $arr[] = $arr_item; // 将每一条基站数据装进总数组里
        }
        $jizhan_json = json_encode($arr); // 把数组转json
        return view('layouts.chakan', compact('jizhans', 'jizhan_json'));
    }
    
    public function zhengzhou()
    {
        $jizhans = Jizhan::orderBy('id', 'asc')->get();

        $arr = array(); // 把$jizhans对象转换为数组
        foreach ($jizhans as $key => $value) {
            $arr_item = array(); // 临时数组，用于保存每一条基站数据
            $arr_item['id'] = $value->id;
            $arr_item['bh'] = $value->bh;
            $arr_item['lon'] = $value->lon;
            $arr_item['lat'] = $value->lat;
            $arr_item['name'] = $value->name;
            $arr_item['region'] = $value->region;
            $arr[] = $arr_item; // 将每一条基站数据装进总数组里
        }
        $jizhan_json = json_encode($arr); // 把数组转json
        return view('layouts.chakan', compact('jizhans', 'jizhan_json'));
    }

}

?>