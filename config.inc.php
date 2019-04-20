<?php
session_start();

// database
$dbHostname = "localhost";
$dbPort = 3306;
$dbDefault = "judo";
$dbUsername = "root";
$dbPassword = "";

$pages = array(
    '/' => array('file' => 'news', 'text' => 'Hírek', 'type' => 'menu'),
    'history' => array('file' => 'history', 'text' => 'A klub története', 'type' => 'menu'),
    'judo' => array('file' => 'judo', 'text' => 'Judo története', 'type' => 'menu'),
    'contact' => array('file' => 'contact', 'text' => 'Kapcsolat', 'type' => 'menu'),
    'login' => array('file' => 'login', 'text' => 'Bejelentkezés', 'type' => 'menu'),
    'register' => array('file' => 'register', 'text' => 'Regisztráció', 'type' => 'link'),
    'logout' => array('file' => 'logout', 'text' => 'Kijelentkezés', 'type' => 'link'),
    'messages' => array('file' => 'messages', 'text' => 'Üzenetek', 'type' => 'link'),
    'gallery' => array('file' => 'gallery', 'text' => 'Galéria', 'type' => 'link')
);

if (isset($_SESSION['user_id']))
{
    $pages['login']['file'] = 'logout';
    $pages['login']['text'] = 'Kijelentkezés';
}

$errorPage = array ('file' => '404', 'text' => 'A keresett oldal nem található!');