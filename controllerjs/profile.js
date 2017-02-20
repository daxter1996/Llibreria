/**
 * Created by Jesus on 16/02/2017.
 */

$(document).ready(function () {
    $("#delateAccBtn").click(function () {
        $.get("models/profile.php", {delateAcc: "true"}, function (data) {
            if(data == 1){
                Materialize.toast("Account Deleted!",1000);
                setTimeout(function () {
                    window.location.replace("index.php");
                }, 1000);
            }
        });
    });
});

/*Edit Acc*/

$(document).ready(function () {
    $("#editProfileForm").submit(function (e) {
        e.preventDefault();
        Materialize.toast("asdf",1234)
        var formData = new FormData(this);
        $.ajax({
            url: "models/profile.php",
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
                alert("okey");
            }
        });
    });
});