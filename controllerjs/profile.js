/**
 * Created by Jesus on 16/02/2017.
 */
/*Edit Acc*/

$(document).ready(function () {
    $("#editProfileForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "models/profileModel.php",
            type: "POST",
            data: formData,
            mimeTypes: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                Materialize.toast(data, 2000);
                    setTimeout(function () {
                        if ('Navigator' == navigator.appName) document.forms[0].reset();
                        window.location.reload("userTemplate.php");
                    }, 1000);
            }, error: function () {
                alert("Fallo de JS");
            }
        });
    });
});

/*Delete acc*/

$(document).ready(function () {
    $("#deleteAccForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "models/profileModel.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                Materialize.toast(data, 1500);
                if(data == "Account Deleted :("){
                    setTimeout(function () {
                        window.location.replace("close.php");
                    },2000);
                }
            }, error: function () {
                alert("Fallo de JS");
            }
        });
    });
});
