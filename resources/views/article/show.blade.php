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
             @include('article.case')
             <div class="row">
                @include('article.right')
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