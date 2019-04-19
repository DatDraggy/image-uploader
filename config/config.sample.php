<?php
$config = array();
$config['password'] = '';
$config['saveDir'] = __DIR__ . '/../images';
$config['allowedTypes'] = array(
  'image/jpeg' => 'jpg',
  'image/png' => 'png',
  'image/gif' => 'gif',
  'video/webm' => 'webm',
  'video/mp4' => 'mp4'
);