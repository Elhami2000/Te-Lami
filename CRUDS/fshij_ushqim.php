<head>
    <link rel="stylesheet" href="../css/style-table.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php
include "../inc/crudHeader.php";
if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
}
if($_GET['ushid']){
    $ushqimetID = $_GET['ushid'];
    $ushqimi = merrUshqimID($ushqimetID);
    $emriUshqimit = $ushqimi['emriUshqimit'];
    $pershkrimi = $ushqimi['pershkrimi'];
    $foto = $ushqimi['foto'];    
    $active = $ushqimi['active'];    
    $kategoriaID = $ushqimi['kategoriaID'];    
}

if(isset($_POST['fshij'])){
    fshijUshqim($_POST['ushqimetID']);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="https://caterease.com/wp-content/uploads/2019/01/Final-Background-For-Login.png" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per fshirjen e ushqimit</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
        <input type="hidden" id="ushqimetID" name="ushqimetID" 
                value="<?php if(!empty($ushqimetID)) echo $ushqimetID ?>">
            <div class="inputAndLabels">
                <label for="emriUshqimit">Emri i ushqimit</label> <br>
                <input disabled type="text" id="emriUshqimit" name="emriUshqimit" 
                value="<?php if(!empty($emriUshqimit)) echo $emriUshqimit ?>">
            </div>
            <div class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br>
                <input disabled type="text" id="pershkrimi" name="pershkrimi"
                value="<?php if(!empty($pershkrimi)) echo $pershkrimi ?>">
            </div>
            <div class="inputAndLabels">
                <label for="kategoria">Kategoria</label> <br>
                <select disabled id="kategoria" name="kategoria">
                    <?php 
                        echo "<option value='$kategoriaid'>$katemri</option>";
                        $kategorite = merrkategorite();
                        while($kategoria = mysqli_fetch_assoc($kategorite)){
                            $id = $kategoria['kategoriaID'];
                            $katemri = $kategoria['llojiKategorise'];
                            if($kategoriaid != $id){
                                echo "<option value='$id'>$katemri</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="foto">Foto</label> <br>
                <input disabled type="file" id="foto" name="foto">
            </div>
            <div class="inputAndLabels">
                <label for="active">Active</label> <br>
                <input disabled type="text" id="active" name="active"
                value="<?php if(!empty($active)) echo $active ?>">
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
