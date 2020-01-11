$(document).ready(function() {
    $("body").scroll(function () {
  $("body").addClass("thin");
});
    $(".mob-menu").click(function(){
        {
    $(".sidebar").toggleClass("active");
        }
});
}); // end ready
$(document) .ready(function (){
   $('a#activation').click(function (event){
      event.preventDefault();
      var path= $(this).attr('href');
      var current = $(this).html();
      var to = $(this).attr('to');
      var select=$(this);
      $.ajax({
        url : path ,
        success : function (result) {
            if (current == 'Deactive'){
                select.html('Active');
                select.attr('href',to);
                select.attr('to',path);
                select.attr('class','btn');
                }
            else {
                console.log('hena');
                select.html('Deactive');
                select.attr('href',to);
                select.attr('to',path);
                select.attr('class','btn error');
            }
        },
        error : function (result) {
          console.log('fail');  
        },
      });
   });
   $('a#delete') .click(function (event) {
      event.preventDefault();
      var path = $(this).attr('href');
      var select= $(this);
      $.ajax({
         url : path ,
         success: function (result) {
             select.parent().parent().remove();
         } 
      });
   });
});
$(document) .ready(function (){
   $('a#register').click(function (event){
      event.preventDefault();
      var path= $(this).attr('href');
      var current = $(this).html();
      var to = $(this).attr('to');
      var name = $(this).attr('name');
      var select=$(this);
      var data = "data";
      $.ajax({
        url : path ,
        data : "data" ,
        type : "POST" ,
        success : function(result) {
            select.html(result) ;
            select.attr('to',path) ;
            select.attr('href',to);
            if (result=="Unregister") {
                console.log('hena');
                select.attr('class','btn error') ;
                if ($('#no-groups').length) {
                    $('#no-groups').remove();
                }
                var group = select.attr('group');
                var code = select.attr('code');
                $("#groups-elements").prepend("<li id='"+name+"'><a href ='"+group+"'>"+name+" | "+code+"</a></li>");
            }
            else {
                select.attr('class','btn');
                $('#'+name).remove();
                if ($('#groups-elements li').length < 1) {
                    $('#groups-elements').append("<li id='no-groups'>No groups to show :/</li>");
                }
            }
        },
        error : function (result) {
          console.log('fail');  
        },
      });
   });
   $('input#number').bind ('change keyup',function () {
      if($(this).val()> $(this).attr('max') && $(this).val() > $(this).attr('min') ) {
          $(this).val($(this).attr('max'));
      }
      if ($(this).val()< $(this).attr('min') && $(this).val() < $(this).attr('max')) {
        $(this).val($(this).attr('min'));
      }
      var current = parseInt($(this).attr('val'));
      var number = parseInt($(this).val());
      var total = parseInt( $(this).parent().parent().children('#total').children().attr('val'));
      $(this).attr('val',number);
      total =parseInt(total-current + number) ;
      if (total <=100 && total >0) {
          $(this).parent().parent().children('#total').children().val(total);
          $(this).parent().parent().children('#total').children().attr('val',total);
      }
      else if (total > 100) {
          $(this).parent().parent().children('#total').children().val(100);
          $(this).parent().parent().children('#total').children().attr('val',total);
      }
      else {
          $(this).parent().parent().children('#total').children().val(0);
          $(this).parent().parent().children('#total').children().attr('val',total);
      }
   });
});
/*$(document).ready(function(){
      $("#chat_list_container").click(function(){
        $(".chat-module").css("right","auto");
          });
          
       $(".top-chat").click(function(){
               console.log('hena');
        $(".chat-module").css("right","-101%");
      });

    });*/
$(document) .ready(function (){
   $('.like').click(function (event){
       console.log("cliced")
      event.preventDefault();
      var path= $(this).attr('to');
      var p = $(this).attr('p');
      var s=$(this);
      $.ajax({
        url : path ,
        success : function (result) {
            s.html(result);
            $.ajax({
                    url:path+'/1',
                    success : function (result1) {
                        $("#likes"+p).html(result1);
                    }
                });
                
        },
        error : function (result) {
          console.log('fail');  
        }
      });
   });
});
$(document) .ready(function (){
   $('.comment').click(function (event){
       console.log("cliced")
      event.preventDefault();
      var path= $(this).attr('to');
      var p = $(this).attr('p');
      var s=$(this);
      $.ajax({
        url : path ,
        success : function (result) {
            $(".comments"+p).html(result);        
        },
        error : function (result) {
          console.log('fail');  
        }
      });
   });
});