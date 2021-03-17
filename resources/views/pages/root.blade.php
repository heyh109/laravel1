@extends('layouts.default')

@section('type')
<title>弱覆盖商铺可视化系统</title>
@stop

@section('content')
<div class="container" style="margin-top: 50px;">
<a href="{{ route('create') }}" style="margin-bottom: 25px;display: inline-block;">
	<button type="button" class="btn btn-success">新增基站信息</button>
</a>

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
  	@foreach ($jizhans as $key => $jizhan)
    <tr>
      <th scope="row">{{ $jizhan->id }}</th>
      <td>{{ $jizhan->bh }}</td>
      <td>{{ $jizhan->name }}</td>
      <td>{{ $jizhan->region }}</td>
      <td>{{ $jizhan->lon }}</td>
      <td>{{ $jizhan->lat }}</td>
      <td>{{ $jizhan->add }}</td>
      <td>
        <a href="{{ route('edit', $jizhan->id) }}" style="margin-bottom: 25px;display: inline-block;">
          <button type="button" class="btn btn-warning">修改</button>
        </a>
        <a href="{{ route('delete', $jizhan->id) }}" style="margin-bottom: 25px;display: inline-block;" onclick="return confirm('确实要基站： {{ $jizhan['name'] }} 吗?');">
          <button type="button" class="btn btn-danger">删除</button>
        </a>
      </td>
    </tr>
	@endforeach
  </tbody>
</table>
{{ $jizhans->links() }}
@stop

