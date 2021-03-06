<?php
header('Cache-Control: max-age=0');
require_once __DIR__ . '/config/config.php';

if (!isset($_POST['password']) || $_POST['password'] !== $config['password'] || empty($config['password'])) {
  header('Status: 401');
  die('Unauthorized');
}

if (filesize($_FILES['image']['tmp_name']) < 0 || !array_key_exists($_FILES['image']['type'], $config['allowedTypes'])) {
  header('Status: 415');
  die('Unsupported Media Type');
}

if ($_FILES['image']['error'] > 0) {
  header('Status: 500');
  die('Internal Server Error');
}

if (!file_exists($config['saveDir'])) {
  mkdir($config['saveDir']);
}

saveImage($_FILES['image']['type'], $_FILES['image']['tmp_name']);

function newFileName($ext) {
  global $config;
  $an = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  $rand = substr(str_shuffle($an), 0, 7);

  if (file_exists("{$config['saveDir']}/$ext/$rand.$ext")) {
    return newFileName($ext);
  } else {
    return $rand;
  }
}

function saveImage($mimeType, $tempFileName) {
  global $config;

  $ext = $config['allowedTypes'][$mimeType];
  $rand = newFileName($ext);

  if (!file_exists($config['saveDir'] . '/' . $ext)) {
    mkdir($config['saveDir'] . '/' . $ext);
  }

  if (move_uploaded_file($tempFileName, "{$config['saveDir']}/$ext/$rand.$ext")) {
    die(json_encode(array(
      'status' => '200',
      'image' => array(
        'extension' => $ext,
        'name'      => $rand
      )
    )));
  }

  header('Status: 500');
  die('Internal Server Error');
}