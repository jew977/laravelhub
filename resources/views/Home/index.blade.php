<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>博客首页</title>
@include('Home.style')
</head>
<body>
@include('Home.nav')
   <!--nav-->
   <div class="header_top">
      <div class="container">
       <h1 class="text-center">laravel5.1博客系统</h1>
       <h2 class="text-center">简洁、直观、强悍的前端开发框架，让web开发更迅速、简单。</h2>
       </div>    
   </div>
   <!--header_top-->
   <div class="content">
    <div class="container">
       <div class="row">
           <div class="col-md-9">
            <div class="content-list">
               <ul class="list-group">
                   @foreach($article_all as $article)
                   <li class="list-group-item">
                       <a href="/article/{{$article->aid}}"><h2>{{$article->title}}</h2></a>
                       <p>{{$article->desc}}</p>
                       <p><img src="/img/ph_left_3_bot_1.png"></img><span>&nbsp;&nbsp;</span><span>{{$article->author}}　作者发布</span><span class="phib_first"></span>
                       <img src="/img/ph_left_3_bot_2.png" alt=""><span>&nbsp;&nbsp;</span><span>{{$article->created_at}}</span></p>
                   </li>
                   @endforeach
                  
                </ul>
                 {!! $article_all->render() !!}
            </div>
           </div>
           <div class="col-md-3">
               <div class="sy_tj">
                   <h3 class="text-center">推荐资源</h3>
                   <ul class="text-center">
                       <li><a href="">Laravel 5.0 文档</a></li>
                       <li><a href="">Laravel 5.0 文档</a></li>
                       <li><a href="">Laravel 5.0 文档</a></li>
                       <li><a href="">Laravel 5.0 文档</a></li>
                       <li><a href="">Laravel 5.0 文档</a></li>
                       <li><a href="">Laravel 5.0 文档</a></li>
                   </ul>
               </div>
               
               
           </div>
       </div>
   </div>
   </div>
   <!--content-->
 @include('Home.footer') 
</body>
</html>