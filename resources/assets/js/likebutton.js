$(document).ready(function(){
    $('.btn-like').on('click', function(){
        var target = $(this);
        $.ajax({
            url: '/posts/'+$(this).data('post-id')+'/like',
            type: 'POST',
            dataType: 'JSON',
            success: function (data) {
                target.find('.likes-count').text(data.likes_count);
                $(document).trigger('likes-count-changed', [data.likes_count]);
                if(data.likes.length > 0) { // liked by current user
                    target.removeClass('btn-default').addClass('btn-primary');
                    target.find('.like-state').text('Liked ');
                } else { // not liked by current user
                    target.removeClass('btn-primary').addClass('btn-default');
                    target.find('.like-state').text('Like ');
                }
            }
        });
    });
});

