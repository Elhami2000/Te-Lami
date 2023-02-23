<head>
    <link rel="stylesheet" href="../css/style-table.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php

include "../inc/crudHeader.php";
if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
}
if (isset($_POST['shto'])) {
    shtoShofer(
    $_POST['emriShoferit'], 
    $_POST['mbiemriShoferit'], 
    $_POST['phoneShoferi'],
    $_POST['statusi']);

}
?>

<section class="section-shto-modifiko container">
    <div class="image">
    <img src="https://caterease.com/wp-content/uploads/2019/01/Final-Background-For-Login.png" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin e Ushqimit</h1>
        <br>
        <form id="ushqimi" method="post" enctype="multipart/form-data">
            <fieldset class="inputAndLabels">
                <label for="emriShoferit">Emri i Shoferit</label> <br>
                <input type="text" id="emriShoferit" name="emriShoferit">
            </fieldset>
            <fieldset class="inputAndLabels">
                <label for="mbiemriShoferit">Mbiemri i Shoferit</label> <br>
                <input type="text" id="mbiemriShoferit" name="mbiemriShoferit">
            </fieldset>
            <fieldset class="inputAndLabels">
                <label for="phoneShoferi">Telefoni i Shoferit</label> <br>
                <input type="text" id="phoneShoferi" name="phoneShoferi">
            </fieldset>
            <fieldset class="inputAndLabels">
                <label for="statusi">Statusi</label> <br>
                <input type="text" id="statusi" name="statusi">
            </fieldset>
            <fieldset class="inputAndLabels">
                <div class="butonat">
                    <input type="submit" id="shto" name="shto" class="shtoModifiko" value="Shto Shofer">
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
include "../inc/footer.php";

?>