/*Login*/

$(document).ready(function () {
    $("#login").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "models/loginModel.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                Materialize.toast(data, 4000);
                setTimeout(function () {
                    if(data == "Login OK") window.location.replace("index.php");
                },2000);
            }, error: function () {
                alert("Fallo de JS");
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
            url: "models/loginModel.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                Materialize.toast(data, 4000);
            }, error: function () {
                Materialize.toast("JS Failure", 4000);
            }
        });
    });
});
