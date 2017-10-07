$(document).ready(function(){
    $('input#username, input#email, input#password, input#passwordretype').unbind().blur(function(){
         var id = $(this).attr('id');
         var val = $(this).val();
         switch(id){
            case 'username':
            var rv_name =  /^[a-zA-Z]*$/;
            if(val.length > 2 && val != '' && rv_name.test(val))
                {
                   $(this).addClass('not_error');
                  $('.error-box').html('Alright')
                                             .css('color','green')
                                             .animate({'paddingLeft':'10px'},400)
                                             .animate({'paddingLeft':'5px'},400);
                }
                 else
                {
                   $(this).removeClass('not_error').addClass('errormy');
                  $('.error-box').html('field "username" must be filled in <br>, the length of the name must be at least 2 characters <br>, the field must contain only a-z or A-Z characters ')
                                              .css('color','red')
                                              .animate({'paddingLeft':'10px'},400)
                                              .animate({'paddingLeft':'5px'},400);
                }
            break;

            case 'email':
               var rv_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
               if(val != '' && rv_email.test(val))
               {
                  $(this).addClass('not_error');
                  $('.error-box').html('.error-box').text('Alright')
                                            .css('color','green')
                                            .animate({'paddingLeft':'10px'},400)
                                            .animate({'paddingLeft':'5px'},400);
               }
               else
               {
                  $(this).removeClass('not_error').addClass('errormy');
                  $('.error-box').html('field "email" must be filled in <br>, the field must be right format ')
                                             .css('color','red')
                                             .animate({'paddingLeft':'10px'},400)
                                             .animate({'paddingLeft':'5px'},400);
               }
           break;

                case 'password':
  var rv_password =  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
              if(val.length >= 6 && rv_password.test(val))
              {
                  $(this).addClass('not_error');
                 $('.error-box').html('.error-box').text('Alright')
                                           .css('color','green')
                                           .animate({'paddingLeft':'10px'},400)
                                           .animate({'paddingLeft':'5px'},400);
              }
              else
              {
                 $(this).removeClass('not_error').addClass('errormy');
              $('.error-box').html('password - required, at least 6 characters long, at least one lowercase letter, one uppercase letter, one digit, no special symbols eg. ~!@#$%^&*()_+')
                                           .css('color','red')
                                           .animate({'paddingLeft':'10px'},400)
                                           .animate({'paddingLeft':'5px'},400);
              }
          break;



                case 'passwordretype':
                var password=$('#password').val();
                 var passwordret=$('#passwordretype').val();
                 if(password===passwordret){

  var rv_passwordretype =  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
              if(val.length >= 6 && rv_passwordretype.test(val))
              {
                  $(this).addClass('not_error');
                 $('.error-box').html('.error-box').text('Alright')
                                           .css('color','green')
                                           .animate({'paddingLeft':'10px'},400)
                                           .animate({'paddingLeft':'5px'},400);
                                           $('#button.register').removeAttr('disabled');
              }
              else
              {
                 $(this).removeClass('not_error').addClass('errormy');

              $('.error-box').html('passwordretype - required, at least 6 characters long, at least one lowercase letter, one uppercase letter, one digit, no special symbols eg. ~!@#$%^&*()_+')
                                           .css('color','red')
                                           .animate({'paddingLeft':'10px'},400)
                                           .animate({'paddingLeft':'5px'},400);


              }}
              else{ $('.error-box').html('passwordretype not like password')

                                            .css('color','red')
                                           .animate({'paddingLeft':'10px'},400)
                                           .animate({'paddingLeft':'5px'},400);
          };
          break;

         }
         

    });





$('form#registerform').submit(function(e) {
      var data = $("form#registerform").serialize();
    e.preventDefault();
   if($('.not_error').length == 4){
    $.ajax({
        url: 'register_process.php',
        type: 'POST',
        data: data,
        beforeSend:
        function(xhr, textStatus){ 
                         $('form#registerform :input').attr('disabled','disabled'); },
    success:function(response){
    if(response==1){
      setTimeout('window.location.href = "page.php"; ',1000);}
      else{
        $('.error-box').html(''+response+'');
        $('form#registerform :input').removeAttr('disabled','disabled');
     }
    }   
});
}
else {
          return $('.error-box').html('required all input').css('color','red')
                                           .animate({'paddingLeft':'10px'},400)
                                           .animate({'paddingLeft':'5px'},400);;
       }
  }); 
});
