<?php

$prototype = "http" . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "s" : "") . "://";
$server = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
$config['base_url'] = $prototype . $server;

$config['db_host'] = 'localhost';
$config['db_name'] = 'guestbook';
$config['db_username'] = 'root';
$config['db_password'] = '';