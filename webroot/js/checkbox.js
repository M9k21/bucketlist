$(function () {
    // チェックマークの解除
    $(document).on('click', '.incomplete_button', function (event) {
        event.preventDefault();
        var data = $(this).parent('.checkbox_form').serializeArray();
        $.ajax({
            type: "POST",
            datatype: 'JSON',
            url: "/bucketlist/incomplete",
            timeout: 10000,
            data: data,
        })
            .then(
                // 正常に処理が実行された場合
                function (html) {
                    $('div#checkbox_' + data[2].value).replaceWith(html);
                    $('#completed_' + data[2].value).hide();
                },
                // 正常に処理が行われなかった場合
                function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("失敗");
                }
            );
    });

    // チェックマークの登録
    $(document).on('click', '.complete_button', function (event) {
        event.preventDefault();
        var data = $(this).parent('.checkbox_form').serializeArray();
        $.ajax({
            type: "POST",
            datatype: 'JSON',
            url: "/bucketlist/complete",
            timeout: 10000,
            data: data,
        })
            .then(
                // 正常に処理が実行された場合
                function (html) {
                    $('div#checkbox_' + data[2].value).replaceWith(html);
                    $('#completed_' + data[2].value).show();
                },
                // 正常に処理が行われなかった場合
                function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("失敗");
                }
            );
    });
});
