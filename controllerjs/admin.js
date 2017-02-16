/**
 * Created by Jesus on 16/02/2017.
 */

/*Delete Items*/

/*Suggest Delete Items*/
$(document).ready(function () {
    $("#listSuggest").keyup(function () {
        Materialize.toast("suggest", 3463)
        $.get("models/admin.php", {removeItems: $("#listSuggest").val()}, function (data) {
            $("datalist").empty();
            $("datalist").html(data);
        })
    })
})

/*Delete Item*/
$(document).ready(function () {
    $("#deleteItemBtnId").click(function () {
        $.get("models/admin.php", {deleteItemName: $("#listSuggest").val()}, function (data) {
            Materialize.toast(data, 4000);
        })
    })
})

/*Delete Users*/
$(document).ready(function () {
    $("#userListSuggest").keyup(function () {
        $.get("models/admin.php", {deleteUserList: $("#userListSuggest").val()}, function (data) {
            $("datalist").empty();
            $("datalist").html(data);
        })
    })
})

$(document).ready(function () {
    $("#deleteUserBtn").click(function () {
        $.get("models/admin.php", {deleteUser: $("#userListSuggest").val()}, function (data) {
            Materialize.toast(data, 4000);
        })
    })
})

/*Return today*/

$(document).ready(function () {
    $("#returnTodayBtn").click(function () {
        $.get("models/admin.php", {returnInfo: true}, function (data) {
            $("#returnList").empty();
            $("#returnList").html(data);
        })
    })
})

/*Make Admin*/

$(document).ready(function () {
    $("#makeAdminBtn").click(function () {
        $.get("models/admin.php", {makeAdmin: $("#userListSuggest").val()}, function (data) {
            Materialize.toast(data, 4000);
        })
    })
})

$(document).ready(function () {
    $("#makePeasantBtn").click(function () {
        $.get("models/admin.php", {makePeasant: $("#userListSuggest").val()}, function (data) {
            Materialize.toast(data, 4000);
        })
    })
})

/*Add Element*/

$(document).ready(function () {
    $("#add").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "models/admin.php",
            type: "POST",
            data: formData,
            mimeTypes: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                Materialize.toast(data, 4000);
            }, error: function () {
                alert("okey");
            }
        });
    });
});