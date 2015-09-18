   <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
           <div class="navbar-header">
               <a href="" class="navbar-brand">LaravelHub</a>
           </div>
           <ul class="nav navbar-nav">
               <li><a href="/">博客首页</a></li>
               <li><a href="">热点博客</a></li>
               <li><a href="">关于我们</a></li>
               <li><a href="http://www.golaravel.com/laravel/docs/5.1/">laravel文档</a></li>
           </ul>
           <form class="navbar-form navbar-left" method="post">
               <div class="form-group">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                   <input type="text" name="" class="form-control" placeholder="搜索你想看的博客"/>
                   <button class="btn btn-primary" type="submit">搜索</button>
               </div>
           </form>
          
           <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
               <li><a href="/user/{{Auth::id()}}/articles">hello　{{Auth::user()->name}}</a></li>
               <li><a href="/auth/logout">退出</a></li>
               @else
               <li><a data-toggle="modal" data-target="#login_modal">登陆</a></li>
               <li><a href="/auth/register">注册</a></li>
               @endif
           </ul>
           
     </div>
   </nav>
   
   <div class="modal fade" id="login_modal">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header login-header">
                        <span class="close cancle" data-dismiss="modal">X</span>
                        <h3 class="modal-title">帐号登录</h3>
               </div>
               <div class="modal-body login-body">
                   <form class="form-horizontal" method="post" action="/auth/login">
                       <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                       <div class="form-group">
                       <label  class="col-md-2 ">用户名</label>
                        <div class="col-md-10">
                          <input type="text" name="name" class="form-control" value="{{old('name')}}" id="inputEmail3" placeholder="输入您的用户名">
                        </div>
                          
                       </div>
                       <div class="form-group">
                           <label for="" class="control-label col-md-2">密　码</label>
                           <div class="col-md-10">
                            <input type="password" name="password" value="{{old('password')}}" class="form-control">
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-md-6">
                             <div class="pull-left"><input type="checkbox" name="remember_me" />下次自动登录</div>
                           </div>
                           <div class="col-md-6">
                              <p class="pull-right">忘记密码</p>
                           </div>


                       </div>
                       <div class="form-group">
                           <button class="btn btn-danger col-md-12" type="submit">登录</button>
                       </div>
                   </form>
               </div>
               <div class="modal-footer">
                   <div class="text-center">
                       <p>还没有账号，立即注册</p>
                   </div>
               </div>
           </div>
       </div>
   </div>
   
   <!--login-->