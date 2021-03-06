<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo $site_info['static_resource_path']?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo $site_info['static_resource_path']?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo $site_info['static_resource_path']?>/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .login-box-msg{
            color: red;
        }
    </style>
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="/"><?php echo $site_info['site_logo']['large']?></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg" id="error-box-msg"><?php echo isset($error_msg) ? $error_msg : '';?></p>
        <form method="post">
            <div class="form-group has-feedback">
                <input name='nickname' type="text" class="form-control" placeholder="nickname" />
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name='username' type="text" class="form-control" placeholder="username" />
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name='password' type="password" class="form-control" placeholder="Password" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name='repeat_password' type="password" class="form-control" placeholder="Repeat Password" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name='job' type="text" class="form-control" placeholder="Your Job" />
                <span class="glyphicon glyphicon-jpy form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-4">
                    <button name='submit' type="submit" class="btn btn-primary btn-block btn-flat">注册</button>
                </div><!-- /.col -->
                <div class="col-xs-8">
                    <a class="btn btn-default btn-block btn-flat" href="/user/login">已有账号,登录</a>
                </div><!-- /.col -->
            </div>
        </form>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="<?php echo $site_info['static_resource_path']?>/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo $site_info['static_resource_path']?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo $site_info['static_resource_path']?>/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

        var msgbox = $('#error-box-msg');

        $('input[name="nickname"]').blur(function(){
            var name = $(this).val();
            if (name == '') {
                msgbox.text('昵称不可以为空');
            } else {
                $.get('/user/exists', {'nickname': name}, function(data){
                    if (data.error) {
                        msgbox.text(data.msg);
                    }
                } )
            }
        })
        $('input[name="username"]').blur(function(){
            var name = $(this).val();
            if (name == '') {
                msgbox.text('用户名不可以为空');
            } else {
                $.get('/user/exists', {'username': name}, function(data){
                    if (data.error) {
                        msgbox.text(data.msg);
                    }
                } )
            }
        })
    });
</script>
</body>
</html>