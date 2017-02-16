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

