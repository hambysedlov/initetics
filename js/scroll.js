 $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            var last_id = $(".post-id:last").attr("id");
            loadMoreData(last_id);
        }
    });

    function loadMoreData(last_id){
        if(!($('.ajax-load').hasClass('stop'))){
    var jqxhr=  $.ajax(
            {
                url: 'loadMoreData.php?last_id=' + last_id,
                type: "get",
                beforeSend: function()
                {
                
                    $('.ajax-load').show();
                        }
            })
            .done(function(data)
            {
                if(data==1){
                $('.ajax-load').addClass('stop');
                jqxhr.abort();
                console.log(data);
            }
                else{ 
                $("#order").addClass('drop');
                $('.ajax-load').hide();
                $("#order.drop").append(data);
                console.log(data);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                  alert('server not responding...');
            });
        }
        else{
            $('.ajax-load').hide();
        }
    }