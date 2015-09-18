<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
@include('Home.style')
</head>
<body>
     @include('Home.nav')
     <div class="register-box">
         @if (Session::has('message'))
                <p class="login_message">{{ Session::get('message') }}</p>
            @endif
             <p><h3>用户登录</h3></p>
             <form class="form-horizontal" method="post" >
                 <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                 <div class="form-group">
                     <input type="text" name="name" class="form-control" placeholder="用户名或email"/>
                 </div>
                 <div class="form-group">
                     <input type="password" name="password"  class="form-control" placeholder="密码">
                 </div>
                 <div>
                     <p><input type="checkbox" checked="true">我同意<span>用户协议</span></p>
                 </div>
                 <div class="form-group">
                     <button class="btn btn-primary col-md-12" type="submit">登录</button>
                 </div>
                
             </form>
         </div>

            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
               @foreach($errors->all() as $error)
               <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif
     @include('Home.footer') 
</body>
</html>