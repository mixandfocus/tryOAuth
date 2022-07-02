<?php
$sendToken = $_COOKIE['nn_token_ck'];
$mmsg = $_POST['message'];
    $url9 = "https://notify-api.line.me/api/notify";
    $bbody9 = "";
    $bbody9 .= "message=\n".$mmsg."&";
    $header9 = [
            "Authorization:	Bearer ". $sendToken,
            "Content-Type: application/x-www-form-urlencoded"
    ];
    $msg9 = array(
        "http" => array(
            "method"        => "POST",
            "header"        => implode("\r\n", $header9),
            "content"       => $bbody9,
            "ignore_errors" => true,
        ),
    );
    $res9 = file_get_contents($url9, false, stream_context_create($msg9));
    $res99 = json_decode($res9, true);
header('Location:ordernotify.php');
?>