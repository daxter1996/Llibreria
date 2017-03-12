/**
 * Created by Jesus on 16/02/2017.
 */

/*Search Results*/

$(document).ready(function () {
    $("#searchIn").keyup(function () {
        $.get("models/catalogModel.php", {action: "searchItem",searchName: $("#searchIn").val(), searchType: $("#searchOption").val()}, function (data) {
            $("#searchResult").empty();
            $("#searchResult").html(data);
        })
    })
})

$(document).ready(function () {
    $("#search1").mouseleave(function () {
        $.get("models/catalogModel.php", {action: "searchItem", searchName: $("#searchIn").val(), searchType: $("#searchOption").val()}, function (data) {
            $("#searchResult").empty();
            $("#searchResult").html(data);
        })
    })
})

/*Booking*/

$(document).ready(function () {
    $("#bookform").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "models/catalogModel.php",
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


/*ReturnBook*/

    $(document).ready(function () {
        $("#returnBookBtn").click(function () {
            $.get("models/catalogModel.php", {controller: "session",action: "returnBook", info: $("#idBook").val()}, function (data) {
                Materialize.toast(data,4000);
                setTimeout(function() {
                    location.reload();
                }, 2000);
            })
        })
    })

/*Cancel Book*/

    $(document).ready(function () {
        $("#cancelBookBtn").click(function () {
            $.get("models/catalogModel.php", {controller: "session", action: "cancelBook", info: $("#idBook").val()}, function (data) {
                Materialize.toast(data,1000);
                setTimeout(function() {
                    location.reload();
                }, 1500);
            })
        })
    })



$(document).ready(function () {
    $("#returnList").click(function () {
        var id = $(this).attr("href").split("#");
        $.get("models/catalogModel.php", {action: "returnBook",info: id[1], controller: "session"}, function (data) {
            Materialize.toast(data,2000);
            if(data == "Thanks!"){
                setTimeout(function () {
                    location.reload();
                },2000);
            }
        })
    });
});