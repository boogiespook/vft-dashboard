<?php
require_once __DIR__.'/vendor/autoload.php';

define('SCOPES', implode(' ', array(
  Google_Service_Sheets::SPREADSHEETS_READONLY)
));



session_start();

$client = new Google_Client();
$client->setAuthConfig('client_secret.json');
$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
$client->setScopes(SCOPES);
$client->setDeveloperKey("MiityYPb_IWJ9J9wdeUIPQcZLGwYDUKkk");

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
#  $client->setAccessToken($_SESSION['access_token']);
#  $drive = new Google_Service_Drive($client);
#  $files = $drive->files->listFiles(array())->getItems();
#  echo json_encode($files);
$service = new Google_Service_Sheets($client);
$spreadsheetId = '1UUmhWQVOjy3lpWlOgTBfdShnA1TgQWarQWOoYW1I0yk';
$range = 'Overview!A2:E';
$response = $service->spreadsheets_values->get($spreadsheetId,$range);

} else {
#  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/vft/oauth2callback.php';
  $redirect_uri = 'http://localhost/vft/oauth2callback.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

?>