   $(document).ready(function(){
         $("#btn_enter").on('click',function (event) {
        event.preventDefault();
        var data = $('#inp_do').val()
        
       $.ajax({
            url: 'index.php',
            method: 'post',
            data: {'name':data},
            dataType: 'json',
            success : function(data){
                $('#list_todo').append('<li class="added_list"><a href="#" class="del_this" data-set='+data.text+'>Delete</a><input  type="checkbox" data-a='+data.text+'> '+ data.text +'</li>');

            }
        })
    });

       $('.remove_all').on('click', function() {
           var a = $(this).attr('href');
           console.log(a);
           $('#list_todo').children().remove();
           $.ajax({
               url: 'deleteAll.php',
               method: 'post',
               data: {'att': a},
               dataType: 'json',
               success : function(data){

               }
           })
       })

       $(document).on('click', '.del_this', function () {
           var a1 = $(this).attr('data-set');
           $(this).parent().remove();
           $.ajax({
               url: 'deleteAll.php',
               method: 'post',
               data: {'data-att': a1},
               dataType: 'json',
               success : function(data){

               }
           })
       })

       var ch_el = "input[type='checkbox']";
       console.log($("input[type='checkbox']"));
       $(document).on("click", "input[type='checkbox']", function () {
           $(this).parent().toggleClass('active');
           $(this).toggleClass('act');


       });

       $('#delet_check').on('click', function () {
            var a = $('#list_todo').find('.active');
            var send_att = a.children("input[type='checkbox']").attr('data-a');

           a.remove();
           $.ajax({
               url: 'deleteAll.php',
               method: 'post',
               data: {'del_d': send_att},
               dataType: 'json',
               success : function(data){

               }
           })


       })
   })

  