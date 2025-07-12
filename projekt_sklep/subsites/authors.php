<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobbyn.org</title>
    <link rel="icon" type="image/x-icon" href="../graphics/mbbn_icon.ico">
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobbyn_baza";
session_start(); 
$conn = new mysqli($servername, $username, $password, $dbname);

?>
    <header>
        <div id="baner">

                <a href="../index.php">
                    <img id="logo_mbbn" src="../graphics/logo_main.jpg" alt="Mobbyn">
                </a>

        </div>


        <div id="fancy_pasek">
            MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBNMBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN
        </div>


        <div id="menu">
            <div id="menu-center">

                <a href="../index.php" class="menu_links">
                    <div class="menu_button" style="padding: 6px 45px 6px 45px;">
                        HOME
                    </div>
                </a>

                <div class="menu_kreska"></div>
                
                <a href="../subsites/mall.php" class="menu_links">
                    <div class="menu_button" style="padding: 6px 45px 6px 45px;">
                        MĘSKIE  
                    </div>
                </a>

                <div class="menu_kreska" ></div>

                <a href="../subsites/fall.php" class="menu_links">
                    <div class="menu_button" style="padding: 6px 45px 6px 45px;">
                        DAMSKIE
                    </div>
                </a>

                <div class="menu_kreska" ></div>

                <a href="../subsites/accesories.php" class="menu_links">
                    <div class="menu_button" style="padding: 6px 45px 6px 45px;">
                        AKCESORIA
                    </div>
                </a>

                <div class="menu_kreska" ></div>

                <a href="../subsites/contact.php" class="menu_links">
                    <div class="menu_button" style="padding: 6px 45px 6px 45px;">
                        KONTAKT
                    </div>
                </a>

                <div class="menu_kreska"></div>

                <a href="../subsites/logpage.php" class="menu_links">
                    <div class="menu_button" style="padding: 6px 45px 6px 45px;">
                        <?php 
                        if(isset($_SESSION['login']) && $_SESSION['login'] == 'Zalogowano') {
                            echo  htmlspecialchars($_SESSION['username']);
                        } else {
                            echo 'LOGOWANIE';
                        }
                        ?>
                    </div>
                </a>

                <div class="menu_kreska" ></div>

                <a href="../subsites/cart.php" class="menu_links">
                    <div class="menu_button" style="padding: 6px 45px 6px 45px;">
                        TWÓJ KOSZYK:
                    </div>
                </a>
            </div>
        </div>
    </header>
        <div id="sklep" >

            <div class="autorzy" style='font-family: Arial, Helvetica, sans-serif; font-size: larger; font-weight: bold; width:100%; text-align:center; margin: 80px 0 0 0;'>
                        <p>Projekt strony: Jakub Celeda</p>
                        <p>Wykonanie strony: Jakub Celeda</p>
                        <p>Grafika: Jakub Celeda</p>


            </div>
        </div>

        <div id="stopka">
            <br>
            Mobbyn to perpetuum mobile i pracować będzie nawet kiedy umre
            <br>
            <a id="authors_link" href="../subsites/authors.php">Autorzy</a>
            <br>
            <i style="font-size: small;">All rights reserved. Mobbyn 2024</i>
        </div>

    <?php 
        mysqli_close($conn);
    ?>
</body>
