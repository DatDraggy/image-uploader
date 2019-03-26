<?php
ini_set('memory_limit', '512M');
require_once(__DIR__ . '/config/config.php');

if (isset($_GET['file']) && !empty($_GET['file'])) {
  $file = $_GET['file'];

  $mimes = array(
    'jpg'  => 'image/jpeg',
    'png'  => 'image/png',
    'gif'  => 'image/gif',
    'webm' => 'video/webm'
  );

  $ext = explode('.', $file)[1];

  $filePath = "{$config['saveDir']}/$ext/$file";

  if (file_exists($filePath)) {
    $filesize = filesize($filePath);

    header('Content-Type: ' . $mimes[$ext]);
    header('Content-Length: ' . $filesize);
    echo file_get_contents($filePath);
  }
  die();
}

session_start();
if(isset($_SESSION['id'])){
  //Show Gallery
}
else {
  //Show Login
}