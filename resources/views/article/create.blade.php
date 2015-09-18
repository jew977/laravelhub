<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>撰写博客</title>
    @include('Home.style')
</head>
<body>
         @include('Home.nav')
         <div class="main">
          <form method="post" class="create_blog">
         <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="container">
                <div class="row blog-title">
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" required="required" placeholder="博客标题">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary form-control" id="publish" data-toggle="modal" data-target="#fabumodal">发表博客</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @include('editor::head')
                       <div class="editor">
                            <textarea id='myEditor' name="content"></textarea>
                        </div>
                    </div>
                </div>
            </div>
         <!----遮罩层--->
            <div class="modal fade" id="fabumodal" aria-hidden='true'>
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <span data-dismiss="modal" class="cancle">X</span>
                         <h3 class="modal-title">文章设置</h3>
                     </div>
                     <div class="modal-body">
                         <div class="form-horizontal">
                              <div class="form-group">
                                  <label class="control-label col-md-2">博客类型</label>
                                  <div class="col-md-10">
                                      <select name="type" id="" class="form-control">
                                          <option value="0">--请选择--</option>
                                          <option value="0">原创</option>
                                          <option value="1">转载</option>
                                          <option value="2">翻译</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-md-2">个人分类</label>
                                  <div class="col-md-10">
                                      <input type="text" name="typename" maxlength="10" class="form-control" required="required"/>
                                  </div>
                                </div>
                                <div>
                                <div class="col-md-10 col-md-offset-2">
                                  <div id="blog-categories-box" style="display: block;">
                                      @foreach($Categorys as $category)
                                      <span class="label label-default set_tag_key">{{$category->typename}}</span> @endforeach
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-md-2">文章摘要</label>
                                  <div class="col-md-10">
                                      <textarea name="desc" class="form-control" id="description" required="required"></textarea>
                                  </div>
                              </div>
                              <div class="from-group"></div>
                         </div>
                     </div>
                     <div class="modal-footer blog-footer">
                         <button type="submit" class="btn btn-primary">发布</button><button data-dismiss="modal" class="btn btn-danger">取消</button>
                     </div>
                 </div>
             </div>
         </div>
         <!---->
            </form>
         </div>
         @include('Home.footer')
         <script type="text/javascript">
             $(document).ready(function(){
                 $('#publish').click(function(){
                    var str_content=$.trim($('.CodeMirror-code').text());
                    var str_string=str_content.substr(0,100);
                    $('#description').val(str_string);
                   })
                });
         </script>
</body>
</html>