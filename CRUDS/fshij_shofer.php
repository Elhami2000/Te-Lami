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
    $shoferiID = $_GET['shid'];
    $shoferi = merrShoferId($shoferiID);
    $emriShoferit = $shoferi['emriShoferit'];
    $mbiemriShoferit = $shoferi['mbiemriShoferit'];
    $phoneShoferi = $shoferi['phoneShoferi'];    
    $statusi = $shoferi['statusi'];    
}

if(isset($_POST['fshij'])){
    fshijShofer($_POST['shoferiID']);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="https://caterease.com/wp-content/uploads/2019/01/Final-Background-For-Login.png" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per fshirjen e shoferit</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
        <input type="hidden" id="shoferiID" name="shoferiID" 
                value="<?php if(!empty($shoferiID)) echo $shoferiID ?>">
            <div class="inputAndLabels">
                <label for="emriShoferit">Emri i Shoferit</label> <br>
                <input disabled type="text" id="emriShoferit" name="emriShoferit" 
                value="<?php if(!empty($emriShoferit)) echo $emriShoferit ?>">
            </div>
            <div class="inputAndLabels">
                <label for="mbiemriShoferit">Mbiemri shoferit</label> <br>
                <input disabled type="text" id="mbiemriShoferit" name="mbiemriShoferit"
                value="<?php if(!empty($mbiemriShoferit)) echo $mbiemriShoferit ?>">
            </div>
            <div class="inputAndLabels">
                <label for="phoneShoferi">Telefoni i shoferit</label> <br>
                <input disabled type="text" id="phoneShoferi" name="phoneShoferi"
                value="<?php if(!empty($phoneShoferi)) echo $phoneShoferi ?>">  
                <div class="butonat">
                    <input id='fshij' type='submit'
                    name='fshij' class='fshij' value='Fshij'> 
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