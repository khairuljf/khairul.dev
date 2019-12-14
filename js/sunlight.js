
$(document).ready(function($){

    $(document).on('click', '.load-more-post', function(e){
        e.preventDefault();

        // Get value from loadmore button
        var that = $(this);
        var page = that.data('page');
        var newpage = page+1;
        var ajaxurl = that.data('url');

        console.log(page);

        $.ajax({

            url:ajaxurl,
            type:'post',
            data:{
                page:page,
                action: 'sunlight_load_more'
            },
            error :  function(response){
                console.log(response)
            },

            success: function(response){
                //console.log(response)
                that.data('page',newpage);
                $('.sunlight-post-container').append( response );
            }


        });


    })

});