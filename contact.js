/**
 * Created by nporter on 9/7/16.
 */
$(document).on('click','#submit',function(){
    mailer();

});
function mailer(){
    $('#submit').html("<img src='Images/loader.gif' height='100p'>");
    var name = $("#name").val();
    console.log("name: " , name);
    var email = $("#email").val();
    console.log("email: " ,email);
    var subject = $('#subject').val();
    console.log("subject: " , subject);
    var content = $('#textarea').val();
    console.log("content: " ,content);
    $.ajax({
        url: 'contact_handler.php',
        method: 'post',
        dataType:'json',
        data: {
            name:name,
            email:email,
            subject:subject,
            content:content
        },
        success: function(response){
            if(response.success == true){
                $('#submit').html("sent!");
                var name = $("#name").val('');
                var email = $("#email").val('');
                var subject = $('#subject').val('');
                var content = $('#textarea').val('');
            }
            else{
                $('#submit').html("send");
                alert('Invalid email entered or error with server');

            }

				console.log("connection was success: " , response);
        },
        error: function(response){
            console.log("there was an error: " ,response);
        }
    })
}


