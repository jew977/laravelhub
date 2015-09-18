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
                 <div class="col-md-3 part-left">
                     <div>
                     <div class="picname">
                          <a href=""><img src="/img/pic.png"></img></a>
                          <ul class="list-inline list-case">
                              <li><a href=""><strong>{{$following_count}}</strong>关注</a></li>
                              <li><a href=""><strong>{{$followed_count}}</strong>粉丝</a></li>
                          </ul>
                     </div>
                     <dl class="dl-horizontal">
                         <dt>　用户id:</dt>
                         <dd>{{$users->id}}</dd>
                         <dt>　用户名:</dt>
                         <dd>{{$users->name}}</dd>
                         <dt>　创建时间:</dt>
                         <dd>{{$users->created_at}}</dd>
                     </dl>
                     </div>
                    <div class="article-slider">
                        <div class="article-header">
                            <h1>栏目分类</h1>
                        </div>
                       <div class="category_top">
                           <ul class="list-group category_header">
                              @foreach($Categorys as $category)
                               <li class="list-group-item category_title"><a href="">{{$category->typename}}</a></li>
                               @endforeach
                           </ul>
                       </div>
                    </div>
                    <div class="myad"></div>
                 </div>
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