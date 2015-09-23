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
                <div class="pull-right list_case">
                   
                  <div>
                 
                @if($attention)
                  <a id="case_me" class="btn btn-cancle btn-lg">已关注</a>
                   @else
                  <a id="case_me" class="btn btn-success btn-lg">关注我</a>
                  @endif
                   <a href="" class="btn btn-primary btn-lg">@回复我</a>
                  </div>
                 
                </div>
             </div>
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
         <script type="text/javascript">
        (function(){
                 $('#case_me').click(function(){
                     $.ajax({
                        type: 'POST',
                        url: '/post_case/{{$users->id}}',
                        data: { 
                          
                            'user2_id' : '{{$users->id}}'
                        },
                        dataType: 'json',
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        success: function(data){
                       // console.log(data.status);
                          if(data.status>0){
                               $('#case_me').text('已关注').removeClass('btn-success').addClass('btn-cancle');
                           }
                        },
                        error: function(xhr, type){
                        console.log('Ajax error!');
                        
                        }
                    });
                 })
             })();
         </script>
</body>
</html>