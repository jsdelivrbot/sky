$(document).ready(function () {

    $('#transfer_unique_id1').blur(function () {

        url = $('#url').data('url');
        $.post(url + "/ajax/transfer_user_name",
            {
                'unique_id': $('#transfer_unique_id1').val()
            },
            function (data, status) {
                $('#transfer_user_name1').text(data);
            });
    });

    $('#transfer_unique_id2').blur(function () {

        url = $('#url').data('url');
        $.post(url + "/ajax/transfer_user_name",
            {
                'unique_id': $('#transfer_unique_id2').val()
            },
            function (data, status) {
                $('#transfer_user_name2').text(data);
            });
    });


});

