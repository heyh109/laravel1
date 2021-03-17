@extends('layouts.default')

@section('type')
<title>弱覆盖商铺</title>
@stop

@section('content')
<div class="container" style="margin-top: 50px;">

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">经度</th>
      <th scope="col">维度</th>
      <th scope="col">商铺名称</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($jizhruofs as $key => $jizhruof)
    <tr>
      <th scope="row">{{ $jizhruof->id }}</th>
      <td>{{ $jizhruof->splon }}</td>
      <td>{{ $jizhruof->splat }}</td>
      <td>{{ $jizhruof->spname }}</td>
    </tr>
	@endforeach
  </tbody>
</table>
{{ $jizhruofs->links() }}
@stop
