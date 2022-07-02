<?php
include('config.php');
$ngetCode = $_GET['code'];
$ngetState = $_GET['state'];
if (isset($_GET['error'])){
    $ngeterror = $_GET['error'] . '&' . $_GET['error_description'];
    header('Location:cantnotify.php');
}
$url2 = "https://notify-bot.line.me/oauth/token";
$bbody2 = "";
$bbody2 .= "grant_type=authorization_code&";
$bbody2 .= "code=" . urlencode($ngetCode) . "&";
$bbody2 .= "redirect_uri=" . urlencode($nREDIRECT_URI) . "&";
$bbody2 .= "client_id=" . urlencode($nCLIENT_ID) . "&";
$bbody2 .= "client_secret=" . urlencode($nCLIENT_SECRET). "&";
$header2 = array(
    "Content-Type: application/x-www-form-urlencoded",
    "Content-Length: " . strlen($bbody2),
);
$context2 = array(
    "http" => array(
        "method"        => "POST",
        "header"        => implode("\r\n", $header2),
        "content"       => $bbody2,
        "ignore_errors" => true,
    ),
);
$response2 = file_get_contents($url2, false, stream_context_create($context2));
$resp2 = json_decode($response2, true);
var_dump($resp2);
$nnToken = $resp2['access_token'];
setCookie('nn_token_ck', $nnToken);
header('Location:ordernotify.php');
?>