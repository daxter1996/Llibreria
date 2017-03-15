/**
 * Created by Jesus on 16/02/2017.
 */

/*Delete Items*/

/*Suggest Delete Items*/
$(document).ready(function () {
    $("#listSuggest").keyup(function () {
        $.get("models/adminModel.php", {action: "suggestRemoveItem",removeItems: $("#listSuggest").val()}, function (data) {
            $("datalist").empty();
            $("datalist").html(data);
        })
    })
})

/*Delete Item*/
$(document).ready(function () {
    $("#deleteItemBtnId").click(function () {
        $.get("models/adminModel.php", {info: $("#listSuggest").val(), action: "removeItem", controller: "session"}, function (data) {
            Materialize.toast(data, 4000);
        })
    })
})

/*Delete Users Suggest*/
$(document).ready(function () {
    $("#userListSuggest").keyup(function () {
        $.get("models/adminModel.php", {action: "suggestRemoveUser",deleteUserList: $("#userListSuggest").val()}, function (data) {
            $("datalist").empty();
            $("datalist").html(data);
        })
    })
})

/*Delete User*/
$(document).ready(function () {
    $("#deleteUserBtn").click(function () {
        $.get("models/adminModel.php", {info: $("#userListSuggest").val(), action: "deleteUser", controller: "session"}, function (data) {
            Materialize.toast(data, 4000);
        })
    })
})

/*Return today*/

$(document).ready(function () {
    $("#returnTodayBtn").click(function () {
        $.get("models/adminModel.php", {returnInfo: true, action: "returnInfo"}, function (data) {
            $("#returnList").empty();
            $("#returnList").html(data);
        })
    })
})

/*Make Admin*/

$(document).ready(function () {
    $("#makeAdminBtn").click(function () {
        $.get("models/adminModel.php", {info: $("#userListSuggest").val(), action: "makeAdmin", controller: "session"}, function (data) {
            Materialize.toast(data, 4000);
        })
    })
})

$(document).ready(function () {
    $("#makePeasantBtn").click(function () {
        $.get("models/adminModel.php", {info: $("#userListSuggest").val(), action: "makePeasant", controller: "session"}, function (data) {
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
            url: "models/adminModel.php",
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

/*Register User*/

$(document).ready(function () {
    $("#registerUserAdmin").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "models/adminModel.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                Materialize.toast(data, 4000);
            }, error: function () {
                alert("Fallo de JS");
            }
        });
    });
});

/*Change Settings*/

$(document).ready(function () {
    $("#settings").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "models/adminModel.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                Materialize.toast("Settings has been changed!", 2000);
                setTimeout(function () {
                    if(data == "true"){
                        window.location.replace("adminSite.php#changeSettings");
                    }
                },2000);
            }, error: function () {
                alert("Fallo de JS");
            }
        });
    });
});
