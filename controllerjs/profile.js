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
                if(data == "Edit Ok") {
                    setTimeout(function () {
                        window.location.reload("userTemplate.php");
                    }, 1000);
                }
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
                Materialize.toast(data, 2000);
                if(data == "Account Deleted :("){
                    setTimeout(function () {
                        window.location.reload("index.php");
                    },2000);
                }
            }, error: function () {
                alert("Fallo de JS");
            }
        });
    });
});
