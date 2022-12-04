<?php

include 'header.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moduleconnexion";

$conn = mysqli_connect($servername, $username, $password, $dbname);// connexion base de donnée
$request = $conn->query("SELECT * FROM `utilisateurs`");
$users = $request -> fetch_all();

if(isset($_POST["Envoyer"])){
    
    if(!empty($_POST["Login"]) AND !empty($_POST["Nom"]) AND !empty($_POST["Prenom"]) AND !empty($_POST["Password"])){
        
        $login = htmlspecialchars($_POST["Login"]);
        $nom = htmlspecialchars($_POST["Nom"]);
        $prenom= htmlspecialchars($_POST["Prenom"]);
        $mdp = htmlspecialchars($_POST["Password"]);
        $repeatpassword = htmlspecialchars(($_POST['repeatpassword']));
        $testLogin = true;//Vérifie la disponibilté du mot de passe 
        
        for($i=0; isset($users[$i]); $i++){
              
            if($users[$i][1] === $login){
                $testLogin = false;
                echo "Cet identifiant n'est pas disponible.";
                break;
            }
        } 

        if($mdp === $repeatpassword){
            if($testLogin === true){
                $sql= "INSERT INTO `utilisateurs` ( `Login`, `Prénom`, `Nom`, `Password`) VALUES ('$login', '$nom','$prenom', '$mdp')"; // Préparation de la requete 
                $res = mysqli_query($conn, $sql);// envoie de la requete 
    
                header('location: connexion.php');
            }
            

        }else{
            echo " Les mots de passe ne sont pas identiques!";
        }
    
       
    }else{

        echo "Veuillez compléter tous les champs";

    }


}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="inscription.css">
</head>
<body>

    <div class="container">
        <div class="form1">
            <form  method = "post" action="inscription.php">
                <p>Bienvenue</p>
                <input type="text" name="Login" placeholder="Login">
                <br><br>
                <input type="text" name="Nom" placeholder="Nom">
                <br><br>
                <input type="text" name="Prenom" placeholder="Prénom">
                <br><br>
                <input type="password" name="Password" placeholder="Mot de passe">
                <br><br>
                <input type="password" name="repeatpassword" placeholder="Confimer le mot de passe">
                <br><br>
                <input type="submit" name="Envoyer" value="Envoyer">
            </form>
        </div> 
        <div class="drop drop-1"></div> 
        <div class="drop drop-2"></div> 
        <div class="drop drop-3"></div> 
        <div class="drop drop-4"></div> 
        <div class="drop drop-5"></div> 
    </div>     
</body>
</html>
    