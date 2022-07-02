<?php
include('config.php');
$accessTokenRevoke = $_COOKIE['access_token_ck'];
$url4 = "https://api.line.me/oauth2/v2.1/revoke ";
$query4 = "";
$query4 .= "access_token=" . urlencode($accessTokenRevoke) . "&";
$query4 .= "client_id=" . urlencode($CLIENT_ID) . "&";
$query4 .= "client_secret=" . urlencode($CLIENT_SECRET) . "&";
$header4 = array(
    "Content-Type: application/x-www-form-urlencoded",
    "Content-Length: " . strlen($query4),
);
$context4 = array(
    "http" => array(
        "method"        => "POST",
        "header"        => implode("\r\n", $header4),
        "content"       => $query4,
        "ignore_errors" => true,
    ),
);
$res_json4 = file_get_contents($url4, false, stream_context_create($context4));
setCookie('access_token_ck');
setCookie('displayName_ck');
setCookie('pictureUrl_ck');
header('Location:signin.php');
?>