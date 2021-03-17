@extends('layouts.default')
@section('type')
<title>弱覆盖商铺可视化系统</title>
@stop

@section('content')
<form method="post" action="{{ route('store') }}">
  @csrf
  <div class="form-group">
    <label for="">基站编号</label>
    <input type="text" class="form-control" id="" name="bh">
  </div>

  <div class="form-group">
    <label for="">基站名称</label>
    <input type="text" class="form-control" id="" name="name">
  </div>

  <div class="form-group">
    <label for="">所属区域</label>
    <input type="text" class="form-control" id="" name="region">
  </div>

  <div class="form-group">
    <label for="">经度</label>
    <input type="text" class="form-control" id="" name="lon">
  </div>

  <div class="form-group">
    <label for="">纬度</label>
    <input type="text" class="form-control" id="" name="lat">
  </div>

  <div class="form-group">
    <label for="">基站站址</label>
    <input type="text" class="form-control" id="" name="add">
  </div>

  <button type="submit" class="btn btn-primary">提交</button>
</form>


@stop

