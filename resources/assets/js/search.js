var entityMap = {
  '&': '&amp;',
  '<': '&lt;',
  '>': '&gt;',
  '"': '&quot;',
  "'": '&#39;',
  '/': '&#x2F;',
  '`': '&#x60;',
  '=': '&#x3D;'
};

function escapeHtml (string) {
  return String(string).replace(/[&<>"'`=\/]/g, function (s) {
    return entityMap[s];
  });
}

$(document).on('click', function () {
    $('.results').hide();
});

$('#searchbox').on('click', function (e) {
    $('.results').empty();
    $('.results').append('<li><a href="#">No result found... Try something else?</a></li>');
    $('.results').show();
    e.stopPropagation();
});

var delayTimer = null;
$('#searchbox').on('keyup', function () {
    clearTimeout(delayTimer);
    delayTimer = setTimeout(function () {
        var q = $('#searchbox').val();
        if(q != '') {
            $.get("/posts/search?q=" + q, function (data) {
                $('.results').empty();
                if (data.length > 0) {
                    data.forEach(function (item) {
                        //var dateUpdated = moment(item.updated_at, 'YYYY-MM-DD HH:mm:ss').fromNow();
                        $('.results').append('<li><a href="/posts/' + item.id + '"><span class="result-title">' + escapeHtml(item.title) + '</span>&nbsp;&nbsp;<span class="label tag-'+item.type+'">'+escapeHtml(item.type)+'</span>&nbsp;&nbsp;<br/><span class="result-body">' + escapeHtml(item.body) + '</span></a></li>');
                    });
                } else {
                    $('.results').append('<li><a href="#">No result found... Try something else?</a></li>');
                }
            });
        }
    }, 1000); // Will do the ajax stuff after 1000 ms, or 1 s
});
/**
 * Created by kfwong on 4/7/17.
 */
