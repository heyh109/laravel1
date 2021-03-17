@extends('layouts.default')

@section('type')
<style type="text/css">
body, html {width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
#allmap{width:100%;height:100%;}

</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=f1jg5W7t9nQZQ93UFjhq9Gqa9uSXAACK"></script>
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<title>基站视图</title>
@stop

@section('content')
<div id="allmap"></div>
@stop

@section('scripts')
<script type="text/javascript">
// 百度地图API功能  
var myIcon_red = new BMap.Icon("/red.png", new BMap.Size(25, 23));
var myIcon_blue = new BMap.Icon("/blue.png", new BMap.Size(25, 23));


var map = new BMap.Map("allmap");
map.centerAndZoom(new BMap.Point(113.6752354,34.8180222), 35);
map.enableScrollWheelZoom(true);


var data_info = {!!$jizhan_json!!};
for(var i=0;i<data_info.length;i++){
var opts = {
title : '基站编号：'+ data_info[i]['bh'], // 信息窗口标题
enableMessage:true//设置允许信息窗发送短息
};
var marker = new BMap.Marker(new BMap.Point(data_info[i]['lon'],data_info[i]['lat']), {icon:myIcon_red});  // 创建标注
var circle = new BMap.Circle(new BMap.Point(data_info[i]['lon'],data_info[i]['lat']),200,{fillColor:"blue", strokeWeight: 1 ,fillOpacity: 0.3, strokeOpacity: 0.3});

var content = '基站名称：'+data_info[i]['name']+"<br/>"+'区域：'+data_info[i]['region'];   //修改信息窗口中的消息

map.addOverlay(circle);               //添加圆形到地图中
map.addOverlay(marker);               // 将标注添加到地图中
addClickHandler(content,opts,marker);
}
function addClickHandler(content,opts,marker){
marker.addEventListener("click",function(e){
openInfo(content,opts,e)}
);
}
function openInfo(content,opts,e){
var p = e.target;
var point = new BMap.Point(p.getPosition().lng, p.getPosition().lat);
var infoWindow = new BMap.InfoWindow(content,opts);  // 创建信息窗口对象 
map.openInfoWindow(infoWindow,point); //开启信息窗口
}

</script>
@stop