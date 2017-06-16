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
	return htmlspecialchars(strip_tags(trim($str)));
}

function cleanData($data = [])
{
    foreach ($data as $key => $value) {
        $data[$key] = clean($value);
    }

    return $data;
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

function setValue($fieldName, $default)
{
    if ( isset($_POST[$fieldName]) && !empty($_POST[$fieldName]) ) {
        return $_POST[$fieldName];
    }

    if ( isset($default) ) {
        return $default;
    }

    return '';
}