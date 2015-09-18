<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章页</title>
    @include('Home.style')
</head>
<body>
         @include('Home.nav')
         <div class="main">
         <div class="container">
             <div class="row">
                 <div class="col-md-3 part-left">
                     <div class="picname">
                          <a href=""><img src="/img/pic.png"></img></a>
                          <ul class="list-inline list-case">
                              <li><a href=""><strong></strong>关注</a></li>
                              <li><a href=""><strong></strong>粉丝</a></li>
                          </ul>
                     </div>
                     <dl class="dl-horizontal">
                         <dt>　用户id:</dt>
                         <dd></dd>
                         <dt>　用户名:</dt>
                         <dd></dd>
                         <dt>　创建时间:</dt>
                         <dd></dd>
                         
                     </dl>
                     <div class="catory">
                         目录分类
                     </div>
                 </div>
                 <div class="col-md-9">
                     <div class="part-right">
                         
                          <div class="article_title">
                               <h1>{{$articles_title}}</h1>
                          </div>
                         <div class="article_manger">
                             <span>分类：<a href="">laravel</a></span>
                             <span>2015-09-02 13:59 </span>
                             <span>20人阅读</span>
                             <span>评论(0)</span>
                         </div>
                         <div class="article_tags">
                             
                         </div>
                         <div class="article_content">
                             {!! $articles_content !!}
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         </div>
         
         
         @include('Home.footer')
</body>
</html>