function editProfile() {
    document.getElementById("editProfile").style.display = "block";
    document.getElementById("profile").style.display = "none";
}

function cancelEdit() {
    document.getElementById("profile").style.display = "block";
    document.getElementById("editProfile").style.display = "none";
}
/*ReturnBook*/

$(document).ready(function () {
    $("#returnBookBtn").click(function () {
        $.get("models/scripts.php", {returnId: $("#idBook").val()}, function (data) {
            Materialize.toast(data,4000);
            setTimeout(function() {
                location.reload();
            }, 2000);
        })
    })
})

    /*DelateAcc*/

    $(document).ready(function () {
        $("#delateAccBtn").click(function () {
            $.get("scripts.php", {delateAcc: "true"}, function (data) {
                if(data == 1){
                    Materialize.toast("Account Deleted",1000);
                    setTimeout(function () {
                        window.location.replace("index.php");
                    }, 1000);
                }
            });
        });
    });

    /*Delete Items*/
    $(document).ready(function () {
        $("#listSuggest").keyup(function () {
            $.get("models/scripts.php", {removeItems: $("#listSuggest").val()}, function (data) {
                $("datalist").empty();
                $("datalist").html(data);
            })
        })
    })


    $(document).ready(function () {
        $("#deleteItemBtnId").click(function () {
            $.get("models/scripts.php", {deleteItemName: $("#listSuggest").val()}, function (data) {
                Materialize.toast(data, 4000);
            })
        })
    })

    /*Delete Users*/
    $(document).ready(function () {
        $("#userListSuggest").keyup(function () {
            $.get("models/scripts.php", {deleteUserList: $("#userListSuggest").val()}, function (data) {
                $("datalist").empty();
                $("datalist").html(data);
            })
        })
    })

    $(document).ready(function () {
        $("#deleteUserBtn").click(function () {
            $.get("models/scripts.php", {deleteUser: $("#userListSuggest").val()}, function (data) {
                Materialize.toast(data, 4000);
            })
        })
    })

    /*Return today*/

    $(document).ready(function () {
        $("#returnTodayBtn").click(function () {
            $.get("models/scripts.php", {returnInfo: true}, function (data) {
                $("#returnList").empty();
                $("#returnList").html(data);
            })
        })
    })

    /*Make Admin*/

    $(document).ready(function () {
        $("#makeAdminBtn").click(function () {
            $.get("models/scripts.php", {makeAdmin: $("#userListSuggest").val()}, function (data) {
                Materialize.toast(data, 4000);
            })
        })
    })

    $(document).ready(function () {
        $("#makePeasantBtn").click(function () {
            $.get("models/scripts.php", {makePeasant: $("#userListSuggest").val()}, function (data) {
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
                url: "models/scripts.php",
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