<head>
    <link rel="stylesheet" href="../css/style-table.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php
include "../inc/crudHeader.php";
if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
}
if(isset($_GET['pid'])){
    $porosiaID=$_GET['pid'];
    $porosia=merrPorositID($porosiaID);
    $shoferiID=$porosia['shoferiID'];
    $ushqimetID=$porosia['ushqimetID'];
    $userID=$porosia['userID'];
    $dataEPorosise=date("Y-m-d", strtotime($porosia['dataEPorosise']));
    $dateEDergeses=date("Y-m-d", strtotime($porosia['dateEDergeses']));
}
if(isset($_POST['fshij'])){
    fshijPorosi($_POST['porosiaID']);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="https://caterease.com/wp-content/uploads/2019/01/Final-Background-For-Login.png" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per fshirjen e porosis</h1>
        <br>
        <form method="POST">
            <div class="inputAndLabels">
                <input type="hidden" name="porosiaID" value="<?php if(!empty($porosiaID)) echo $porosiaID ?>"/>
                <label for="shoferiID">Shoferi</label> <br>

                <select disabled id="shoferiID" name="shoferiID">
                <option value=''>Zgjedh Shoferin</option>
                <?php
                    //echo $_GET['rid'];
                    $shoferat=merrShoferat();
                    while($shoferi = mysqli_fetch_assoc($shoferat)){
                        $shid=$shoferi['shoferiID'];
                        $shemri=$shoferi['emriShoferit'];
                        if(isset($_GET['shid'])){
                            if($shoferiID!=$shid){
                                echo "<option value='$shid'>$shemri</option>";
                            }
                        }else{
                            echo "<option value='$shid'>$shemri</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="ushqimetID">Ushqimet</label> <br>
                <select disabled id="ushqimetID" name="ushqimetID">
                <option value=''>Zgjedh Ushqimin</option>
                    <?php
                    //echo $_GET['rid'];
                    $ushqimet=merrUshqimet();
                    while($ushqimi = mysqli_fetch_assoc($ushqimet)){
                        $ushid=$ushqimi['ushqimetID'];
                        $ushemri=$ushqimi['emriUshqimit'];
                        if(isset($_GET['pid'])){
                            if($ushqimetID!=$ushid){
                                echo "<option value='$ushid'>$ushemri</option>";
                            }
                        }else{
                            echo "<option value='$ushid'>$ushemri</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="userID">Useri</label> <br>
                <select disabled id="userID" name="userID">
                <option value=''>Zgjedh Userin</option>
                    <?php
                    //echo $_GET['rid'];
                    $userat=merrUserat();
                    while($useri = mysqli_fetch_assoc($userat)){
                        $uid=$useri['userID'];
                        $uemri=$useri['emri'];
                        if(isset($_GET['uid'])){
                            if($userID!=$uid){
                                echo "<option value='$uid'>$uemri</option>";
                            }
                        }else{
                            echo "<option value='$uid'>$uemri</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="dataEPorosise">Data e porosise</label> <br>
                <input disabled type="date" id="dataEPorosise" name="dataEPorosise"
                value="<?php if(!empty($dataEPorosise)) echo $dataEPorosise ?>">
            </div>
            <div class="inputAndLabels">
                <label for="dateEDergeses">Data e dergeses</label> <br>
                <input disabled type="date" id="dateEDergeses" name="dateEDergeses"
                value="<?php if(!empty($dateEDergeses)) echo $dateEDergeses ?>">
            </div>
            <div class="inputAndLabels">
                <label for="kostoja">Kostoja</label> <br>
                <input disabled type="text" id="kostoja" name="kostoja"
                value="<?php if(!empty($kostoja)) echo $kostoja ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                <input id='fshij' type='submit'
                name='fshij' class='fshij' value='Fshij Porosi'>
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