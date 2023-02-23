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
            <th>Lloji i kategorise</th>
            <th>Active</th>
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
            $kategorit=merrkategorite();
            while ($kategoriaID = mysqli_fetch_assoc($kategorit)) {
                $kid=$kategoriaID['kategoriaID'];
                $kategoriaFoto=$kategoriaID['fotoKategorise'];
                echo "<tr class='active-row'>";
                echo "<td><img style='width:250px' src='images/$kategoriaFoto'></td>";
                echo "<td>". $kategoriaID['llojiKategorise'] . "</td>";
                echo "<td>". $kategoriaID['activeKategorise'] . "</td>";
                if(isset($_SESSION['user'])){
                    if($_SESSION['user']['role']==1){
                echo "<td><a href='CRUDS/modifiko_kategori.php?kid={$kid}'>
                <i class='fas fa-edit'> modifiko</i></a></td>";
                echo "<td><a href='CRUDS/fshij_kategori.php?kid={$kid}'>
                <i class='fas fa-edit'> fshij</i></a></td>";
                    }
                echo "</tr>";
                }
            }
            
            ?>
    </table>
    <?php if(isset($_SESSION['user'])){
        if($_SESSION['user']['role']==1){
    echo "<a href='CRUDS/shto_kategori.php' id='add_entity'><i class='fas fa-plus'></i> Shto kategori</a>";
    }
}
    ?>
</section>


<?php
    include "inc/footer.php";
?>