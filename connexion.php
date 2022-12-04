<?php

 include 'header.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moduleconnexion";


$conn = new mysqli($servername, $username, $password, $dbname);// connexion base de donnée
$request = $conn->query("SELECT * FROM `utilisateurs`");
$users = $request -> fetch_all();

/*var_dump($users);
echo $users[3][1]; */ 


    
    
    if($_POST != NULL){
        //echo "bonjour<br>";
        $login= htmlspecialchars($_POST["username"]);
        $mdp = htmlspecialchars($_POST["password"]);
        
        for($i=0; isset($users[$i]); $i++){
            
            
            if($users[$i][1] === $login){
                //echo "Login ok<br>";
                if($users[$i][4] === $mdp){
                    $_SESSION['Login'] = $login;
                    //echo"Connexion réussie<br>";
                    if($users[$i][1] === "admin"){
                       // echo "redirection   admin";
                        header('location: admin.php');
                    }
                    else{
                        header('location: index.php');
                    }
                }
                else{
                    echo"mauvais mdp";
                }
                break;    
            }
            else{
                echo"Mauvais login<br>";
            }
            
            
    }
       
    }

?>



<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
        <link rel="stylesheet" href="connexion.css">
    </head>
   
    <body>
   
    <div class="container">
        <div class="form1">
            <form action="" method="POST">
                <p>Connexion</p>
            <input type="text" placeholder="Login" name="username" >
            <br><br>
            <input type="password" placeholder="password" name="password" >
            <br><br>
            <input type="submit" id='submit' value='Se connecter' >
            </form>
        </div>
        <div class="drop drop-1"></div> 
        <div class="drop drop-2"></div> 
        <div class="drop drop-3"></div> 
        <div class="drop drop-4"></div> 
        <div class="drop drop-5"></div> 
       
    </body>
</html>