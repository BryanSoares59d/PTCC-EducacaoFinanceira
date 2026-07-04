<?php

require_once 'conexao.php';
require_once 'google-config.php';

$client = new Google_Clientt();
$client-> setClienteId(GOOGLE_CLIENT_ID);
$client-> setClienteSecrete(GOOGLE_CLIENT_SECRET);
$client-> addScope('email');
$client-> addScope('profile');

if(!isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    exit;
} else {
    $client->authenticate($_GET['code']);
    $token = $client->getAccesstoken();
    $client->setAccessToken($token);

    
}



?>