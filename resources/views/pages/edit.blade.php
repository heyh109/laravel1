@extends('layouts.default')

@section('type')
<title>郑州底层商户弱覆盖可视化系统</title>
@stop

@section('content')
<form method="post" action="{{ route('update') }}">
  @csrf
  <input type="hidden" name="id" value="{{ $id }}">
  <div class="form-group">
    <label for="">基站编号</label>
    <input type="text" class="form-control" id="" name="bh" value="{{ $jizhan->bh }}">
  </div>

  <div class="form-group">
    <label for="">基站名称</label>
    <input type="text" class="form-control" id="" name="name" value="{{ $jizhan->name }}">
  </div>

  <div class="form-group">
    <label for="">所属区域</label>
    <input type="text" class="form-control" id="" name="region" value="{{ $jizhan->region }}">
  </div>

  <div class="form-group">
    <label for="">经度</label>
    <input type="text" class="form-control" id="" name="lon" value="{{ $jizhan->lon }}">
  </div>

  <div class="form-group">
    <label for="">纬度</label>
    <input type="text" class="form-control" id="" name="lat" value="{{ $jizhan->lat }}">
  </div>

  <div class="form-group row">
    <label for="location" class="col-sm-2 col-form-label">位置（拖动地图选取）</label>
    <div class="col-sm-10">
      <span id="location_span" style="margin-bottom: 5px;">{{ $jizhan->lon }},{{ $jizhan->lat }}</span>
      <input type="hidden" class="form-control" name="location" id="location" value="">
      <div id="tx-map-container" style="width:100%; height:300px"></div>
    </div>
  </div>


  <div class="form-group">
    <label for="">基站站址</label>
    <input type="text" class="form-control" id="" name="add" value="{{ $jizhan->add }}">
  </div>

  <button type="submit" class="btn btn-primary">提交</button>
</form>
@stop

@section('script')
<script charset="utf-8" src="https://map.qq.com/api/js?v=2.exp&key={{ env('TX_MAP_KEY') }}"></script>
<script>
function init() {
    var map = new qq.maps.Map(document.getElementById("tx-map-container"), {
        // 地图的中心地理坐标。
        center: new qq.maps.LatLng({{ $jizhan->lat }},{{ $jizhan->lon }})
    });

    map.zoomTo(18);

    var marker = new qq.maps.Marker({
        position: map.getCenter(),
        map: map
    });

    qq.maps.event.addListener(map, 'center_changed', function() {
        document.getElementById("location").value = map.getCenter();
        document.getElementById('location_span').innerText = map.getCenter();
        marker.setPosition(map.getCenter());
    });
}
</script>

@stop
