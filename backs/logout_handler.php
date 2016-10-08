<?php
$message['status'] = "you are logged out";
if(session_destroy()) // Destroying All Sessions
{
    print( json_encode($message));
}
?>