function listenForUserChange() {
    //acknowledgement message
    var message_status = $("#status");
    $(".existing td[contenteditable=true]").blur(function () {
        var field_userid = $(this).attr("id");
        var value = $(this).text();
        $.post('./skeleton/changeUser.php', field_userid + "=" + value, function (data) {
            if (data != '') {
                message_status.show();
                message_status.text(data);
                //hide the message
                setTimeout(function () {
                    message_status.hide()
                }, 3000);
            }
        });
    });
}
function addNewUser() {
    var fields = $(".new td[contenteditable=true]");
    var data = {};
    $.each(fields, function (key, value) {
        data[$(value).attr('id')] = $(value).text();
    });
    $.post('./skeleton/addUser.php', data, function () {
        window.location.reload();
    });
}