<?php
require_once (__DIR__.'/config/config.php');

if (!isset($_GET['file']) || empty($_GET['file'])) {
  die();
}
$file = $_GET['file'];

$mimes = array('jpg'  => 'image/jpeg',
               'png'  => 'image/png',
               'gif'  => 'image/gif',
               'webm' => 'video/webm'
);

$ext = explode('.', $file)[1];

header('Content-Type: '. $mimes[$ext]);
echo file_get_contents("{$config['saveDir']}/$ext/$file");