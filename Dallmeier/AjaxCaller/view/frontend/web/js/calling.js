define(['jquery','ajax'], function($)
{
    $(document).ready(function() {
        $('#ajax').on('click', function(event){
            console.log(event);
            $.ajax({
                url : 'call/index',
                type : 'GET',
                data: {
                    format: 'json'
                },
                dataType:'json',
                success : function(data) {
                    alert('Data: '+data);
                    console.log(data)
                },
                error : function(request,error)
                {
                    alert("Error");
                }
            });
        })
    });
});
