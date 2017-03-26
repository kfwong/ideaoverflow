$(document).ready(function(){
    $('.btn-like').on('click', function(){
        var target = $(this);
        $.ajax({
            url: '/posts/'+$(this).data('post-id')+'/like',
            type: 'POST',
            data: {_token: "CSRF_TOKEN"}, //todo!!!
            dataType: 'JSON',
            success: function (data) {
                target.find('.likes-count').text(data.likes_count);
            }
        });
    });
});

