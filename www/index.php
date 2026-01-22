<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="la description de ma page">
        <title>Titre de la page</title>
    </head>
    <body>

    <?php

        //Commentaire sur une ligne
        /*
            Commentaire sur plusieurs lignes
        */

        /* Les variables
        
            - Commence par un $
            - Convention de nommage :
                -> Camel Case : $maSuperVariable 
                - autre à ne pas utiliser : snake_case, kebab-case, PascalCase
            - Nom de variable cohérent $monPrenom
            - Anglais : $myFirstname   
        
        */

        //Types : String, Bool, Int, Float, Null
        //Typage dynamique
        $myFirstname = "Yves"; //String
        //$myFirstname = 12; //Int
       
        //Concaténation : "."

        //Affiche Bonjour Yves
        //echo "Bonjour ".$myFirstname;
        //echo 'Bonjour $myFirstname';


        //Incrémentation et Décrémentation
        $age = 18;
        $age++; // Post incrémentation
        ++$age; // Pré incrémentation
        $age += 1;
        $age = $age + 1;


        $cpt = 0;

        /*
        echo $cpt;//0
        echo $cpt + 1;//0 - 1 - 0 - 0 - 1 - 1
        echo $cpt = $cpt +1;//1 - 2 - 2 - 1 - 2 - 1
        echo $cpt;//0 - 2 - 2 - 2 - 2 - 1
        echo $cpt=+1;//1 - 3 - 3 - 0 - 3 - 1
        echo $cpt;//0 - 3 - 3 - 2 - 3 - 1
        echo ++$cpt;//1 - 4 - 4 - 3 - 4 - 2
        echo $cpt+=2;//? -  6 - 2 - 3 - 6 - 4
        */

        $myFirstname = "Ilias";
        $myOtherFirstname = &$myFirstname;
        $myOtherFirstname = "Yves";

        //echo $myFirstname;



        //Les conditions

        //if elseif else
        /*
        $age = 16;
        if($age == "18"){
            echo "tout juste majeur";
        }elseif($age > "18")
            echo "Tu peux donc accéder au site";
        else
            echo "Vous êtes mineur";

        
        $scope = "Admin";

        switch($scope){
            case 'Admin':
                echo "Tout faire";
                break;
            case 'Editeur':
                echo "Modifier le contenu des autres";
            case 'Auteur':
                echo "Créer et Modifier son contenu";
            default:
                echo "Consulter le site";
                break;
        }


        //Condition ternaire

        $age = 18;
        if($age >= 18)
            echo "Majeur";
        else
            echo "Mineur";

        //instruction (condition)?vrai:faux;
        echo ($age >= 18)?"Majeur":"Mineur";


        //Le null coalescent 

        $myFirstname = "Yves";
        echo $myFirstname??"Anonyme"

        */

        //Les boucles :

        //While, Do While, Foreach, For
        //While : Nombre d'itération indeterminé

        $cpt=1;
        $rand = rand(1,100);
        while( $rand != 6){
            $cpt++;
            $rand = rand(1,100);
        }
        //echo $cpt." tentative(s)";

        
        //Do While : au moins 1 itération 

        $cpt = 0;
        do{
            $cpt++;
            $rand = rand(1,1000);
        }while($rand != 6);
        //echo $cpt." tentative(s)";

        //For : Nombre d'itération determiné

        for($cpt=0; $cpt < 10 ; ++$cpt){
            //echo $cpt;
        }

        //Foreach : Pour les tableaux


        //Les tableaux

        //$myArray = array();
        $student = ["Aurélien", "ASSIA"];
        
        $student[]=10;

        //echo "Bonjour ".$student[0]." tu as une moyenne de ".$student[2];


        //echo "<pre>";
        //var_dump($student);
        //print_r($student);

        $student = [
                        12=>15,
                        "lastname"=>"Michel",
                        "firstname"=>"Martin",
                        "average"=>18
                    ];

        $student[]="test";

        //Afficher Prénom nom a une moyenne de 18
        //echo $student["firstname"]." ".$student["lastname"]." a une moyenne de ".$student["average"];


        //Dim d'un tableau

        $esgi = [
            "5A"=>[],
            "4A"=>[],
            "3A"=>[
                "IW"=>[
                    "classe 1"=>[],
                    "classe 2"=>[],
                    "classe J"=>[
                        0=>["firstname"=>"Lucas", "lastname"=>"ZEBRE"],
                        1=>["firstname"=>"Pauline", "lastname"=>"ENTE"],
                    ]
                ],
                "AL"=>[],
                "MOC"=>[]
            ],
            "2A"=>[],
            "1A"=>[]
        ];

        $classeJ = $esgi["3A"]["IW"]["classe J"];
        //echo $classeJ[1]["firstname"];


        $array = [[],[[[],[[[],[]]]],[[]]]];


        //echo "<pre>";
        //print_r($array);



        //Les fonctions

        function helloWorld(){
            echo "Bonjour tout le monde";
        }

        //helloWorld();

        //Variable globale
        $myFirstname = "Yves";
        $myLastname = "SKRZYPCZYK";

        function helloYou($myLastname){
            global $myFirstname;
            //Variable locale
            echo "Bonjour ".$myFirstname." ".$myLastname;
        }

        //helloYou($myLastname);


        $myLastname="    SKrzYPCZYk   ";
        function cleanAndValidLastname(&$myLastname){

            $myLastname = trim($myLastname);
            $myLastname = strtoupper($myLastname);

            if(strlen($myLastname)<2){
                return false;
            }
            return true;
        }



        if(  cleanAndValidLastname($myLastname)  ){
            echo "Welcome ".$myLastname;

        }else{
            echo "Non de famille incorrect";
        }


    ?>

    </body>
</html>