<?php
    require 'Personnage.php';
    require 'Manager.php';
    require 'PDOFactory.php';

    $perso = new Personnage;
    if($_POST['classe'] == "guerrier"){
        $perso->hydrate([100, rand(20, 10), rand(10, 19)]);
    }else{
        $perso->hydrate([100, rand(5, 10), 0]);
    }
    $bd = new PDOFactory;
    $bd->setBdd();
    $bd->setPersonnage(
        [
            $perso->nom,
            $perso->classe,
            $perso->pv,
            $perso->attaque,
            $perso->defense
        ]
    );

    header('Location: index.php');
    exit;

?>