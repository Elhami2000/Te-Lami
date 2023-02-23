<?php
session_start();
$dbconn;
dbConnection();
function dbConnection()
{
    global $dbconn;
    $dbconn = mysqli_connect("localhost", 'root', '', 'rms');
    if (!$dbconn) {
        die("Deshtoi lidhja me DB" . mysqli_error($dbconn));
    }
}
function login($email, $passwordi)
{
    global $dbconn;
    $sql = "SELECT userID, emri, mbiemri, role FROM userat ";
    $sql .= " WHERE email='$email' AND passwordi='$passwordi'";
    $res = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($res) == 1) {
        $userData = mysqli_fetch_assoc($res);
        $user = array();
        $user['userID'] = $userData['userID'];
        $user['emrimbiemri'] = $userData['emri'] . " " . $userData['mbiemri'];
        $user['role'] = $userData['role'];
        $_SESSION['user'] = $user;
    
        header("Location: index.php");
    } else {
        $_SESSION['message'] = "Nuk ka usera me keto te dhena.";
    }
}

function merrUserat(){
    global $dbconn;
    $sql = "SELECT userID, emri, mbiemri, email, phone, fotoUseri, adresa FROM userat";
    return mysqli_query($dbconn, $sql);
}

function merrUserID($userID)
{
    global $dbconn;
    $sql = "SELECT userID, emri, mbiemri, email, phone,role,passwordi, fotoUseri, adresa FROM userat";
    $sql .= " WHERE userID=$userID";
    $res = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($res);
}

function shtoUser($emri, $mbiemri, $email, $passwordi, $phone,$adresa){
    global $dbconn;

    $sql = "INSERT INTO userat(emri, mbiemri, email, passwordi, phone, adresa) VALUES ";
    $sql .= "('$emri', '$mbiemri', '$email', '$passwordi', '$phone', '$adresa')";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Perdoruesi u shtua me sukses";
        header("Location: login.php");
    } else {
        die("Deshtoi shtimi i perdoruesit" . mysqli_error($dbconn));
    }
}

function modifikoUser($userID, $emri, 
$mbiemri, $email, $passwordi, $phone, $adresa, $role)
{
    global $dbconn;
    $sql = "UPDATE userat SET emri='$emri', mbiemri='$mbiemri', email='$email' ,";
    $sql .= "passwordi='$passwordi', phone='$phone', adresa='$adresa'";
    $sql .= ", role='$role' WHERE userID=$userID ";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Perdoruesi u modifikua me sukses";
        header("Location: ../userat.php");
    } else {
        die("Deshtoi modifikimi i perdoruesit" . mysqli_error($dbconn));
    }
}

function fshijUser($userID){
    global $dbconn;
    $sql = "DELETE FROM userat WHERE userID = $userID";
    $res = mysqli_query($dbconn, $sql);
    if($res){
        $_SESSION['message']="Perdoruesi u fshi me sukses";
        header("Location: userat.php");
    }else{
        die("Deshtoi fshirja e perdoruesit" . mysqli_error($dbconn));
    }
}
/* */

function merrUshqimet(){
    
    global $dbconn;
    $sql = "SELECT u.ushqimetID, u.emriUshqimit, u.pershkrimi, u.foto, u.active, k.kategoriaID
    FROM ushqimet u INNER JOIN kategorite k ON u.kategoriaID=k.kategoriaID";
    return mysqli_query($dbconn, $sql);
}

function merrUshqimID($ushqimetID){
    global $dbconn;
    $sql="SELECT u.ushqimetID,u.emriUshqimit, u.pershkrimi, u.foto, u.active, k.kategoriaID
        FROM ushqimet u INNER JOIN kategorite k on u.kategoriaID=k.kategoriaID 
        WHERE u.ushqimetID=$ushqimetID";
    $res = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($res);
}

function shtoUshqim($emriUshqimit, $kategoriaID, $pershkrimi, $foto, $active)
{
    global $dbconn;
    $target_path = $_SERVER['DOCUMENT_ROOT'] . "/RestaurantWebsite/images/";
    if(is_array($foto)){
        $filename = $foto['name'];    
    }else{
        $filename = $foto['name'];
    }


    if (move_uploaded_file($foto['tmp_name'], $target_path . $filename)) {
        $sql = "INSERT INTO ushqimet (emriUshqimit, pershkrimi, foto, active, kategoriaID) VALUES";
        $sql .= " ('$emriUshqimit','$pershkrimi','$filename', '$active','$kategoriaID')";
        $res = mysqli_query($dbconn, $sql);
        if ($res) {
            $_SESSION['message'] = "Ushqimi u shtua me sukses";
            header("Location: ../ushqimet.php");
        } else {
            die("Deshtoi shtimi i ushqimit" . mysqli_error($dbconn));
        } 
        }else{
            echo "Deshtoi ngarkimi i fotos!";
    }
}

