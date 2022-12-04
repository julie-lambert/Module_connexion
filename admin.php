<?php

include 'header.php';

$mysqli = new mysqli ("localhost","root","","moduleconnexion");

$request = $mysqli -> query("SELECT * FROM utilisateurs");

$result_fetch_all = $request -> fetch_all();

?>

<table>
    <tr>
        <th>id</th>
        <th>Login</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Password</th>
    </tr>

 <?php

foreach($result_fetch_all as $ligne){
    echo "<tr>";
    foreach($ligne as $champ){
        echo "<td>" . $champ . "</td>";
    }
    echo "</tr>";
}
?>
</table>  
