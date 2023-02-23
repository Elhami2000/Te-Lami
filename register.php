<?php
include "inc/header.php";
if(isset($_POST['register'])){
    shtoUser(
        $_POST['emri'],
        $_POST['mbiemri'],
        $_POST['email'],
        $_POST['passwordi'],
        $_POST['phone'],
        $_POST['adresa']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login-styles.css">
</head>

<body>
    <header class="welcomeHeading">
        <h1 class="headingH1">Welcome! Register here!</h1>
    </header>
    <main>
        <form id="login_form" class="form_class" method="post">
            <div class="form_div">
            <label>Emri:</label>
                <input class="field_class" name="emri" type="text" placeholder="Your name" autofocus>
                <label>Mbiemri:</label>
                <input class="field_class" name="mbiemri" type="text" placeholder="Your lastname" autofocus>
                <label>Email:</label>
                <input class="field_class" name="email" type="text" placeholder="Your email" autofocus>
                <label>Password:</label>
                <input id="pass" class="field_class" name="passwordi" type="password" placeholder="Your password">
                <label>Phone:</label>
                <input class="field_class" name="phone" type="text" placeholder="Your phone">
                <label>Adresa:</label>
                <input class="field_class" name="adresa" type="text" placeholder="Your address">
                
                <button type="submit" name="register" class="submit_class" form="login_form" placeholder="Log in">Register!</button>
            </div>
            <div class="info_div">
                <p>Already registered? <a href="login.php">Log in here!</a></p>
            </div>
        </form>
    </main>
</body>

<?php
include 'inc/footer.php';
?>
