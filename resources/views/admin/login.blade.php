<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('packages/admin/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('packages/admin/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
<!--  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">-->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('packages/admin/adminlte/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('packages/admin/iCheck/square/blue.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/admin"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form id="login-form">
      <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" value="1"> Remember Me
            </label>
          </div>
        </div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="#">I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{asset('packages/admin/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('packages/admin/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('packages/admin/iCheck/icheck.min.js')}}"></script>

<script src="{{asset('packages/admin/layer/layer.js')}}"></script>
<script src="{{asset('packages/admin/bootstrap-validator/validator.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
    $('#login-form').validator({disable:false}).on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                layer.load(1, {shade: [0.1, '#fff']});
                    $.ajax({
                      url:"{{asset(config('admin.prefix').'/login')}}", 
                      type:"post",
                      dataType:"json",
                      data:$("#login-form").serialize(),
                      success:function(res){
                        layer.closeAll();
                        if (res.status == 1) {
                            layer.msg(res.msg, {icon: 1});
                            @if(Session::has('url.intented'))
                                location.href = "{{Session::get('url.intented')}}";
                                @php
                                Session::forget('url.intented');
                                @endphp
                            @else
                                location.href = "{{asset(config('admin.prefix'))}}";
                            @endif
                        }else{
                            layer.msg(res.msg, {icon: 5});
                        }
                      }
                    });
            }
            return false;
    })
  });
</script>
</body>
</html>
