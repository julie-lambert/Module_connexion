<?php include 'header.php' ;?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module_connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

$login = $_SESSION["Login"];

if(!empty($_SESSION["Login"])){
echo "<h1>Bienvenue $login</h1>";
}
else{
    echo "";
}


?>

</body>
</html>