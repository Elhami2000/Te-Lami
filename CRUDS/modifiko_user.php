<head>
    <link rel="stylesheet" href="../css/style-table.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php

include "../inc/crudHeader.php";
if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
}
if($_GET['uid']){
    $useriID=$_GET['uid'];
    $useri=merrUserID($useriID);
    $emri=$useri['emri'];
    $mbiemri=$useri['mbiemri'];
    $email=$useri['email'];
    $passwordi=$useri['passwordi'];
    $phone=$useri['phone'];
    $role=$useri['role'];
    $adresa=$useri['adresa'];
}

if(isset($_POST['modifikoperdorues'])){
    modifikoUser(
    $_POST['userID'],
    $_POST['emri'],
    $_POST['mbiemri'],
    $_POST['email'],
    $_POST['passwordi'],
    $_POST['phone'],
    $_POST['role'],
    $_POST['adresa']);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
    <img src="https://caterease.com/wp-content/uploads/2019/01/Final-Background-For-Login.png" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per modifikimin e userave</h1>
        <br>
        <form method="post">
        <input type="hidden" id="userID" name="userID" 
                value="<?php if(!empty($userID)) echo $userID ?>">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri" 
                value="<?php if(!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="mbiemri">Mbiemri</label> <br>
                <input type="text" id="mbiemri" name="mbiemri"
                value="<?php if(!empty($mbiemri)) echo $mbiemri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="email">Email</label> <br>
                <input type="text" id="email" name="email"
                value="<?php if(!empty($email)) echo $email ?>">
            </div>
            <div class="inputAndLabels">
                <label for="passwordi">Password</label> <br>
                <input type="text" id="passwordi" name="passwordi"
                value="<?php if(!empty($passwordi)) echo $passwordi ?>">
            </div>
            <div class="inputAndLabels">
                <label for="phone">Phone</label> <br>
                <input type="text" id="phone" name="phone"
                value="<?php if(!empty($phone)) echo $phone ?>">
            </div>
            <div class="inputAndLabels">
                <label for="role">Role</label> <br>
                <input type="text" id="role" name="role"
                value="<?php if(!empty($role)) echo $role ?>">
            </div>
            <div class="inputAndLabels">
                <label for="adresa">Adresa</label> <br>
                <input type="text" id="adresa" name="adresa"
                value="<?php if(!empty($adresa)) echo $adresa ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                <input id='modifikoperdorues' type='submit'
                name='modifikoperdorues' class='shtoModifiko' value='Modifiko Perdorues'>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
    include "../inc/footer.php";
?>
