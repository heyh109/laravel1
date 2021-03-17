@extends('layouts.default')

@section('type')
<title>弱覆盖商铺可视化系统</title>
@stop

@section('content')

<div class="container" style="margin-top: 50px;">
<a href="{{ route('create') }}" style="margin-bottom: 25px;display: inline-block;">
    <button type="button" class="btn btn-success">新增基站信息</button>
</a>
@isset($result_arr)
  @include('pages._search')

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">基站编号</th>
      <th scope="col">基站名称</th>
      <th scope="col">所属区域</th>
      <th scope="col">经度</th>
      <th scope="col">纬度</th>
      <th scope="col">基站站址</th>
      <th scope="col" width="250px">操作</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($result_arr as $key => $register)
    <tr>
      <<td>{{ $register['id'] }}</td>
                            <td>{{ $register['bh'] }}</td>
                            <td>{{ $register['name'] }}</td>
                            <td>{{ $register['region'] }}</td>
                            <td>{{ $register['lon'] }}</td>
                            <td>{{ $register['lat'] }}</td>
                            <td>{{ $register['add'] }}</td>
      <td>
        <a href="{{ route('edit', $register['id']) }}" style="margin-bottom: 25px;display: inline-block;">
          <button type="button" class="btn btn-warning">修改</button>
        </a>
        <a href="{{ route('delete', $register['id']) }}" style="margin-bottom: 25px;display: inline-block;" onclick="return confirm('确实要基站： {{ $register['name'] }} 吗?');">
          <button type="button" class="btn btn-danger">删除</button>
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
 @endisset

@stop

