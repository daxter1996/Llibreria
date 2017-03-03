/**
 * Created by Jesus on 28/02/2017.
 */

/*History Users Suggest*/
$(document).ready(function () {
    $("#userListSuggest").keyup(function () {
       $.get("models/librarian.php", {info: $("#userListSuggest").val(), action: "suggestHistoryUser"}, function (data) {
            $("#userHistorySearch").empty();
            $("#userHistorySearch").html(data);
        })
    })
})