/**
 * Created by njporter10 on 9/8/16.
 */
$(document).on('click', ".login-button", function () {
    user_login();
});
function user_login() {
    var username = $('#username').val();
    console.log(username);
    var password = $('#password').val();
    console.log(password);

    $.ajax({
        url: 'login_handler.php',
        method: 'POST',
        data: {
            username: username,
            password: password
        },
        dataType: 'json',
        success: function (response) {
            console.log("response is success: ", response);
            if (response.success == true) {
                populate_user_profile_info(username);
                window.location.replace('create_profile.php');
            }
        },
        error: function (response) {
            console.log("there was an error: ", response);
            $('<div>').addClass("text-danger").text("Invalid code").appendTo('#error-message');
        }
    })
}
function populate_user_profile_info(username){
    $.ajax({
        url: 'user_session.php',
        method: 'POST',
        data: {
            username: username
        },
        dataType: 'json',
        success: function (response) {
            console.log("get user info is success: ", response);
        },
        error: function (response) {
            console.log("there was an error: ", response);
//                $('<div>').addClass("text-danger").text("Invalid code").appendTo('#error-message');
        }
    })
}


//-------angular script--------------