<?php
    include "functions.php";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/66346d787d.js" crossorigin="anonymous"></script>
    </head>
<body>
    <header id="myPage" class="first-header">
        <div class="container">
            <div class="address-content">
                <div class="address-info">
                    <div class="address-location">
                        <i style="font-size: 20px;" class="fa-solid fa-location-dot"></i>
                        <p>Te Grandi, Prishtine, Kosova</p>
                    </div>
                    <div class="address-time">
                        <i style="font-size: 20px;" class="fa-regular fa-clock"></i>
                        <p>Mon - Fri : 09:00 AM - 11:00 PM</p>
                    </div>
                </div>
                <div class="address-contact">
                    <i class="fa-solid fa-phone"></i>
                    <p>+383 45 299 748</p>
                    <div class="socials">
                        <div>
                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        </div>
                        <div>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        </div>
                        <div>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="../index.php">
                        <h2 class="fa-solid fa-utensils"> Te Lami</h2>
                    </a>
                </div>
                <div class="navbar">
                    <ul class="navbar-items">
                        <li class="first-item"><a href="../index.php">Home</a></li>
                        <li><a href="../ushqimet.php">Our Menu</a></li>
                        <li><a href="../kategorite.php">Categories</a></li>
                        <?php
                        if(isset($_SESSION['user'])){
                            echo "<li><a href='../shoferat.php'>Drivers</a></li>";
                            echo "<li><a href='../userat.php'>Users</a></li>";
                            echo "<li><a href='../logout.php'>Logout</a></li>";
                        }else{
                            echo "<li><a href='../login.php'>Login</a></li>";
                        }
                    ?>
                        <li class="last-item">
                            <div class="last-button"><a href="../porosite.php">Make an order<i
                            class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</body>
</html>