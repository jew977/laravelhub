<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>控制面板</title>
    @include('Home.style')
</head>
<body>
         @include('Home.nav')
         <div class="main">
            <div class="person-info">
                <div class="container">
                    <div class="row person-detail">
                     <div class="col-md-3">
                         <div class="person-pic">
                         <a href=""><img src="/img/pic.png"></img></a>
                         <span class="edit_person_pic"></span>
                         <ul class="list-inline list-case ">
                             <li><strong>{{$following_count}}</strong>关注</li>
                             <li><strong>{{$followed_count}}</strong>粉丝</li>
                             <li><strong>{{$articleTotal}}</strong>文章</li>
                         </ul>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <dl class="person ">
                          <dt><strong>jew977</strong></dt>
                          <dd>互联网·电子商务<span>|</span>青春没有羁绊<span>|</span>上海市宝山区<span>|</span>男<span>|</span>1990-12-09</dd>
                          <dd>程序只是工具，真正让你强大是你的编程思想和解决问题的能力。</dd>
                        </dl>
                     </div>
                     <div class="col-md-3">
                         <div class="fb-blog">
                             <ul class="list-group">
                             <li class="list-group-item"><a href="/article/create" class="btn btn-lg btn-primary">撰写博客</a></li>
                             <li class="list-group-item"><a href="/user/{{Auth::id()}}" class="btn btn-lg btn-success">我的博客</a></li>
                             </ul>
                         </div>
                     </div>
                </div>
               </div>
             </div>
             <!------->
             <div class="box">
                 <div class="container">
                     <div class="row">
                         <div class="col-md-9 blog-list">
                            @if (Session::has('message'))
                                <div class="del_message btn btn-success btn-lg">{{ Session::get('message') }}</div>
                            @endif
                             <div class="">
                             <ul class="nav nav-tabs">
                                 <li class="active"><a href="#myblog"  data-toggle="tab">发表的博客</a></li>
                                 <li><a href="#mycomment" data-toggle="tab">我的评论</a></li>
                                 <li><a href="#mycontact" data-toggle="tab">我的关系</a></li>
                                 <li><a href="#myshouji" data-toggle="tab">我的收藏</a></li>
                             </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="myblog">
                            <table class="table table-hover">
                                 <th class="th_title">标题</th><th class="th_title">阅读</th><th class="th_title">评论</th><th class="th_title">操作</th>
                                 @foreach($articles as $article)
                                 <tr>
                                     <td class="user_article_title">{{$article->title}}</td>
                                     <td>20</td>
                                     <td>20</td>
                                     <td><a href="/article/{{$article->aid}}/edit" class="btn btn-success">编辑</a></td>
                                     <td><form method="post" action="/article/delete/{{$article->aid}}">
                                         <input name="_method" type="hidden" value="DELETE">
                                         <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                         <button type="submit" class="btn btn-warning">删除</button></form>
                                     </td>
                                     <td><a href="" class="btn btn-primary">置顶</a></td>
                                     <td><a href="" class="btn btn-warning">分类</a></td>
                                 </tr>
                                 @endforeach
                            </table>
                                  </div>
                                  <div class="tab-pane fade " id="mycomment"></div>
                                  <div class="tab-pane fade " id="mycontact"></div>
                                  <div class="tab-pane fade " id="myshouji"></div>
                              </div>
                             </div>
                         </div>
                         <div class="col-md-3">
                             <div class="persion_article">
                                 <div class="interested_con">
                                     <h3>分类目录</h3>
                                 </div>
                             </div>
                             <div class="myad">
                                 广告位
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         
         
         @include('Home.footer')
</body>
</html>