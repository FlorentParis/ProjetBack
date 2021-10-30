<?php

    class Personnage {
        function __construct()
        {
            $this->nom = $_POST['nom'];
            $this->classe = $_POST['classe'];
            $this->pv = 0;
            $this->attaque = 0;
            $this->defense = 0;
        }

        function hydrate($data) {
            $this->pv = $data[0];
            $this->attaque = $data[1];
            $this->defense = $data[2];
        }
    }

?>