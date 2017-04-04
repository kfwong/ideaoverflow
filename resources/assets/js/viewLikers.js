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
                    userdiv.find('.like-name').html(user['name'] + ' <small>@' + user['username']+ '</small>');
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