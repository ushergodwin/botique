<?php 
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '{306298940433863}',
  'app_secret' => '{42129860e3a42cc5bf8370ac61157547}',
  'default_graph_version' => 'v2.10',
  ]);

$fb = new Facebook\Facebook([/* . . . */]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'name']; // optional
$loginUrl = $helper->getLoginUrl('https://{www.gemasglam.com}/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>