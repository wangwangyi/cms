<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>内容管理系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="alternate icon" type="image/png" href="/assets/i/favicon.png">
    <link rel="stylesheet" href="/assets/css/amazeui.min.css"/>
    <style>
        .header {
            text-align: center;
        }
        .header h1 {
            font-size: 200%;
            color: #333;
            margin-top: 30px;
        }
        .header p {
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="am-g">
        <h1>Winter Is Coming</h1>
    </div>
    <hr />
</div>
<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
        <h3>登录</h3>
        <hr>
        {{--  <div class="am-btn-group">
              <a href="#" class="am-btn am-btn-secondary am-btn-sm"><i class="am-icon-github am-icon-sm"></i> Github</a>
              <a href="#" class="am-btn am-btn-success am-btn-sm"><i class="am-icon-google-plus-square am-icon-sm"></i> Google+</a>
              <a href="#" class="am-btn am-btn-primary am-btn-sm"><i class="am-icon-stack-overflow am-icon-sm"></i> stackOverflow</a>
          </div>--}}
        <br>
        <br>

        <form  class="am-form" method="POST" action="{{ url('/tease.me/login') }}">
            {!! csrf_field() !!}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">邮箱:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <br>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">密码:</label>
                <input type="password" name="password" id="password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <br>
            <div class="form-group">
                <label for="remember-me">
                    <input id="remember-me" type="checkbox" name="remember">
                    记住密码
                </label>
            </div>
            <div class="am-cf">
                <input type="submit"  value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
                <a href="{{ url('tease.me/password/reset') }}"><input value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr"></a>
            </div>
        </form>
        <hr>

    </div>
</div>
</body>
</html>
