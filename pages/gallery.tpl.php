<div class="<?php if (filter_input(INPUT_GET, 'result') !== null) { echo 'error'; } else { echo 'hidden'; } ?>">
    <p>
        <?php
            if (filter_input(INPUT_GET, 'result') !== null)
            {
                $result = filter_input(INPUT_GET, 'result');
                switch ($result)
                {
                    case '1';
                        echo 'A kiválasztott fájl nem képfájl!';
                        break;
                    
                    case '2';
                        echo 'Azonos nevű fájl már létezik a szerveren!';
                        break;
                    
                    case '3';
                        echo 'A kép nem lehet nagyobb, mint 250 KB!';
                        break;

                    case '4';
                        echo 'Csak JPG, JPEG, PNG és GIF formátumok engedélyezettek!';
                        break;

                    case '5';
                        echo 'Feltöltési hiba!';
                        break;
                    
                    default:
                        echo 'Nincs hiba?';
                }
            }
        ?>
    </p>
</div>
<form class="upload white" action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Feltölt" name="submit">
</form>
<div class="flex-container">
    <?php
        $files = scandir('gallery');
        foreach($files as $file)
        {
            if($file == '.' || $file == '..')
                continue;

            echo '  <img src="gallery/' . $file . '">';
            echo "\r\n";
        }
    ?>
</div>