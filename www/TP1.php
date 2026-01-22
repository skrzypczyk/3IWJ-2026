<?php

        $esgi = [
            "5A"=>[],
            "4A"=>[],
            "3A"=>[
                "IW"=>[
                    "classe 1"=>[],
                    "classe 2"=>[],
                    "classe J"=>[
                        ["firstname"=>"Lucas", "lastname"=>"ZEBRE", "CC1"=>12, "CC2"=>11, "Partiel"=>10],
                        ["firstname"=>"Pauline", "lastname"=>"ENTE", "CC1"=>14, "CC2"=>14, "Partiel"=>11],        
                        ["firstname"=>"Thomas", "lastname"=>"DURAND", "CC1"=>13, "CC2"=>12, "Partiel"=>14],
                        ["firstname"=>"Camille", "lastname"=>"MARTIN", "CC1"=>15, "CC2"=>14, "Partiel"=>16],
                        ["firstname"=>"Nicolas", "lastname"=>"PETIT", "CC1"=>10, "CC2"=>9, "Partiel"=>11],
                        ["firstname"=>"Sarah", "lastname"=>"MOREAU", "CC1"=>16, "CC2"=>15, "Partiel"=>17],
                        ["firstname"=>"Julien", "lastname"=>"ROUSSEAU", "CC1"=>11, "CC2"=>12, "Partiel"=>10],
                        ["firstname"=>"Emma", "lastname"=>"GARNIER", "CC1"=>14, "CC2"=>13, "Partiel"=>15],
                        ["firstname"=>"Alexandre", "lastname"=>"LEROY", "CC1"=>9, "CC2"=>10, "Partiel"=>8],
                        ["firstname"=>"Manon", "lastname"=>"FABRE", "CC1"=>17, "CC2"=>16, "Partiel"=>18],
                    ]
                ],
                "AL"=>[],
                "MOC"=>[]
            ],
            "2A"=>[],
            "1A"=>[]
        ];


        //Afficher un tableau HTML avec Nom et prénom et moyenne
        //Dans l'ordre de classement au sein de la classe
        //Formule de la moyenne (CC1+CC2+Partiel*2)/4

        $classJ = $esgi["3A"]["IW"]["classe J"];


        $studentsOrdered = [];
        foreach($classJ as $student){
            $average = ($student["CC1"]+$student["CC2"]+$student["Partiel"]*2)/4;
            $average = round($average, 1);
            $studentsOrdered[$average*10][] = $student;
        }
        krsort($studentsOrdered);



        echo "<table>";
        echo "<tr>";
        echo "<th>Nom</th>";
        echo "<th>Prénom</th>";
        echo "<th>Moyenne</th>";
        echo "</tr>";
        foreach($studentsOrdered as $average => $students){

            foreach($students as $student){
                echo "<tr>";
                echo "<td>".$student["lastname"]."</td>";
                echo "<td>".$student["firstname"]."</td>";
                echo "<td>".($average/10)."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";