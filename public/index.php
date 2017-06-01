<?php

session_start();

define('ROOT', dirname(dirname(__FILE__)));

require_once '../app/init.php';

$app = new App();