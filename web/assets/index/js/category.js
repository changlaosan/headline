$(function() {
    let del = $('.del li').not( $('.del li').eq(0) );
    del.on('click', function () {
        var id = $(this).attr("data-id");
        console.log($(this));
        var val = $(this).context.innerText;
        $.ajax({
            url: '/index.php',
            data: {
                c: 'page',
                m:'category',
                s:'0',
                id: id,
            },
            success: function () {
                location.reload();
            }
        })
    })

    $('.add').on('click', '.li', function () {
        var id = $(this).attr("data-id");
        var val = $(this).context.innerText;
        $.ajax({
            url: '/index.php',
            data: {
                c: 'page',
                m:'category',
                s:'1',
                id: id,
            },
            success: function () {
                location.reload();
            }
        })
    })

})