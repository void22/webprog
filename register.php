<?php
require_once 'database.php';

$username = filter_input(INPUT_POST, 'username');
$lastname = filter_input(INPUT_POST, 'lastname');
$firstname = filter_input(INPUT_POST, 'firstname');
$password = md5(filter_input(INPUT_POST, 'password'));
$empty = md5("");

// Result values
// 1 - empty password
// 2 - database connection error
// 3 - username already exists

if (($password === $empty) || ($username ===  "") || ($lastname === "") || $firstname === "")
{
    header("Location: index.php?page=register&result=1");
    exit();
}
else
{
    $db = connectToDatabase();
    if (is_null($db))
    {
        header("Location: index.php?page=register&result=2");
        exit();
    }
    else
    {
        try
        {
            // check for exisintg username
            $stmt = $db->prepare("SELECT 1 FROM users WHERE username=?");
            $stmt->execute([$username]);
            $userExist = $stmt->fetchColumn();
            
            if ($userExist)
            {
                header("Location: index.php?page=register&result=3");
                exit();
            }
            
            // register user
            $stmt = $db->prepare("INSERT INTO users VALUES(0,?,?,?,?)");
            $stmt->execute([$username, $lastname, $firstname, $password]);

            header("Location: index.php?page=login&registered");
            exit();
        }
        catch (PDOException $ex)
        {
            header("Location: index.php?page=register&result=2");
            exit();
        }
    }
}

