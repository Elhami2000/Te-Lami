<?php
    include "inc/header.php";
?>
<head>
    <link rel="stylesheet" href="css/style-table.css">
</head>

<section class="list-entity container">
    <div class="image">
        <img src="https://caterease.com/wp-content/uploads/2019/01/Final-Background-For-Login.png" alt="">
    </div>
    <table class="styled-table">
        <thead>
        <tr>
            <th>Foto</th>
            <th>Pershkrimi</th>
            <th>Emri</th>
            <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user']['role']==1){
            echo "<th>Modifiko</th>
            <th>Fshij</th>";
            }
        }
            ?>
        </tr>
        </thead>
        <tbody>
            <?php
            $ushqimet=merrUshqimet();
            while ($ushqimi = mysqli_fetch_assoc($ushqimet)) {
                $ushid=$ushqimi['ushqimetID'];
                $ushqimiFoto=$ushqimi['foto'];
                echo "<tr class='active-row'>";
                echo "<td><img style='width:250px' src='images/$ushqimiFoto'></td>";
                echo "<td>". $ushqimi['emriUshqimit'] . "</td>";
                echo "<td>". $ushqimi['pershkrimi'] . "</td>";
                if(isset($_SESSION['user'])){
                    if($_SESSION['user']['role']==1){
                echo "<td><a href='CRUDS/modifiko_ushqim.php?ushid={$ushid}'>
                <i class='fas fa-edit'> modifiko</i></a></td>";
                echo "<td><a href='CRUDS/fshij_ushqim.php?ushid={$ushid}'>
                <i class='fas fa-edit'> Fshij</i></a></td>";
                    }
                echo "</tr>";
                }
            }
            
            ?>
    </table>
    <?php
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['role']==1){
    echo "<a href='CRUDS/shto_ushqim.php' id='add_entity'><i class='fas fa-plus'></i> Shto Ushqim</a>";
    }
}
    ?>
</section>


<?php
    include "inc/footer.php";
?>