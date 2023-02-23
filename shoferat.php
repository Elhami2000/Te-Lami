<?php
    include "inc/header.php";
    if(!isset($_SESSION['user'])){
        header("Location: index.php");
    }
?>
<head>
    <link rel="stylesheet" href="css/style-table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<section class="list-entity container">
    <div class="image">
        <img src="https://caterease.com/wp-content/uploads/2019/01/Final-Background-For-Login.png" alt="">
    </div>
    <table class="styled-table">
        <thead>
        <tr>
            <th>Emri</th>
            <th>Mbiemri</th>
            <th>Phone</th>
            <th>Statusi</th>
            <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user']['role']==1){
            echo "<th>Modifiko</th>
            <th>Fshij</th>
            <th>Fshij Shofer</th>";
                }
            }
            ?>
            
        </tr>
        </thead>
        <tbody>
            <?php
            $shoferat=merrShoferat();
            while ($shoferi = mysqli_fetch_assoc($shoferat)) {
                $shid=$shoferi['shoferiID'];
                echo "<tr class='active-row'>";
                echo "<td>". $shoferi['emriShoferit'] . "</td>";
                echo "<td>". $shoferi['mbiemriShoferit'] . "</td>";
                echo "<td>". $shoferi['phoneShoferi'] . "</td>";
                echo "<td>". $shoferi['statusi'] . "</td>";
                if($_SESSION['user']['role']==1){
                echo "<td><a href='CRUDS/modifiko_shoferi.php?shid={$shid}'>
                <i class='fas fa-edit'></i></a></td>";
                echo "<td><a href='CRUDS/shto_shoferi.php?shid={$shid}'>
                <i class='fa-solid fa-user-plus'></i></a></td>";
                echo "<td><a href='CRUDS/fshij_shofer.php?shid={$shid}'>
                <i class='fas fa-trash'></i></a></td>";
                }
                echo "</tr>";
            }
      
            ?>
    </table>
</section>


<?php
    include "inc/footer.php";
?>