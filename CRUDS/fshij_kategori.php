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
    $kategoriaID = $_GET['kid'];
    $kategoria = merrKategoriId($kategoriaID);
    $llojiKategorise = $kategoria['llojiKategorise'];
    $fotoKategorise = $kategoria['fotoKategorise'];
    $activeKategorise = $kategoria['activeKategorise'];    
}

if(isset($_POST['fshij'])){
    fshijKategori($_POST['kategoriaID']);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="https://caterease.com/wp-content/uploads/2019/01/Final-Background-For-Login.png" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per fshirjen e kategorise</h1>
        <br>
        <form method="post">
        <input type="hidden" id="kategoriaID" name="kategoriaID" 
                value="<?php if(!empty($kategoriaID)) echo $kategoriaID ?>">
            <div class="inputAndLabels">
                <label for="llojiKategorise">Emri</label> <br>
                <input disabled type="text" id="llojiKategorise" name="llojiKategorise" 
                value="<?php if(!empty($llojiKategorise)) echo $llojiKategorise ?>">
            </div>
            <div class="inputAndLabels">
                <label for="fotoKategorise">Foto</label> <br>
                <input disabled type="file" id="fotoKategorise" name="fotoKategorise">
            </div>
            <div class="inputAndLabels">
                <label for="activeKategorise">Active</label> <br>
                <input disabled type="text" id="activeKategorise" name="activeKategorise"
                value="<?php if(!empty($activeKategorise)) echo $activeKategorise ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <input id='fshij' type='submit'
                    name='fshij' class='shtoModifiko' value='Fshij'> 
                </div>
            </div>
        </form>
    </div>
</section>

<?php 
    include "../inc/footer.php";
?>
</body>
</html>
