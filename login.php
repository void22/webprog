<?php
require_once 'database.php';

session_start();
$username = filter_input(INPUT_POST, 'username');
$password = md5(filter_input(INPUT_POST, 'password'));
$empty = md5("");

// Result values
// 1 - empty password
// 2 - database connection error
// 3 - invalid username or password

if (($password === $empty) || ($username ===  ""))
{
    header("Location: index.php?page=login&result=1");
    exit();
}
else
{
    $db = connectToDatabase();
    if (is_null($db))
    {
        header("Location: index.php?page=login&result=2");
        exit();
    }
    else
    {
        try
        {
            // check for exisintg username
            $stmt = $db->prepare("SELECT password FROM users WHERE username=?");
            $stmt->execute([$username]);
            $pwd = $stmt->fetchColumn();
            
            if ($pwd === $password)
            {
                // fetch more user data to session
                $stmt = $db->prepare("SELECT id, lastname, firstname FROM users WHERE username=?");
                $stmt->execute([$username]);
                $user = $stmt->fetch();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_lastname'] = $user['lastname'];
                $_SESSION['user_firstname'] = $user['firstname'];
                $_SESSION['user_username'] = $username;
                
                header("Location: index.php");
                exit();
            }

            header("Location: index.php?page=login&result=3");
            exit();
        }
        catch (PDOException $ex)
        {
            //echo $ex->getMessage();
            header("Location: index.php?page=login&result=2");
            exit();
        }
    }
}