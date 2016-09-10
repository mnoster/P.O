/**
 * Created by njporter10 on 9/8/16.
 */
/**
 * Created by njporter10 on 9/3/16.
 */
$(document).on('click', "#create_user", function () {
    create_user();
});
function create_user() {
    var username = $('#username').val();
    console.log(username);
    var password = $('#password').val();
    console.log(password);
    var password2 = $('#password2').val();
    console.log(password2);
    var email = $('#email').val();
    console.log(email);

    $.ajax({
        url: 'register_user_handler.php',
        method: 'POST',
        data: {
            username: username,
            password: password,
            password2: password2,
            email:email
        },
        dataType: 'json',
        success: function (response) {
            console.log("response is success: ", response);
            if(response.message == "You typed the password incorrectly"){
                $('<div>').addClass("text-danger").text("Username or email is already been used").appendTo('#error-message');
                return;
            }
            if (response.success == true) {
                window.location.replace('login.php');
            }
        },
        error: function (response) {
            console.log("there was an error: ", response);
            $('<div>').addClass("text-danger").text("Username or email is already been used").appendTo('#error-message');
        }
    })
}
