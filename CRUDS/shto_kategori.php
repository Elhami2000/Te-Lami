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
    shtoKategori(
        $_POST['llojiKategorise'], 
        $_FILES['fotoKategorise'], 
        $_POST['activeKategorise']);
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
                <label for="llojiKategorise">Emri</label> <br>
                <input type="text" id="llojiKategorise" name="llojiKategorise">
            </fieldset>
            <fieldset class="inputAndLabels">
                <label for="fotoKategorise">Foto</label> <br>
                <input type="file" id="fotoKategorise" name="fotoKategorise">
            </fieldset>
            <fieldset class="inputAndLabels">
                <label for="activeKategorise">Active</label> <br>
                <input type="text" id="activeKategorise" name="activeKategorise">
            </fieldset>
            <fieldset class="inputAndLabels">
                <div class="butonat">
                    <input type="submit" id="shto" name="shto" class="shtoModifiko" value="Shto Kategori">
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
include "../inc/footer.php";

?>