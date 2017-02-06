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
            $.get("scripts.php", {returnId: $("#idBook").val()}, function (data) {
                Materialize.toast(data,4000);
                setTimeout(function() {
                    location.reload();
                }, 2000);
            })
        })
    })

    /*Booking*/

    $(document).ready(function () {
        $("#bookform").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "scripts.php",
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    Materialize.toast(data, 4000);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }, error: function () {
                    alert("okey");
                }
            });
        });
    });

    /*Register*/

    $(document).ready(function () {
        $("#register").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "scripts.php",
                type: "POST",
                data: formData,
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

    /*Login*/

    $(document).ready(function () {
        $("#loginBtn").click(function () {
            $.get("scripts.php", {
                login: true,
                email: $("#emailIn").val(),
                password: $("#passwdIn").val()
            }, function (data) {
                Materialize.toast(data, 4000);
                if (data == "Login OK") {
                    window.location.replace("index.php")
                }
            })
        })
    })

    /*Delete Items*/
    $(document).ready(function () {
        $("#listSuggest").keyup(function () {
            $.get("scripts.php", {removeItems: $("#listSuggest").val()}, function (data) {
                $("datalist").empty();
                $("datalist").html(data);
            })
        })
    })


    $(document).ready(function () {
        $("#deleteItemBtnId").click(function () {
            $.get("scripts.php", {deleteItemName: $("#listSuggest").val()}, function (data) {
                Materialize.toast(data, 4000);
            })
        })
    })

    /*Delete Users*/
    $(document).ready(function () {
        $("#userListSuggest").keyup(function () {
            $.get("scripts.php", {deleteUserList: $("#userListSuggest").val()}, function (data) {
                $("datalist").empty();
                $("datalist").html(data);
            })
        })
    })

    $(document).ready(function () {
        $("#deleteUserBtn").click(function () {
            $.get("scripts.php", {deleteUser: $("#userListSuggest").val()}, function (data) {
                Materialize.toast(data, 4000);
            })
        })
    })

    /*Register User*/

    $(document).ready(function () {
        $("#registerUserBtn").click(function () {
            $.get("scripts.php", {
                registerName: $("#registerNameIn").val(),
                surname: $("#registerSurnameIn").val(),
                password: $("#registerPasswordIn").val(),
                address: $("#registerAddressIn").val(),
                dni: $("#registerDniIn").val(),
                email: $("#registerEmailIn").val(),
                userType: $("#registerTypeIn").val()
            }, function (data) {
                Materialize.toast(data, 4000);
            })
        })
    })

    /*Return today*/

    $(document).ready(function () {
        $("#returnTodayBtn").click(function () {
            $.get("scripts.php", {returnInfo: true}, function (data) {
                $("#returnList").empty();
                $("#returnList").html(data);
            })
        })
    })

    /*Make Admin*/

    $(document).ready(function () {
        $("#makeAdminBtn").click(function () {
            $.get("scripts.php", {makeAdmin: $("#userListSuggest").val()}, function (data) {
                Materialize.toast(data, 4000);
            })
        })
    })

    $(document).ready(function () {
        $("#makePeasantBtn").click(function () {
            $.get("scripts.php", {makePeasant: $("#userListSuggest").val()}, function (data) {
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
                url: "scripts.php",
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

    /*Search Results*/

    $(document).ready(function () {
        $("#searchIn").keyup(function () {
            $.get("scripts.php", {searchName: $("#searchIn").val(), searchType: $("#searchOption").val()}, function (data) {
                $("#searchResult").empty();
                $("#searchResult").html(data);
            })
        })
    })

    $(document).ready(function () {
        $("#search1").mouseleave(function () {
            $.get("scripts.php", {searchName: $("#searchIn").val(), searchType: $("#searchOption").val()}, function (data) {
                $("#searchResult").empty();
                $("#searchResult").html(data);
            })
        })
    })