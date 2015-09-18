<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>账户登录</title>
@include('Home.style')
</head>
<body>
     @include('Home.nav')
<div class="login-main">
	   <div class="container">
		   <div class="row">
			   <div class="col-md-7">
			   <a href=""><img src="http://passport.csdn.net/bgimage/login-banner.png" alt=""></a>
			   </div>
			   <div class="col-md-5">
					<div class="login-part">
					 <h3>账户登录</h3>
					  @if (Session::has('message'))
                      <p class="login_message">{{ Session::get('message') }}</p>
                      @endif
                      
			           @if(count($errors)>0)
			            <div class="login-error">
			              <ul>
			               @foreach($errors->all() as $error)
			               <li>{{$error}}</li>
			                @endforeach
			               </ul>
			            </div>
			            @endif
			            
					 <form class="form-horizontal login-form" method="post" >
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
						 <div class="line"></div>
						 <div class="third-part tracking-ad">
						 <span>第三方帐号登录</span>
						    <a href="https://api.weibo.com/oauth2/authorize?client_id=2601122390&amp;response_type=code&amp;redirect_uri=https%3A%2F%2Fpassport.csdn.net%2Faccount%2Flogin%3Foauth_provider%3DSinaWeiboProvider" class="sina"></a>
			              	<a id="baiduAuthorizationUrl" href="https://openapi.baidu.com/oauth/2.0/authorize?response_type=code&amp;client_id=cePqkUpKCBrcnQtARTNPxxQG&amp;redirect_uri=https%3A%2F%2Fpassport.csdn.net%2Faccount%2Flogin%3Foauth_provider%3DBaiduProvider" class="baidu"></a>
			              	<a id="qqAuthorizationUrl" href="https://graph.qq.com/oauth2.0/authorize?response_type=code&amp;client_id=100270989&amp;redirect_uri=https%3A%2F%2Fpassport.csdn.net%2Faccount%2Flogin%3Foauth_provider%3DQQProvider&amp;state=test" class="qq"></a>
			              	<a id="githubAuthorizationUrl" href="https://github.com/login/oauth/authorize?client_id=4bceac0b4d39cf045157&amp;redirect_uri=https%3A%2F%2Fpassport.csdn.net%2Faccount%2Flogin%3Foauth_provider%3DGitHubProvider" class="github"></a>
			                <div class="register-now"><span>还没有LaravelHub帐号？</span>
				                <span class="register tracking-ad" data-mod="popu_28">
				                	<a href="/auth/register">立即注册</a>
				                </span>
			               	</div>
						 </div>
					 </form>
					</div>
			    </div>
				
	         </div>
       </div>
  </div>
     @include('Home.footer') 
</body>
</html>