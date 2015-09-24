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