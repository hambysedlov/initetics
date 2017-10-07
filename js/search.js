$(function(){
    


        $("#find").click(function() {
          var value = $('#who').val();
                if(value != '')  
                {  
                     $.ajax({  
                          url:"search.php",  
                          type:"POST",  
                         data:{value:value},  
                          success:function(data)  
                          {  
                               $('#order').html(data).fadeIn(100);  
                               
                          }  
                     });  
           }
            else  
                {  
                     $('#who').attr({
            placeholder: 'write your tags and after add'
        });

                }  
        });


//Живой поиск
$('.who').bind("change keyup input click", function() {
    if(this.value.length >= 2){
        $.ajax({
            type: 'post',
            url: "searchin.php", //Путь к обработчику
            data: {'referal':this.value},
            response: 'text',
            success: function(data){
                $(".search_result").html(data).fadeIn(); //Выводим полученые данные в списке
           }
       })
    }
})
    
$(".search_result").hover(function(){
    $(".who").blur(); //Убираем фокус с input
})

$('html').click(function(){
        $('.search_result').hide();
    });
    
//При выборе результата поиска, прячем список и заносим выбранный результат в input
$(".search_result").on("click", "li", function(){
    s_user = $(this).text();
    $(".who").val(s_user); 
    $(".search_result").fadeOut();
})

})