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
    <div id="sklep" style="height:fit-content;">

    <div style="width:100%;height:4px;background-color:black;margin:15px 0 15px 0; "></div>

    <div class="rec-added" style='text-align: center;'>
        <img src="../graphics/4f.png" alt="Dodane" style="height:60px; width:150px;">
    </div>

    <div style="width:100%;height:2px;background-color:black;margin:15px 0 15px 0;"></div>

            
    <div class="flex-row" style="display:flex; flex-wrap:wrap; margin-bottom: 120px; padding: 0 0 0 4%">
        <?php 
            $sql = "SELECT * FROM products WHERE prod_type LIKE 'f%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div style='width:21.5%; height: 420px; background-color:white;border: 1px solid black; margin: 25px 1% 5px 1%; text-align: center;'>";
                    echo "<img src='../graphics/shop/" . $row['img'] . "' alt='" . $row['name'] . "' style='width:100%; height: auto;'>";
                    echo "<div style='width:80%;height:1px;background-color:black;margin:3px 0 3px 10%;'></div>";
                    echo "<h3 style='font-family: arial;text-align: center; width: 100%;'>" . $row['name'] . "</h3>";
                    echo "<p style='margin-bottom: 10px; font-weight: bold; font-family: arial;'>" . $row['price'] . " pln </p>";
                    echo "</div>";
                }
            } else {
                echo "Brak produktów.";
            }
        ?>
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
