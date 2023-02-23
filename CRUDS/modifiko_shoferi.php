<head>
    <link rel="stylesheet" href="../css/style-table.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php

include "../inc/crudHeader.php";
if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
}
if($_GET['shid']){
    $shoferiID=$_GET['shid'];
    $shoferat=merrShoferId($shoferiID);
    $emriShoferit=$shoferat['emriShoferit'];
    $mbiemriShoferit=$shoferat['mbiemriShoferit'];
    $phoneShoferi=$shoferat['phoneShoferi'];
    $statusi=$shoferat['statusi'];
}

if(isset($_POST['modifikoShoferi'])){
    modifikoShofer(
    $_POST['shoferiID'],
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
        <h1>Forma per modifikimin e shoferit</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
        <input type="hidden" id="shoferiID" name="shoferiID" 
                value="<?php if(!empty($shoferiID)) echo $shoferiID ?>">
            <div class="inputAndLabels">
                <label for="emriShoferit">Emri i Shoferit</label> <br>
                <input type="text" id="emriShoferit" name="emriShoferit" 
                value="<?php if(!empty($emriShoferit)) echo $emriShoferit ?>">
            </div>
            <div class="inputAndLabels">
                <label for="mbiemriShoferit">Mbiemri i Shoferit</label> <br>
                <input type="text" id="mbiemriShoferit" name="mbiemriShoferit"
                value="<?php if(!empty($mbiemriShoferit)) echo $mbiemriShoferit ?>">
            </div>
            <div class="inputAndLabels">
                <label for="phoneShoferi">Telefoni i Shoferit</label> <br>
                <input type="text" id="phoneShoferi" name="phoneShoferi"
                value="<?php if(!empty($phoneShoferi)) echo $phoneShoferi ?>">
            </div>
            <div class="inputAndLabels">
                <label for="statusi">Statusi</label> <br>
                <input type="text" id="statusi" name="statusi"
                value="<?php if(!empty($statusi)) echo $statusi ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                        echo "<input id='modifikoShoferi' type='submit'
                        name='modifikoShoferi' class='shtoShofer' value='Modifiko Shoferin'>";   
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>

<?php
    include "../inc/footer.php";
?>