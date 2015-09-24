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
                     <!--栏目分类-->
                    <div class="article-slider">
                        <div class="article-header">
                            <h1>栏目分类</h1>
                        </div>
                       <div class="category_top">
                           <ul class="list-group category_header">
                              @foreach($Categorys as $category)
                               <li class="list-group-item"><a href="{{$category->id}}">{{$category->typename}}</a></li>
                               @endforeach
                           </ul>
                       </div>
                    </div>
                    <!--近期文章-->
                    <div class="article-slider">
                        <div class="article-header">
                            <h1>近期文章</h1>
                        </div>
                       <div class="category_top">
                           <ul class="list-group category_header">
                          @foreach($lastArticles as $lastArticle)
                               <li class="list-group-item"><a href="/article/{{$lastArticle->aid}}">{{$lastArticle->title}}</a></li>
                          @endforeach
                           </ul>
                       </div>
                    </div>
                    <!--tag分类-->
                    <div class="article-slider">
                        <div class="article-header">
                            <h1>Tag分类</h1>
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

