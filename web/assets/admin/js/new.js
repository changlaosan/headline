$(function () {
    let progress = $('.progress');
    $(document).ajaxStart(function () {
        progress.show();
    })
    $(document).ajaxComplete(function () {
        progress.hide();
    })

    $('table').on('click', '.remove', function () {
        let id = $(this).closest("tr").attr("data-id");
        $.ajax({
            url: '/admin.php?c=news',
            data: {
                m: 'activedelete',
                id: id
            },
            success: function (u) {
                location.reload();
            }
        })
    })

    $('#add').on('click',function () {
        $.ajax({
            url: '/admin.php?c=news',
            data: {
                m: 'activeinsert',
            },
            success: function (u) {
                location.reload();
            }
        })
    })

    $("#table").on('blur','input', function () {
        let id = $(this).closest("tr").attr("data-id");
        let k = $(this).attr("data-type");
        let v = $(this).val();
        $.ajax({
            url: '/admin.php?c=news',
            data: {
                m: 'activeupdate',
                id: id,
                k: k,
                v: v
            },
        })
    })
});