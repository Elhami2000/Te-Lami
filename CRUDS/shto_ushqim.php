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
    shtoUshqim(//SORTIMI SI NE FUNCTIONS MATTERS!
        $_POST['emriUshqimit'],
        $_POST['kategoria'], 
        $_POST['pershkrimi'], 
        $_FILES['foto'], 
        $_POST['active']);
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
                <label for="emriUshqimit">Emri</label> <br>
                <input type="text" id="emriUshqimit" name="emriUshqimit">
            </fieldset>
            <fieldset class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br>
                <input type="text" id="pershkrimi" name="pershkrimi">
            </fieldset>
            <fieldset class="inputAndLabels">
                <label for="foto">Foto</label> <br>
                <input type="file" id="foto" name="foto">
            </fieldset>
            <fieldset class="inputAndLabels">
                <label for="active">Active</label> <br>
                <input type="text" id="active" name="active">
            </fieldset>
            <fieldset class="inputAndLabels">
                <label for="kategoria">Kategoria</label> <br>
                <select id="kategoria" name="kategoria">
                    <option value="">Zgjedh kategorine </option>
                    <?php
                        $kategorit=merrkategorite();
                        while ($kategoria=mysqli_fetch_assoc($kategorit)) {
                            $kategoriaid=$kategoria['kategoriaID'];
                            $kategoriemri=$kategoria['llojiKategorise'];
                            echo "<option value='$kategoriaid'>$kategoriemri</option>";
                        }
                    ?>
                </select>
            </fieldset>
            
            <fieldset class="inputAndLabels">
                <div class="butonat">
                    <input type="submit" id="shto" name="shto" class="shtoModifiko" value="Shto Ushqim">
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
include "../inc/footer.php";

?>