<?php
// session_start(); 

// Facebook login
require './vendor/autoload.php';  
$fb = new Facebook\Facebook([
  'app_id' => '2881834092055786',
  'app_secret' => 'f90fcb5e55367ca8a5e19694f7c14393',
  'default_graph_version' => 'v2.7'
]); 
$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost/pwl/mg1/login.php");

try {
    $accessToken = $helper->getAccessToken();
    if (isset($accessToken)) {
        $_SESSION['access_token'] = (string) $accessToken;  //conver to string
        //if session is set we can redirect to the user to any page 
        header("Location:FacebookHome.php");
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}

?>