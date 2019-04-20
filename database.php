<?php
require_once 'config.inc.php';

function connectToDatabase()
{
    global $dbHostname, $dbDefault, $dbUsername, $dbPassword, $dbPort;
    
    $dsn = "mysql:host=$dbHostname;dbname=$dbDefault;port=$dbPort;charset=utf8";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    try
    {
        $db = new PDO($dsn, $dbUsername, $dbPassword, $options);
        return $db;
    }
    catch (PDOException $ex)
    {
        // There will be logging someday
    }
    
    return null;
}