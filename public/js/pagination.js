function loadMore(page) {
    let url = endpoint;

    const slug = $("#category").val();
    if(slug){
        url = endpoint + '/category/' + slug;
    }

    $.ajax({
        url: url + "?page=" + page,
        datatype: "html",
        type: "get",
        beforeSend: function () {
            $('.auto-load').show();
        }
    })
        .done(function (response) {
            if (response.html == '') {
                $('.load-more-data').hide();
                $('.auto-load').hide();
                return;
            }
            $('.auto-load').hide();
            $("#data-wrapper").append(response.html);
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });
}

$(function (){
    $(".load-more-data").click(function() {
        page++;
        loadMore(page);
    });
});

