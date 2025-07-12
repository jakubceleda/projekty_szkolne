<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobbyn.org</title>
    <link rel="icon" type="image/x-icon" href="../graphics/mbbn_icon.ico">
    <link rel="stylesheet" href="../style.css">
</head>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobbyn_baza";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


?>

<body>

<?php 
                        session_start(); 

                        if(isset($_POST['login'])) {

                            $query = $conn->prepare('SELECT user, passwd FROM users WHERE user = ? AND passwd = ?');
                            $query->bind_param("ss", $_POST['username'], $_POST['password']); 
                            
                            $query->execute(); 
                            $result = $query->get_result(); 
                            
                            if($result->num_rows == 1) {
                                $_SESSION['login'] = 'Zalogowano';
                                $_SESSION['username'] = $_POST['username']; 
                            } else {
                                $_SESSION['login'] = 'Błędny login lub hasło!';
                            }
                            
                            unset($_POST['login']);
                        }
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


        <div id="sklep" style="display: flex; flex-direction: row; height: auto; margin-top: 3%;">

                <div id="log" style="flex:auto; width: 45%; margin: 10px 1% 10px 4%; border: 2px black solid; padding: 9px 9px 9px 18px; border-radius: 3%; font-family: arial;">

                    <h2>Logowanie</h2>
                    <form method="post" action="">
                        <input type="text" id="username" name="username" placeholder="Nazwa użytkownika" required style="width: 300px; height: 20px;">
                        <br>
                        <br>
                        <input type="password" id="password" name="password" placeholder="Hasło" required style="width: 300px; height: 20px;">
                        <br>
                        <br>
                        <input type="submit" value="Zaloguj" name="login">

                    </form>


                    <br>

                    <?php
                    if (isset($_SESSION['login']) && $_SESSION['login'] == 'Zalogowano') {
                        echo '<div id="user-login-status">Zalogowano jako: ' . htmlspecialchars($_SESSION['username']) . '</div>' . '<br>' . '<a href="../subsites/logout.php" 
                        style="
                        text-decoration: none;
                        font-family: Arial, Helvetica, sans-serif;
                        " >Wyloguj</a>';
                    }

                    ?>
                </div>

                <div id="reg" style="flex:auto; width: 45%; margin: 10px 4% 10px 1%; border: 2px black solid; padding: 9px 9px 9px 18px; border-radius: 3%; font-family: arial;">

                    <h2>Rejestracja</h2>
                    <form method="post" action="">
                        <input type="text" id="reg_username" name="reg_username" placeholder="Nazwa użytkownika" required style="width: 300px; height: 20px;">
                        <br>
                        <br>
                        <input type="email" id="reg_email" name="reg_email" placeholder="Adres e-mail" required style="width: 300px; height: 20px;">
                        <br>
                        <br>
                        <input type="password" id="reg_password" name="reg_password" placeholder="Hasło"required style="width: 300px; height: 20px;">
                        <br>
                        <br>
                        <input type="submit" value="Zarejestruj" name="register">
                    </form>

                    <?php
                    if (isset($_POST['register'])) {
                        $regUsername = $_POST['reg_username'];
                        $regEmail = $_POST['reg_email'];
                        $regPassword = $_POST['reg_password'];

                        if (empty($regUsername) || empty($regEmail) || empty($regPassword)) {
                            echo "<p>Proszę wypełnić wszystkie pola.</p>";
                        } else {

                            $insertSql = "INSERT INTO users (user, mail, passwd) VALUES ('$regUsername', '$regEmail', '$regPassword')";
                            
                            if ($conn->query($insertSql) === TRUE) {
                                echo "<p>Rejestracja udana!</p>";
                            } else {
                                echo "<p>Błąd podczas rejestracji: " . $conn->error . "</p>";
                            }
                        }
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


