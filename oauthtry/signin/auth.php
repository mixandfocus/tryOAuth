<?php
if (isset($_COOKIE['displayName_ck'])){
    header('Location:ordernotify.php');
}else{
include('config.php');
$getCode = $_GET['code'];
$url = "https://api.line.me/oauth2/v2.1/token";
$query = "";
$query .= "grant_type=" . urlencode("authorization_code") . "&";
$query .= "code=" . urlencode($getCode) . "&";
$query .= "redirect_uri=" . urlencode($REDIRECT_URI) . "&";
$query .= "client_id=" . urlencode($CLIENT_ID) . "&";
$query .= "client_secret=" . urlencode($CLIENT_SECRET) . "&";
$header = array(
    "Content-Type: application/x-www-form-urlencoded",
    "Content-Length: " . strlen($query),
);
$context = array(
    "http" => array(
        "method"        => "POST",
        "header"        => implode("\r\n", $header),
        "content"       => $query,
        "ignore_errors" => true,
    ),
);
$res_json = file_get_contents($url, false, stream_context_create($context));
$info = json_decode($res_json, true);
$accessToken = $info['access_token'];
setCookie('access_token_ck', $accessToken);

$url2 = "https://api.line.me/v2/profile";
$curl = curl_init($url2);
curl_setopt($curl, CURLOPT_URL, $url2);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$headers = array(
   "Accept: application/json",
   "Authorization: Bearer ". $info['access_token'],
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resp = curl_exec($curl);
curl_close($curl);
$info2 = json_decode($resp, true);
$get_displayName = $info2['displayName'];
$get_pictureUrl = $info2['pictureUrl'].'/small';
setCookie('displayName_ck', $get_displayName);
setCookie('pictureUrl_ck', $get_pictureUrl);
header('Location:ordernotify.php');
}
?>



