<?php

    session_start();

    function dd($var){
        echo"<pre>";
        var_dump($var);      //la fonction var_dump affiche la structure et les valeurs de la variable
        echo "</pre>";

        die();
    }

    function connect(){
        $link = new PDO(                                    //PDO = PHP Data Object suivi des paramètres de connexion 
          'mysql:dbname=game;host=localhost',               //(nom de la base de donnée, de l'host et de l'utilisateur)
          'root',
          ''  
        );

        return $link;
    }