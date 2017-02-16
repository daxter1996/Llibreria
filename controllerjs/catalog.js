/**
 * Created by Jesus on 16/02/2017.
 */

/*Search Results*/

$(document).ready(function () {
    $("#searchIn").keyup(function () {
        $.get("models/catalog.php", {searchName: $("#searchIn").val(), searchType: $("#searchOption").val()}, function (data) {
            $("#searchResult").empty();
            $("#searchResult").html(data);
        })
    })
})

$(document).ready(function () {
    $("#search1").mouseleave(function () {
        $.get("models/scripts.php", {searchName: $("#searchIn").val(), searchType: $("#searchOption").val()}, function (data) {
            $("#searchResult").emloginpty();
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
            url: "models/catalog.php",
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