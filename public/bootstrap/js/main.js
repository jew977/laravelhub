$(document).ready(function(){
    $('.person-pic img').hover(function(){
      $('.edit_person_pic').stop(true,true).show();  
    },function(){
        $('.edit_person_pic').hide();
    })
    
    
    if($('.del_message').show()){
        setTimeout(function(){
            $('.del_message').fadeOut('slow');
        },1000);
    }
});