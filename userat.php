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
    <table class="styled-table">
        <thead>
        <tr>
            <th>Emri</th>
            <th>Mbiemri</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Adresa</th>
            <th>Modifiko</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $userat=merrUserat();
            while ($useri = mysqli_fetch_assoc($userat)) {
                $uid=$useri['userID'];
                $useriFoto=$useri['fotoUseri'];
                echo "<tr class='active-row'>";
                echo "<td>". $useri['emri'] . "</td>";
                echo "<td>". $useri['mbiemri'] . "</td>";
                echo "<td>". $useri['email'] . "</td>";
                echo "<td>". $useri['phone'] . "</td>";
                echo "<td>". $useri['adresa'] . "</td>";
                echo "<td><a href='CRUDS/modifiko_user.php?uid={$uid}'>
                <i class='fas fa-edit'> modifiko</i></a></td>";
                echo "</tr>";
            }
            
            ?>
    </table>
</section>


<?php
    include "inc/footer.php";
?>