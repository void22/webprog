<?php
include 'config.inc.php';

$find = current($pages);
$input = filter_input(INPUT_GET, 'page');

if (isset($input))
{
    if (isset($pages[$input]))
    {
        $find = $pages[$input];
    }
    else
    {
        $find = $errorPage;
        header('HTTP/1.0 404 Not Found');
    }
}

include 'home.tpl.php';