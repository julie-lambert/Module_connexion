<?php

include 'header.php';

$servername = "localhost";
$username = "root";
$password_serveur = "";
$dbname = "moduleconnexion";
$conn = new mysqli('localhost', 'root', "", 'moduleconnexion');


$login = $_SESSION['Login']; 

if(!empty($_SESSION)) { 
    $bdd = "SELECT * FROM utilisateurs WHERE login='$login'";
    $query = $conn->query($bdd);
    $users= $query->fetch_assoc(); 
    $login_bdd = $users['Login']; 
    $nom = $users['Nom'];
    $prenom = $users['Prénom'];
    $password = $users['Password'];

    if (isset($_POST['submit'])) { 
       
        if ($login != $_POST['Login']) {
            $bdd1 = "UPDATE `utilisateurs` SET login='{$_POST['Login']}' WHERE login='$login'";
            $users1 = $conn->query($bdd1);
            echo "Votre login a bien été changé par:" . $_POST['Login'] . "<br>";
        }if ($password != $_POST['Password']) {
            $new_password = ($_POST['Password']);
            $bdd2 = "UPDATE `utilisateurs` SET password='$new_password' WHERE password='$password'";
            $users2 = $conn->query($bdd2);
            echo "Votre mot de passe a bien été changé par:" . $_POST['Password'] . "<br>";
        } if ($nom != $_POST['Nom']) { 
            $bdd3 = "UPDATE `utilisateurs` SET nom='{$_POST['Nom']}' WHERE nom='$nom'";
            $users3 = $conn->query($sql1);
            echo "Votre nom a bien été changé par:" . $_POST['Nom'] ."<br>";
        }if ($prenom != $_POST['Prénom']) {
            $bdd4 = "UPDATE `utilisateurs` SET prenom='{$_POST['Prénom']}' WHERE prenom='$prenom'";
            $users4 = $conn->query($sql2);
            echo "Votre nom a bien été changé par:" . $_POST['Prénom'] . "<br>";    
        }
    }

}
if (isset($_POST['delete'])) {
    $sql_delete = "DELETE FROM utilisateurs WHERE login='$login'";
    $result_delete = $bdd->query($sql_delete);
    echo "Vos données ont été supprimées";
    session_destroy();
    header('Location: index.php');
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style_profil.css">
    <title>Page de profil</title>
</head>

<header>
<div class="profil"><h2><strong>Votre profil</strong></h2></div>
        <br>
</header>

<body>
        <div class="form1">
            <form  method = "post" action="profil.php">

                <input type="text" name="Login" placeholder="<?php echo $users['Login'] ?>">
                <br><br>
                <input type="text" name="Nom" placeholder="<?php echo $users['Nom'] ?>">
                <br><br>
                <input type="text" name="Prenom" placeholder="<?php echo $users['Prénom'] ?>">
                <br><br>
                <input type="password" name="Password" placeholder="<?php echo $users['Password'] ?>">
                <br><br>

                <br><br>
                <input type="submit" name="submit" value="Modifier">
            </form>
        </div> 
</body>
</html>