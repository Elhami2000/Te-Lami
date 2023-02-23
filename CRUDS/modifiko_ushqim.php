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
    $ushqimetID=$_GET['ushid'];
    $ushqimi=merrUshqimID($ushqimetID);
    $emriUshqimit=$ushqimi['emriUshqimit'];
    $pershkrimi=$ushqimi['pershkrimi'];
    $foto=$ushqimi['foto'];
    $active=$ushqimi['active'];
    $kategoriaID=$ushqimi['kategoriaID'];
}
if(isset($_FILES['foto'])){
    $foto=$_FILES['foto'];
}else{
    //$foto=$_POST['fotoold'];
}
if(isset($_POST['modifikoUshqim'])){
    modifikoUshqimet(
    $_POST['ushqimetID'],
    $_POST['emriUshqimit'],
    $_POST['pershkrimi'],
    $foto,
    $_POST['active'],
    $_POST['kategoria']
    );
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
        <input type="hidden" id="ushqimetID" name="ushqimetID" 
                value="<?php if(!empty($ushqimetID)) echo $ushqimetID ?>">
                <input type="hidden" id="fotoold" name="fotoold" 
                value="<?php if(!empty($foto)) echo $foto ?>">
            <div class="inputAndLabels">
                <label for="emriUshqimit">Emri i ushqimit</label> <br>
                <input type="text" id="emriUshqimit" name="emriUshqimit" 
                value="<?php if(!empty($emriUshqimit)) echo $emriUshqimit ?>">
            </div>
            <div class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br>
                <input type="text" id="pershkrimi" name="pershkrimi"
                value="<?php if(!empty($pershkrimi)) echo $pershkrimi ?>">
            </div>
            <div class="inputAndLabels">
                <label for="kategoria">Kategoria</label> <br>
                <select id="kategoria" name="kategoria">
                    <?php 
                        
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
                <input type="file" id="foto" name="foto">
            </div>
            <img style="max-width:40%" src="../images/<?php if(!empty($foto)) echo $foto;?>">
            <div class="inputAndLabels">
                <label for="active">Active</label> <br>
                <input type="text" id="active" name="active"
                value="<?php if(!empty($active)) echo $active ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                        if(isset($_GET['ushid'])){
                            echo "<input id='modifikoUshqim' type='submit'
                            name='modifikoUshqim' class='shtoModifiko' value='Modifiko Ushqimin'>"; 
                        }
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>

<?php
    include "../inc/footer.php";
?>