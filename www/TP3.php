<?php

/* Formulaire HTML d'inscription avec
Nom facultatif
Prénom facultatif
Email 
Mot de passe
Mot de passe de confirmation
Acceptation des CGU */


//http://localhost/TP3.php?
// lastname=Skrzypczyk&firstname=yves&email=y.skrzypczyk%40gmail.com&pwd=fdfdsf&pwdConfirm=fdfdsf&cgu=on

//Variables super globales
// Toujours en majuscule et commence par $_
// Créé et alimenté par le serveur
// Accessible partout
// Contient toujours un tableau
// post, get, files, session, cookie, request, env, server


//Réaliser toutes les vérifications Macro et Micro pour valider le formulaire
//Afficher les erreurs s'il y en a sinon afficher "ok"



?>



<form method="POST" action="">
    <input type="text" name="lastname" placeholder="Votre nom" value="<?= $_POST['lastname']??"" ?>"><br>
    <input type="text" name="firstname" placeholder="Votre prénom" value="<?= $_POST['firstname']??"" ?>"><br>
    <input type="email" name="email" placeholder="Votre email" value="<?= $_POST['email']??"" ?>" required><br>
    <input type="password" name="pwd" placeholder="Votre mot de passe"  required><br>
    <input type="password" name="pwdConfirm" placeholder="Confirmation" required><br>
    <label>
        <input type="checkbox" name="cgu" required> J'accèpte les CGU
    </label><br>
    <button>S'inscrire</button>
</form>

