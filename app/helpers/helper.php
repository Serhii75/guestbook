<?php

function configItem($key)
{
	require_once ROOT . '/app/config/config.php';
	return isset($config[$key]) ? $config[$key] : null;
}

function baseUrl()
{
	return configItem('base_url');
}

function redirect($url)
{
	header('Location: ' . $url);
	exit;
}

function clean($str)
{
	return htmlspecialchars(strip_tags(stripslashes(trim($str))));
}

function isAuthorized()
{
    if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
        return false;
    }
    $user = $_SESSION['user'];
    if (!isset($_COOKIE['authHash']) || $user['authHash'] !== $_COOKIE['authHash']) {
        return false;
    }
    return true;
}