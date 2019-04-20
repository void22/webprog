<div class="col xs12 m5 l4 xl3">
    <div class="<?php if (filter_input(INPUT_GET, 'result') !== null) { echo 'error'; } else { echo 'hidden'; } ?>">
        <p>
            <?php
                if (filter_input(INPUT_GET, 'result') !== null)
                {
                    $result = filter_input(INPUT_GET, 'result');
                    switch ($result)
                    {
                        case '1';
                            echo 'Minden mező kitöltése kötelező!';
                            break;
                        
                        case '2';
                            echo 'Adatbázis kapcsolati hiba!';
                            break;
                        
                        case '3';
                            echo 'A felhasználónév már foglalt!';
                            break;
                        
                        default:
                            echo 'Nincs hiba?';
                    }
                }
            ?>
        </p>
    </div>
    <form class="register" action="register.php" method="post">
        <label class="white" for="uname">Felhasználónév</label>
        <input type="text" id="uname" name="username" required>
        <label class="white" for="lname">Vezetéknév</label>
        <input type="text" id="lname" name="lastname" required><br>
        <label class="white" for="fname">Keresztnév</label>
        <input type="text" id="fname" name="firstname" required>
        <label class="white" for="pwd">Jelszó</label>
        <input type="password" id="pwd" name="password" required>
        <input type="submit">
    </form>
</div>