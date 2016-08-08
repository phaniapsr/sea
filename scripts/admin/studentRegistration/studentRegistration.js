/**
 * Created by pc32261 on 8/8/2016.
 */
$(function(){
    $('#studentRegistration').submit(function(e){
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax(
            {
                url : formURL,
                type: "POST",
                data : postData,
                success:function(data, textStatus, jqXHR)
                {
                    //alert('phani'+data);
                    if(data>0)
                        $('#message_from_server').text('Student registered successfully');
                    else $('#message_from_server').text('Student registration failed');
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    //alert('An'+jqXHR);
                }
            });
        e.preventDefault();
        e.unbind();
        return false;
    })
})