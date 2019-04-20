<?php
require_once 'database.php';

$sender = filter_input(INPUT_POST, 'sender');
$email = filter_input(INPUT_POST, 'email');
$message = filter_input(INPUT_POST, 'message');

// Result values
// 1 - empty fields
// 2 - database connection error

if (($sender === "") || ($email === "") || ($message === ""))
{
    header("Location: index.php?page=contact&result=1");
    exit();
}
else
{
    $db = connectToDatabase();
    if (is_null($db))
    {
        header("Location: index.php?page=contact&result=2");
        exit();
    }
    else
    {
        try
        {
            // add message
            $stmt = $db->prepare("INSERT INTO messages VALUES(0,?,?,?,?)");
            $stmt->execute([date('Y-m-d H:i:s',time()), $sender, $email, $message]);

            header("Location: index.php?page=messages");
            exit();
        }
        catch (PDOException $ex)
        {
            header("Location: index.php?page=contact&result=2");
            exit();
        }
    }
}