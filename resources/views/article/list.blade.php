<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>博客列表</title>
    @include('Home.style')
</head>
<body>
         @include('Home.nav')
         <div class="main">
         <div class="container">
             <div class="row">
                 @include('article.right')
                 <div class="col-md-9">
                     <div class="part-right">
                         <ul class="list-group">
                           @foreach($articles as $article) 
                             <li class="list-grroup-item list-title">
                                 <div class="article_title">
                                  <span class="list_{{$article->type}}"></span>
                                 <h3><a href="/article/{{$article->aid}}">{{ $article->title }}</a></h3>  
                                 </div>
                                 <div class="article_description">
                                     <p>{{ $article->desc }}</p>
                                 </div>
                                 <div class="article_merge">
                                 <p><span>{{ $article->created_at }}</span> <span>阅读(18) </span><span>评论(0)</span>
                              @if($users->id==Auth::id())<div class="article_manger"><a href="/article/{{$article->aid}}/edit" class="btn btn-primary">编辑</a>
                                  <form action="/article/delete/{{$article->aid}}" method="post">
                                  <input type="hidden" name="_method" value="DELETE"/>
                                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                  <button class="btn btn-danger">删除</button>
                                  </form>
                              </div>
                              @endif
                                 </p>
                                 </div>
                             </li>
                             
                              @endforeach
                            
                               {!! $articles->render() !!}
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
         </div>
         
         
         @include('Home.footer')
</body>
</html>