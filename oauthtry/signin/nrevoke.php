<?php
include('config.php');
$nnTokenRevoke = $_COOKIE['nn_token_ck'];

$url3 = "https://notify-api.line.me/api/revoke";
$bbody3 = "";
$bbody3 .= "access_token=" . urlencode($nnTokenRevoke) . "&";
$bbody3 .= "client_id=" . urlencode($CLIENT_ID) . "&";
$bbody3 .= "client_secret=" . urlencode($CLIENT_SECRET) . "&";
$header3 = array(
    "Content-Type: application/x-www-form-urlencoded",
    "Authorization:	Bearer ". $nnTokenRevoke,
    "Content-Length: " . strlen($bbody3),
);
$context3 = array(
    "http" => array(
        "method"        => "POST",
        "header"        => implode("\r\n", $header3),
        "content"       => $bbody3,
        "ignore_errors" => true,
    ),
);
$res_json3 = file_get_contents($url3, false, stream_context_create($context3));
$resp3 = json_decode($res_json3, true);
setCookie('nn_token_ck');
header('Location:ordernotify.php');
?>