<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{route('index')}}">弱覆盖商铺可视化系统</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('index')}}">首页 <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('jianjie')}}" target="_blank">基站视图</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('ruofugai')}}" target="_blank">弱覆盖商铺</a>
      </li>
    </ul>

    <!--登录注册功能-->
    <ul class="navbar-nav navbar-right">
        <!-- Authentication Links -->
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">注册</a></li>
      </ul>

  </div>
</nav>
