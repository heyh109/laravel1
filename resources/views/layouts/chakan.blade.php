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
    var data_info = {!!$jizhan_json!!};
    for(var i=0;i<data_info.length;i++)
    {
        (function(x){
            map.centerAndZoom(new BMapGL.Point(113.6752354,34.8180222), 19);  // 初始化地图,设置中心点坐标和地图级别
            var marker = new BMapGL.Marker(new BMapGL.Point(data_info[i]['lon'],data_info[i]['lat']));  // 创建标注
            map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
            map.setHeading(64.5);
            map.setTilt(73);

            var opts = {
                width: 250,
                height: 60,
                title: '基站信息',
                enableMessage: true
            };

            var sContent = '基站名称：'+data_info[i]['name']+"<br/>"+'区域：'+data_info[i]['region']; 
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
