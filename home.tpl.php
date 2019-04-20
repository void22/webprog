<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/fontawesome.min.css">
        <link rel="stylesheet" href="css/home.css">
        <?php
            if (isset($find))
            {
                echo '<link rel="stylesheet" href="css/' . $find['file'] . '.css">';
            }
        ?>
        <title>KÖZGÉP-CVSE Judo Szakosztály</title>
    </head>
    <body>
        <header>
            <div id="header-img"><p class="main-title">KÖZGÉP-CVSE Judo Szakosztály<p></div>
        </header>
        <nav class="menu-bar" id="menu">
            <?php foreach($pages as $url => $page){
                if ($page['type'] == 'menu')
                {?>
            <a <?php echo (($page == $find) ? 'class="menu-item active-menu-item"' : 'class="menu-item"') ?> href="<?php echo ($url == '/') ? '.' : ('?page=' . $page['file']) ?>"><?php echo $page['text']; ?></a>
            <?php }} ?>
            <div class="search-container">
                <form action="." method="GET">
                    <input type="text" placeholder="Keresés..." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>
        <div class="row">
            <div class="col xs12 m9 l10">
                <?php include("pages/{$find['file']}.tpl.php"); ?>
            </div>
            <div class="col xs12 m3 l2">
                <div class="container sidebar-panel">
                    <header class="panel">
                        <?php
                            if (isset($_SESSION['user_id']))
                            {
                                echo $_SESSION['user_lastname'] . " " . $_SESSION['user_firstname'] . " (" . $_SESSION['user_username'] . ")";
                            }
                            else
                            {
                                echo '<h3>Nincs bejelentkezve</h3>';
                            }
                        ?>
                    </header>
                    <div class="container" id="login-panel">
                        <?php
                            if (isset($_SESSION['user_id']))
                            {
                                echo '<p><a href="logout.php">Itt jelenkezhet ki</a> az oldalról!</p>';
                            }
                            else
                            {
                                echo '<p><a href="index.php?page=login">Jelentkezzen be</a> az oldal bővebb funkcióinak eléréséhez!</p>';
                            }
                        ?>
                    </div>
                </div>
                <div class="container sidebar-panel">
                    <header class="panel">
                        <h3>Galéria</h3>
                    </header>
                    <div class="container" id="login-panel">
                        <p>Tekintse meg <a href="index.php?page=gallery">galériánkat</a> további képekért!</p>
                    </div>
                </div>
                <div class="container sidebar-panel">
                    <header class="panel">
                        <h3>Üzenetek</h3>
                    </header>
                    <div class="container" id="login-panel">
                        <p>Kattintson <a href="index.php?page=messages">ide</a> a beérkezett üzenetek megtekintéséhez!</p>
                    </div>
                </div>
            </div>
        </div>
        <footer class="col xs12">
            <h4>Ez a weboldal egyetemi projekt munka keretében készült. A KÖZGÉP-CVSE Judo Szakosztály igazi honlapja <a href="https://judocegled.ewk.hu/" target="_blank">itt</a> érhető el.</h4>
        </footer>
        <script src="js/home.js"></script>
    </body>
</html>
