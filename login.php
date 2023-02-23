<?php
include "inc/header.php";
if(isset($_POST['login'])){
    login(
        $_POST['email'],
        $_POST['passwordi']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login-styles.css">
</head>

<body>
    <header class="welcomeHeading">
        <h1 class="headingH1">Welcome to our Restaurant!</h1>
    </header>
    <main>
        <form id="login_form" class="form_class" method="post">
            <div class="form_div">
                <?php
                if(isset($_SESSION['message'])){
                    echo "<label id='message'>". $_SESSION['message'] . "</label>";
                }
                ?>
                <label>Email:</label>
                <input class="field_class" name="email" type="text" placeholder="Your email" autofocus>
                <label>Password:</label>
                <input id="pass" class="field_class" name="passwordi" type="password" placeholder="Your password">
                <button type="submit" name="login" class="submit_class" form="login_form" placeholder="Log in">Log in!</button>
            </div>
            <div class="info_div">
                <p>Not registered yet? <a href="register.php">Register here!</a></p>
            </div>
        </form>
    </main>
</body>

<?php
include 'inc/footer.php';
?>
