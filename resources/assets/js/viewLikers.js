$(document).ready(function() {
    $('#userExample').hide();
    $('#exampleModal').on('show.bs.modal', function (event) {
        $('.liker-user').remove();
        $('.loader').show();
        post_id = $(event.relatedTarget).data('post-id');
        $.ajax({
            url: '/posts/'+post_id+'/likers',
            type: 'GET',
            dataType: 'JSON',
        })
        .done(function(users) {
            console.log(users.length)
            $('.loader').hide();
            for (var i = 0; i < users.length; i++) {
                user = users[i];
                var userdiv = $('#userExample').clone();
                userdiv.addClass('liker-user');
                userdiv.show();
                var userprof = $('<a>', {
                    text: '@' + user['username'],
                    href: '/users/' + user['id']
                })
                userdiv.find('.like-name').html(user['name'] + ' <small>'+ $('<div>').append(userprof).html() +'</small>');
                userimg = $('<img />', { 
                  src: '/img/doge-profile.jpg',
                  alt: 'profile',
                  width: '32px',
                  height: '32px'
                });
                var userimghref = '/img/avatars/avatar_' + user['id'] + '.jpg';
                $.get(userimghref).done(function() {
                    userimg.attr('src', userimghref);
                });
                userdiv.find('.media-left').html(userimg);
                $('.modal-body').append(userdiv);
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function(users) {
            console.log("complete");
        });

    });
});