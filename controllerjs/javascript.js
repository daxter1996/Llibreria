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


    /*
     select email,id from user where email like 'd' and userType = 'user'*/