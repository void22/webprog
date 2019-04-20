<?php
$target_dir = "gallery/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Result values
// 1 - not an image
// 2 - already exists
// 3 - image is too big
// 4 - not supported format
// 5 - upload error

// image is valid
if (isset($_POST["submit"]))
{
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check === false)
    {
        header("Location: index.php?page=gallery&result=1");
        exit();
    }
}

// Check if file already exists in gallery
if (file_exists($target_file))
{
    header("Location: index.php?page=gallery&result=2");
    exit();
}

// Check file size greater than 250 KB
if ($_FILES["fileToUpload"]["size"] > 256000)
{
    header("Location: index.php?page=gallery&result=3");
    exit();
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
{
    header("Location: index.php?page=gallery&result=4");
    exit();
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
{
    header("Location: index.php?page=gallery");
    exit();
}
else
{
    header("Location: index.php?page=gallery&result=5");
    exit();
}
