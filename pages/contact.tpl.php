            <div class="col xs12 m5 l4 xl3">
                <div class="container white">
                    <p><strong>KÖZGÉP-CVSE Judo Szakosztály</strong></p>
                    <p>2700 Cegléd, Malomtó szél 35</p>
                    <p>Telefon/fax: 06/53-500-724</p>
                    <p>e-mail: cegledivse@gmail.com</p>
                </div>
            </div>
            <div class="col xs12 m7 l8 xl9">
                <div class="container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d678.3013135270975!2d19.78921752921674!3d47.18498311015737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474170e23f3a675b%3A0x1901c6405b34bc12!2sCegl%C3%A9di+Judo+K%C3%B6zpont!5e0!3m2!1shu!2shu!4v1553359887102" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col xs12">
                <div class="col xs12">
                    <br><br>
                    <p class="white left-margin">Üzenet a KÖZGÉP-CVSE Judo Szakosztálynak:</p>
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

                                        default:
                                            echo 'Nincs hiba?';
                                    }
                                }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="col xs12">
                    <form action="sendmessage.php" method="POST">
                        <div class="row">
                            <div class="col xs12 m6 l4 xl3">
                                <div class="container contact">
                                    <label class="white" for="sender">Név</label>
                                    <input type="text" id="sender" name="sender" required><br>
                                    <label class="white" for="email">e-mail cím</label>
                                    <input type="text" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="col xs12 m6 l8 xl9">
                                <div class="container">
                                    <br>
                                    <textarea id="message" name="message" placeholder="Ide írhatja az üzenetet..." required></textarea>
                                    <br>
                                    <input type="submit" value="Küldés">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
