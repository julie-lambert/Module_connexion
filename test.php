<?php
$bdd = new mysqli("localhost","root", "", "moduleconnexion");
$login = "julie";
$nom = "julie";
$prenom= "julie";
$password = "julie";
$insertUser = $bdd -> prepare("INSERT INTO `utilisateurs` (Login, Nom, Prénom, Password) VALUES (login, $nom,$prenom, $password)");
$insertUser -> execute(array($login, $nom, $prénom, $password ));

?>