function modifikoUshqimet($ushqimetID,$emriUshqimit,$pershkrimi,$foto,$active,$kategoriaID){
    global $dbconn;
    // global $file;
    $target_path = $_SERVER['DOCUMENT_ROOT'] . "/RestaurantWebsite/images/";
    $filename = $foto['name'];

    if (move_uploaded_file($foto['tmp_name'], $target_path . $filename)) {
        $sql="UPDATE ushqimet SET  emriUshqimit='$emriUshqimit', pershkrimi='$pershkrimi', foto='$filename', active='$active',kategoriaID='$kategoriaID' WHERE ushqimetID=$ushqimetID";
        $res = mysqli_query($dbconn,$sql);
        if($res){
            $_SESSION['message'] = "Ushqimi u modifikua me sukses";
            header("Location: ../ushqimet.php");
        }else{
            die("Deshtoi modifikimi i ushqimit" . mysqli_error($dbconn));
        }
    }else{
        echo "Deshtoi ngarkimi i fotos!";
    }
}

function fshijUshqim($ushqimetID){
    global $dbconn;
    $sql = "DELETE FROM ushqimet WHERE ushqimetID = $ushqimetID";
    $res= mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']= "Ushqimi u fshi me sukses";
        header("Location: ../ushqimet.php");
    }else{
        die("Deshtoi fshirja e ushqimit" . mysqli_error($dbconn));
    }
}

function merrPorosit()
{

    global $dbconn;
    $sql="SELECT p.porosiaID, CONCAT(u.emri,' ',u.mbiemri) as emrimbiemriUser, ush.emriUshqimit,CONCAT(sh.emriShoferit,' ',sh.mbiemriShoferit) as emrimbiemri,p.dataEPorosise,p.dateEDergeses,p.kostoja
    FROM userat u INNER JOIN porosite p ON u.userID=p.userID INNER JOIN ushqimet ush ON p.ushqimetID=ush.ushqimetID
    INNER JOIN shoferat sh ON p.shoferiID=sh.shoferiID";
    return mysqli_query($dbconn, $sql);
}
function merrPorositID($porosiaID)
{
    global $dbconn;
    $sql = "SELECT p.porosiaID, u.userID, ush.ushqimetID, ush.emriUshqimit,sh.shoferiID, CONCAT(sh.emriShoferit,' ',sh.mbiemriShoferit) AS emrimbiemri, p.dataEPorosise, p.dateEDergeses,p.kostoja";
    $sql .= " FROM userat u INNER JOIN porosite p ON u.userID=p.userID INNER JOIN ushqimet ush ON p.ushqimetID=ush.ushqimetID
    INNER JOIN shoferat sh ON p.shoferiID=sh.shoferiID";
    $sql .= " WHERE p.porosiaID=$porosiaID";
    $res = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($res);
}
function shtoPorosi($userID, $ushqimetID, $shoferiID, $dataEPorosise, $dateEDergeses, $kostoja)
{
    global $dbconn;
    
    //$userID=$_SESSION['user']['userID'];
    $sql = "INSERT INTO porosite(userID, ushqimetID, shoferiID, dataEPorosise, dateEDergeses, kostoja) VALUES ";
    $sql .= "('$userID', '$ushqimetID', '$shoferiID', '$dataEPorosise', '$dateEDergeses','$kostoja')";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Porosia u shtua me sukses";
        header("Location: ../porosite.php");
    } else {
        die("Deshtoi shtimi i porosis" . mysqli_error($dbconn));
    }
}
function modifikoPorosi($porosiaID, $shoferiID, $ushqimetID, $userID, $dataEPorosise, $dateEDergeses, $kostoja)
{
    global $dbconn;

    //$userID = $_SESSION['user']['perdoruesiid'];
    $sql = "UPDATE porosite SET shoferiID='$shoferiID', ushqimetID='$ushqimetID', userID='$userID',";
    $sql .= " dataEPorosise='$dataEPorosise', dateEDergeses='$dateEDergeses', kostoja='$kostoja' WHERE porosiaID=$porosiaID ";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Porosia u modifiku me sukses";
        header("Location: ../porosite.php");
    } else {
        die("Deshtoi modifikimi i porosive" . mysqli_error($dbconn));
    }
}

function fshijPorosi($porosiaID){
    global $dbconn;
    $sql = "DELETE FROM porosite WHERE porosiaID = $porosiaID";
    $porosite= mysqli_query($dbconn,$sql);
    if($porosite){
        $_SESSION['message']= "Porosia u fshij me sukses";
        header("Location: ../porosite.php");
    }else{
        die("Deshtoi fshirja e porosive" . mysqli_error($dbconn));
    }
}

/* */

function merrkategorite()
{
    global $dbconn;
    $sql = "SELECT * FROM kategorite";
    return mysqli_query($dbconn, $sql);
}

