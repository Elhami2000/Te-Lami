<head>
    <link rel="stylesheet" href="../css/style-table.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php

include "../inc/crudHeader.php";
if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
}
if($_GET['kid']){
    $kategoriaID=$_GET['kid'];
    $kategoria=merrKategoriId($kategoriaID);
    $llojiKategorise=$kategoria['llojiKategorise'];
    $fotoKategorise=$kategoria['fotoKategorise'];
    $activeKategorise=$kategoria['activeKategorise'];
}

if(isset($_POST['modifikoKategori'])){
    modifikoKategori(
    $_POST['kategoriaID'],
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
        <h1>Forma per modifikimin e automjetit</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
        <input type="hidden" id="kategoriaID" name="kategoriaID" 
                value="<?php if(!empty($kategoriaID)) echo $kategoriaID ?>">
            <div class="inputAndLabels">
                <label for="llojiKategorise">Emri</label> <br>
                <input type="text" id="llojiKategorise" name="llojiKategorise" 
                value="<?php if(!empty($llojiKategorise)) echo $llojiKategorise ?>">
            </div>
            <div class="inputAndLabels">
                <label for="fotoKategorise">Foto</label> <br>
                <input type="file" id="fotoKategorise" name="fotoKategorise">
            </div>
            <div class="inputAndLabels">
                <label for="activeKategorise">Active</label> <br>
                <input type="text" id="activeKategorise" name="activeKategorise"
                value="<?php if(!empty($activeKategorise)) echo $activeKategorise ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                            echo "<input id='modifikoKategori' type='submit'
                            name='modifikoKategori' class='shtoModifiko' value='Modifiko Ushqimin'>"; 
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>

<?php 
    include "../inc/footer.php";
?>