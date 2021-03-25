<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <style type="text/css">
    body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
    </style>
    <script type="text/javascript" src="//api.map.baidu.com/api?type=webgl&v=1.0&ak=f1jg5W7t9nQZQ93UFjhq9Gqa9uSXAACK"></script>
    <title>设置地图3D视角</title>
</head>
<body>
    @include('layouts._header')
    <div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
    // GL版命名空间为BMapGL
    // 按住鼠标右键，修改倾斜角和角度
    var map = new BMapGL.Map("allmap");    // 创建Map实例
    map.enableScrollWheelZoom(true); 
    var data_info = {!!$Jizhruof_json!!};
    for(var i=0;i<data_info.length;i++)
    {
        (function(x){
            map.centerAndZoom(new BMapGL.Point(113.611647,34.73458105), 19);  // 初始化地图,设置中心点坐标和地图级别
            var marker = new BMapGL.Marker(new BMapGL.Point(data_info[i]['splon'],data_info[i]['splat']));  // 创建标注
            map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
            map.setHeading(64.5);
            map.setTilt(73);

            var opts = {
                width: 300,
                height: 130,
                title: '弱覆盖商铺信息',
                enableMessage: true
            };

            var sContent = '商铺名称：'+data_info[i]['name']+"<br/>"+'商铺x坐标：'+data_info[i]['splon']+"<br/>"+'商铺y坐标：'+data_info[i]['splat']+"<br/>"+'商铺区域：'+data_info[i]['quyu']+"<br/>"+'所属网格：'+data_info[i]['wangge'];
            var infoWindow = new BMapGL.InfoWindow(sContent, opts);
            marker.addEventListener('click', function(e) {
                this.openInfoWindow(infoWindow, marker);
                // 图片加载完毕重绘infoWindow
                document.getElementById('imgDemo').onload = function() {
                    infoWindow.redraw(); // 防止在网速较慢时生成的信息框高度比图片总高度小，导致图片部分被隐藏

                };
            });
            map.addOverlay(marker);
        })(i);
        
    } 
</script>
