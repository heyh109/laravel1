<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jizhan;

class JizhanController extends Controller
{
    public function index(Request $request)
    {
        $page_index = 3;
        $page = 50;
        $jizhanserarch = $request->search;

        $search= $request->search;


        try{
            $result = Jizhan::where('name','like','%'.$search.'%')->orwhere('bh','like','%'.$search.'%')
            ->orwhere('region','like','%'.$search.'%')
            ->orwhere('add','like','%'.$search.'%')
            ->orderBy('id','desc')->limit($page)->get();
            $result_arr = array();

            foreach($result as $key =>$value){
                $result_arr_item = array();
            $result_arr_item['id'] = $value->id;
            $result_arr_item['bh'] = $value->bh;
            $result_arr_item['name'] = $value->name;
            $result_arr_item['region'] = $value->region;
            $result_arr_item['lon'] = $value->lon;
            $result_arr_item['lat'] = $value->lat;
            $result_arr_item['add'] = $value->add;
            $result_arr[] = $result_arr_item;
            }

            return view('pages.searchresult',compact('result_arr','page','page_index','jizhanserarch','search'));


        }catch (QueryException $e) {
            echo mb_convert_encoding($e,"UTF-8","GBK");die;
            self::log('ResController 数据库错误，信息：'.mb_convert_encoding($e,"UTF-8","GBK"));
            return redirect()->route('root')->with('danger', '数据库错误，请联系管理员：liyt');
        }
    }
    protected function log($content)
    {
        $filename = 'log/address.log';
        $output = '#'.date('Y-m-d H:i:s') . '# ' . $content . PHP_EOL;
        file_put_contents($filename, $output, FILE_APPEND);
    }
}
