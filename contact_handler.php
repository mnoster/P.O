<?php
ob_start();
require_once('email_config.php');
require('phpmailer/PHPMailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication


$mail->Username = EMAIL_USER;                 // SMTP username
$mail->Password = EMAIL_PASS;                 // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$options = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->smtpConnect($options);
$mail->From = addslashes($_POST['email']);//your email sending account
$mail->FromName = addslashes($_POST['name']); //your email sending account name
$mail->addAddress(EMAIL_USER);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo($mail->From);
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $_POST['subject'];
$mail->Body    = htmlentities($_POST['content']);
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$output = [
    'success'=> false
];


if(!$mail->send()) {
    $output['message'] = 'message not sent';

} else {
    $output['success'] = true;
    $output['message'] = 'Message has been sent';

}
$debug = ob_get_contents();
ob_end_clean();
$output['debug'] = $debug;
$json_output = json_encode($output);
print($json_output);

?>
