<div class="col xs12 m5 l4 xl3">
    <div class="<?php if (filter_input(INPUT_GET, 'registered') !== null) { echo 'success'; } else { echo 'hidden'; } ?>">
        <p>Sikeres regisztráció!</p>
    </div>
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
                            echo 'Érvénytelen felhasználónév vagy jelszó!';
                            break;
                        
                        default:
                            echo 'Nincs hiba?';
                    }
                }
            ?>
        </p>
    </div>
    <form class="login" action="login.php" method="post">
        <label class="white" for="uname">Felhasználónév</label>
        <input type="text" id="uname" name="username" required>
        <label class="white" for="pwd">Jelszó</label>
        <input type="password" id="pwd" name="password" required>
        <input type="submit">
    </form>
    <a class="left-margin" href="index.php?page=register">Regisztráció</a>
</div>