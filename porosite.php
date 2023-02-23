<?php
include "inc/header.php";
if(!isset($_SESSION['user'])){
    header("Location: index.php");
}
?>
<head>
    <link rel="stylesheet" href="css/style-table.css">
</head>

<section class="list-entity container">
    <div class="image">
        <img src="https://caterease.com/wp-content/uploads/2019/01/Final-Background-For-Login.png" alt="">
    </div>
    <?php
    if (isset($_SESSION['message'])) {
        echo "<div id='message'>" . $_SESSION['message'] . "</div>";
    }
    ?>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Ushqimi</th>
                <th>Emri i ushqimit</th>
                <th>User</th>
                <th>Shoferi</th>
                <th>Data e porosise</th>
                <th>Data e dergeses</th>
                <th>Kostoja</th>
                <th>Modifiko</th>
                <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user']['role']==1){
            echo "<th>Modifiko</th>";
                }
            }
            ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $porosite = merrPorosit();
            $ushqimet = merrUshqimet();
            while ($ushqimi = mysqli_fetch_assoc($ushqimet)) {
                while($porosia = mysqli_fetch_assoc($porosite)){
                $pid=$porosia['porosiaID'];
                $ushqimiFoto=$ushqimi['foto'];
                echo "<td><img style='width:250px' src='images/$ushqimiFoto'></td>";
                echo "<td>" . $porosia['emriUshqimit'] . "</td>";
                echo "<td>" . $porosia['emrimbiemriUser'] . "</td>";
                echo "<td>" . $porosia['emrimbiemri'] . "</td>";
                echo "<td>" . $porosia['dataEPorosise'] . "</td>";
                echo "<td>" . $porosia['dateEDergeses'] . "</td>";
                echo "<td>" . $porosia['kostoja'] . "</td>";
                echo "<td><a href='CRUDS/modifiko_porosi.php?pid={$pid}'>
                <i class='far fa-edit'> Modifiko</i></a></td>";
                if(isset($_SESSION['user'])){
                    if($_SESSION['user']['role']==1){
                echo "<td><a href='CRUDS/fshij_porosi.php?pid={$pid}'>
                <i class='far fa-trash-alt'> Fshij</i></a></td>";
                    }
                }
                echo "</tr>";
            }
        }
            ?>
        </tbody>
    </table>
    <a href="CRUDS/shto_porosi.php" id="add_entity"><i class="fas fa-plus"></i> Krijo Porosi</a>
</section>

<?php
include "inc/footer.php";
?>