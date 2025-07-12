<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobbyn.org</title>
    <link rel="icon" type="image/x-icon" href="graphics/mbbn_icon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_mainsite.css">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobbyn_baza";

$conn = new mysqli($servername, $username, $password, $dbname);
session_start(); 

?>

    <header>
        <div id="baner">

                <a href="index.php">
                    <img id="logo_mbbn" src="graphics/logo_main.jpg" alt="Mobbyn">
                </a>

        </div>


        <div id="fancy_pasek">
            MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN MBBN
        </div>


        <div id="menu">

            <div id="menu-center">

                <a href="index.php" class="menu_links">
                    <div class="menu_button" style="padding: 6px 45px 6px 45px;">
                        HOME
                    </div>
                </a>

                <div class="menu_kreska" ></div>
                
                <a href="subsites/mall.php" class="menu_links">
                    <div class="menu_button" style="padding: 6px 45px 6px 45px;">
                        MĘSKIE  
                    </div>
                </a>

                <div class="menu_kreska"></div>

                <a href="subsites/fall.php" class="menu_links">
                    <div class="menu_button" style="padding: 6px 45px 6px 45px;">
                        DAMSKIE
                    </div>
                </a>

                <div class="menu_kreska"></div>

                <a href="subsites/accesories.php" class="menu_links">
                    <div class="menu_button" style="padding: 6px 45px 6px 45px;">
                        AKCESORIA
                    </div>
                </a>

                <div class="menu_kreska"></div>

                <a href="subsites/contact.php" class="menu_links">
                    <div class="menu_button" style="padding: 6px 45px 6px 45px;">
                        KONTAKT
                    </div>
                </a>

                <div class="menu_kreska"></div>

                <a href="subsites/logpage.php" class="menu_links">
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

                <div class="menu_kreska"></div>

                <a href="subsites/cart.php" class="menu_links">
                    <div class="menu_button" style="padding: 6px 45px 6px 45px;">
                        TWÓJ KOSZYK:
                    </div>
                </a>

            </div>

        </div>
    </header>

 
    <div id="sklep" style="height:fit-content;">

            <div class="flex-col">
                <div class="emb" >
                    <div id="ramka" style="height:309px;background: radial-gradient(circle, rgba(0,0,0,1) 0%, rgba(7,6,1,1) 13%, rgba(249,209,27,1) 100%);  ">
                        <video width="550" height="309" autoplay muted loop >
                            <source src="graphics/dawg.mp4" type="video/mp4">
                            Twoja przeglądarka nie obsługuje elementu wideo.
                        </video>
                    </div>
                </div>



                <div style="width:100%;height:4px;background-color:black;margin:15px 0 15px 0;text-align: center;"></div>

                <div class="bestseller" style=';text-align: center'>
                    <img src="graphics/bestsellers.jpg" alt="Bestsellery" style="height:60px; width:300px;">
                </div>

                <div style="width:100%;height:2px;background-color:black;margin:15px 0 15px 0;"></div>

                <div class="bestseller-flex-row" style="display:flex; flex-direction:row; padding: 0 0 0 4%">

                    <?php 

                    require ('subsites/add_to_cart.php');

                    
                    $sql = "SELECT * FROM products LIMIT 4";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                
                        while($row = $result->fetch_assoc()) {
                            echo "<div style='width:21.5%; height: 450px; background-color:white;border: 1px solid black; margin: 0 1% 0 1%; text-align: center;' >";

                                echo "<img src='graphics/shop/" . $row['img'] . "' alt='" . $row['name'] . "' style='width:100%; height: auto;'>";
                                echo " <div style='width:80%;height:1px;background-color:black;margin:3px 0 3px 10%;'></div>";
                                echo "<h3 style='font-family: arial;text-align: center; width: 100%;'>" . $row['name'] . "</h3>";
                                echo "<p style='margin-bottom: 10px; font-weight: bold; font-family: arial;'>" . $row['price'] . " pln </p>";

                                echo "<a href='subsites/add_to_cart.php' style='text-decoration: none;' onmouseover='this.style.backgroundColor='#FFFF00';' onmouseout='this.style.backgroundColor='#000000';''>";
                                echo "<div style='border-radius: 15px; color: white; background-color: black; text-align: center; width: 95%; height: 30px; font-family: Arial, Helvetica, sans-serif;margin-left: 2.5%;'>";
                                echo "<p style='text-align: center; justify-content: center;font-weight: bold; padding-top: 6.5px;'>Dodaj do koszyka</p>";
                                echo "</div>";
                                echo "</a>";

                            echo "</div>";
                        }
                    } else {
                        echo "Brak produktów.";}
                    ?>


                </div>

                <div style="width:100%;height:4px;background-color:black;margin:15px 0 15px 0; "></div>

                <div class="rec-added" style='text-align: center;'>
                    <img src="graphics/dodane.jpg" alt="Dodane" style="height:60px; width:300px;">
                </div>

                <div style="width:100%;height:2px;background-color:black;margin:15px 0 15px 0;"></div>

                <div class="rec-added-flex-row" style="display:flex; flex-direction:row; padding: 0 0 0 4%;">

                <?php 
                    
                    $sql = "SELECT * FROM products ORDER BY prod_id DESC LIMIT 4";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                
                        while($row = $result->fetch_assoc()) {
                            echo "<div style='width:21.5%; height: 450px; background-color:white;border: 1px solid black; margin: 0 1% 0 1%; text-align: center;' >";
                                echo "<img src='graphics/shop/" . $row['img'] . "' alt='" . $row['name'] . "' style='width:100%; height: auto;'>";
                                echo " <div style='width:80%;height:1px;background-color:black;margin:3px 0 3px 10%;'></div>";
                                echo "<h3 style='font-family: arial;text-align: center; width: 100%;'>" . $row['name'] . "</h3>";
                                echo "<p style='margin-bottom: 10px; font-weight: bold; font-family: arial;'>" . $row['price'] . " pln </p>";

                                echo "<a href='subsites/add_to_cart.php' style='text-decoration: none;' onmouseover='this.style.backgroundColor='#FFFF00';' onmouseout='this.style.backgroundColor='#000000';''>";
                                echo "<div style='border-radius: 15px; color: white; background-color: black; text-align: center; width: 95%; height: 30px; font-family: Arial, Helvetica, sans-serif;margin-left: 2.5%;'>";
                                echo "<p style='text-align: center; justify-content: center;font-weight: bold; padding-top: 6.5px;'>Dodaj do koszyka</p>";
                                echo "</div>";
                                echo "</a>";
                            echo "</div>";
                        }
                    } else {
                        echo "Brak produktów.";}
                    ?>

                </div>

                <div style="width:100%;height:4px;background-color:black;margin:15px 0 15px 0;"></div>

                <div class="newsletter" style="text-align: center">
                    <img src="graphics/newsletter.jpg" alt="Newsletter" style="height:60px; width:300px;">
                </div>

                <div style="width:100%;height:2px;background-color:black;margin:15px 0 15px 0;"></div>

                <div style="height: 227px; width:90%; margin-left:5%;margin-bottom: 120px ;border: 1px solid; background-color: rgb(240,240,240);text-align: center;" >

                    <h2 style="font-family:Arial, Helvetica, sans-serif; ">Zapisz się!</h2>

                    <form method="post" action="">

                        <input type="email" id="nlt_email" name="nlt_email" placeholder="Adres e-mail" required style="width: 500px; height: 20px;" autocomplete='off'>

                        <br>
                        <br>

                        <div style="justify-content: center; font-family: Arial;">
                            <input type="checkbox" id="nlt_new" name="nlt_new" style="width: 20px; height: 12px;" checked>
                            <i>Chcę otrzymywać powiadomienia o nowych produktach</i>
                        </div>



                        <div style="justify-content: center; font-family: arial;">
                            <input type="checkbox" id="nlt_proms" name="nlt_proms" style="width: 20px; height: 12  px;" checked>
                            <i>Chcę otrzymywać powiadomienia o nowych i trwających promocjach</i>
                        </div>
                        <br>

                        <input type="submit" value="Zapisz się" name="register_to_nlt"> <P style="color: red; font-size: larger;">NIE DZIAŁA</P>

                    </form>
 

                </div>



            </div>

        </div>

        <br>
        <br>



        <div id="stopka">
            <br>
            Mobbyn to perpetuum mobile i pracować będzie nawet kiedy umre
            <br>
            <a id="authors_link" href="./subsites/authors.php">Autorzy</a>
            <br>
            <i style="font-size: small;">All rights reserved. Mobbyn 2024</i>
        </div>


    <?php 
        mysqli_close($conn);
    ?>

</body>
