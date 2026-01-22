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

$errors = [];

if(
    $_SERVER["REQUEST_METHOD"] == "POST" && 
    count($_POST) == 6 &&
    isset($_POST["firstname"])&&
    isset($_POST["lastname"])&&
    !empty($_POST["email"])&&
    !empty($_POST["pwd"])&&
    !empty($_POST["pwdConfirm"])&&
    isset($_POST["cgu"])
){

    $firstname = ucwords(strtolower(trim($_POST["firstname"])));
    $lastname = strtoupper(trim($_POST["lastname"]));
    $email = strtolower(trim($_POST["email"]));

    //Firstname
    if(strlen($firstname) == 1){
        $errors[] = "Votre prénom doit faire au moins 2 caractères";
    }
    //lastname
    if(strlen($lastname) == 1){
        $errors[] = "Votre nom doit faire au moins 2 caractères";
    }
    //email
    if(!filter_var( $email, FILTER_VALIDATE_EMAIL )){
        $errors[] = "Votre email incorrect";
    }
   
    //pwd
    //8 caractères min
    //Caractères spéciaux
    //Min 1 chiffre et 1 majsucule et 1 minuscule
    if(
        strlen($_POST["pwd"]) < 8 ||
        !preg_match("#[a-z]#", $_POST["pwd"]) ||
        !preg_match("#[A-Z]#", $_POST["pwd"]) ||
        !preg_match("#[0-9]#", $_POST["pwd"]) ||
        !preg_match("#[-.;?,!]#", $_POST["pwd"])
    ){
        $errors[] = "Votre mot de passe est incorrect, il doit posséder 8 caractères dont 1 maj 1 min 1 chiffre et 1 caractère spécial (.;?,-!)";
    }

    //pwdConfirm
    if($_POST["pwd"] != $_POST["pwdConfirm"]){
        $errors[] = "Votre mot de passe de confirmation ne correspond pas";
    }

    if(count($errors) == 0){
        

        //Se connecter à la bdd
        try{
            $pdo = new PDO("mysql:host=db;dbname=app_db","app_user","secret");
        }catch(Exception $e){
            die("Erreur : ".$e->getMessage());
        }
        //Faire ma requête

        $sql = "INSERT INTO esgi_user (lastname,firstname,email,pwd) values
        (:lastname,:firstname,:email,:pwd)";

        $queryPrepared = $pdo->prepare($sql);

        $passwordHashed = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
        //Executer la requête
        $queryPrepared->execute([
            "firstname"=>$firstname,
            "lastname"=>$lastname,
            "email"=>$email,
            "pwd"=>$passwordHashed,
        ]);


    }


}


?>


<?php if(count($errors)>0): ?>

    Formulaire incorrect : 
    <?php
        foreach($errors as $error){
            echo "<li>".$error;
        }
    ?>

<?php endif;?>

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

