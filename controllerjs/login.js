/*Login*/

$(document).ready(function () {
    $("#login").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "models/login.php",
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
            url: "models/login.php",
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

/*Register User Admin Zone*/

$(document).ready(function () {
    $("#registerUserBtn").click(function () {
        $.get("models/scripts.php", {
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