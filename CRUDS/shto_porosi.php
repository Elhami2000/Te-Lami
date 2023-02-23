<head>
    <link rel="stylesheet" href="../css/style-table.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php

include "../inc/crudHeader.php";

if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
}
if(isset($_POST['shtoPorosi'])){
    shtoPorosi(
        $_POST['useriID'],
        $_POST['ushqimetID'],
        $_POST['shoferiID'],
        $_POST['dataEPorosise'],
        $_POST['dateEDergeses'],
        $_POST['kostoja']);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
    <img src="https://caterease.com/wp-content/uploads/2019/01/Final-Background-For-Login.png" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin e Porosive</h1>
        <br>
        <form method="POST">
        <div class="inputAndLabels">
                <label for="useriID">Useri</label> <br>
                <select id="useriID" name="useriID">
                <option value=''>Zgjedh userin</option>
                <?php
                    $userat=merrUserat();
                    while ($useri=mysqli_fetch_assoc($userat)) {
                    $uid=$useri['userID'];
                    $uemri=$useri['emri'];
                    echo "<option value='$uid'>$uemri</option>";
                    }
                ?>
            </select>
        </div>
            <div class="inputAndLabels">
                <label for="ushqimetID">Ushqimi</label> <br>
                <select id="ushqimetID" name="ushqimetID">
                <option value=''>Zgjedh Ushqimin</option>
                <?php
                    $ushqimet=merrUshqimet();
                    while ($ushqimi=mysqli_fetch_assoc($ushqimet)) {
                        $ushid=$ushqimi['ushqimetID'];
                        $ushemri=$ushqimi['emriUshqimit'];
                        echo "<option value='$ushid'>$ushemri</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="shoferiID">Shoferi</label><br>
                <select id="shoferiID" name="shoferiID">
                <option value=''>Zgjedh shoferin</option>
                    <?php
                    $shoferat=merrShoferat();
                    while ($shoferi=mysqli_fetch_assoc($shoferat)) {
                        $shid=$shoferi['shoferiID'];
                        $shemri=$shoferi['emriShoferit'] . " " . $shoferi['mbiemriShoferit'];
                        echo "<option value='$shid'>$shemri</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="dataEPorosise">Data e porosise</label> <br>
                <input type="date" id="dataEPorosise" name="dataEPorosise">
            </div>
            <div class="inputAndLabels">
                <label for="dateEDergeses">Data e dergeses</label> <br>
                <input type="date" id="dateEDergeses" name="dateEDergeses">
            </div>
            <div class="inputAndLabels">
                <label for="kostoja">Kostoja</label> <br>
                <input type="text" id="kostoja" name="kostoja">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                <input id='shtoPorosi' type='submit'
                name='shtoPorosi' class='shtoModifiko' value='Shto Rezervim'>
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include '../inc/footer.php';
?>