function merrKategoriId($kategoriaID){
    global $dbconn;
    $sql = "SELECT kategoriaID, llojiKategorise, fotoKategorise,activeKategorise FROM kategorite WHERE kategoriaID = $kategoriaID";
    $res = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($res);
}

function shtoKategori($llojiKategorise, $fotoKategorise,$activeKategorise){
    global $dbconn;
    $target_path = $_SERVER['DOCUMENT_ROOT'] . "/RestaurantWebsite/images/";
    $filename = $fotoKategorise['name'];

    if (move_uploaded_file($fotoKategorise['tmp_name'], $target_path . $filename)) {
        $sql = "INSERT INTO kategorite (llojiKategorise, fotoKategorise, activeKategorise) VALUES ('$llojiKategorise', '$filename', '$activeKategorise')";
        $res = mysqli_query($dbconn, $sql);
        if($res){
            $_SESSION['message'] = "Kategoria u shtua me sukses";
            header("Location: ../kategorite.php");
        }else{
            die("Deshtoi shtimi i kategorise" . mysqli_error($dbconn));
        } 
    }else{
        echo "Deshtoi ngarkimi i fotografise!";
    }
}

function modifikoKategori($kategoriaID, $llojiKategorise, $fotoKategorise, $activeKategorise){
    global $dbconn;
    $target_path = $_SERVER['DOCUMENT_ROOT'] . "/RestaurantWebsite/images/";
    $filename = $fotoKategorise['name'];

    if (move_uploaded_file($fotoKategorise['tmp_name'], $target_path . $filename)) {
        $sql = "UPDATE kategorite SET kategoriaID='$kategoriaID', llojiKategorise='$llojiKategorise', 
        fotoKategorise='$filename', activeKategorise='$activeKategorise' 
        WHERE kategoriaID=$kategoriaID";
        $res = mysqli_query($dbconn, $sql);
        if($res){
            $_SESSION['message'] = "Kategoria u modifikua me sukses";
            header("Location: ../kategorite.php");
        }else{
            die("Deshtoi modifikimi i kategorise" . mysqli_error($dbconn));
        }
    }else{
        echo "Deshtoi ngarkimi i fotografise!";
    }
}

function fshijKategori($kategoriaID){
    global $dbconn;
    $sql ="DELETE FROM kategorite where kategoriaID=$kategoriaID";
    $res= mysqli_query($dbconn, $sql);
    if($res){
        $_SESSION['message'] = "Kategoria u fshi me sukses";
        header("Location: ../kategorite.php");
    }else{
        die("Deshtoi fshirja e kategorise" . mysqli_error($dbconn));
    }
}

/* */

function merrShoferat()
{
    global $dbconn;
    $sql = "SELECT shoferiID, emriShoferit, mbiemriShoferit, phoneShoferi, statusi FROM shoferat";
    return mysqli_query($dbconn, $sql);
}

function merrShoferId($shoferiID)
{
    global $dbconn;
    $sql = "SELECT shoferiID, emriShoferit, mbiemriShoferit, phoneShoferi, statusi FROM shoferat";
    $sql .= " WHERE shoferiID=$shoferiID";
    $res = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($res);
}

function shtoShofer($emriShoferit, $mbiemriShoferit, $phoneShoferi, $statusi)
{
    global $dbconn;
    $sql = "INSERT INTO shoferat(emriShoferit,mbiemriShoferit,phoneShoferi,statusi ) VALUES ";
    $sql .= "('$emriShoferit', '$mbiemriShoferit', '$phoneShoferi', '$statusi')";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Shoferi u shtua me sukses";
        header("Location: ../shoferat.php");
    } else {
        die("Deshtoi shtimi i shoferit" . mysqli_error($dbconn));
    }
}

function modifikoShofer($shoferiID, $emriShoferit, $mbiemriShoferit, $phoneShoferi, $statusi)
{
    global $dbconn;
    $sql = "UPDATE shoferat SET emriShoferit='$emriShoferit', mbiemriShoferit='$mbiemriShoferit', phoneShoferi='$phoneShoferi' ,";
    $sql .= "statusi='$statusi'";
    $sql .= "WHERE shoferiID=$shoferiID ";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Shoferi u modifikua me sukses";
        header("Location: ../shoferat.php");
    } else {
        die("Deshtoi modifikimi i shoferit" . mysqli_error($dbconn));
    }
}

function fshijShofer($shoferiID){
    global $dbconn;
    $sql = "DELETE FROM shoferat WHERE shoferiID = $shoferiID";
    $res = mysqli_query($dbconn, $sql);
    if($res){
        $_SESSION['message']="Shoferi u fshi me sukses";
        header("Location: ../shoferat.php");
    }else{
        die("Deshtoi fshirja e shoferit" . mysqli_error($dbconn));
    }
}