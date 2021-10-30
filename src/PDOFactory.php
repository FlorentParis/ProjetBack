<?php

    class PDOFactory {
        public $bdd;

        public function setBdd() {
            $this->bdd = new PDO('mysql:host=db;dbname=combat', 'root', 'example');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function getBdd(){
            return $this->bdd;
        }

        public function getAllPersonnages() {
            $q = $this->bdd->query('SELECT * FROM personnages');
            return $q->fetchAll();
        }

        public function setPersonnage($array) {
            $sql = "INSERT INTO personnages (nom, classe, pv, attaque, defense) VALUES (?, ?, ?, ?, ?)";
            $this->getBdd()->prepare($sql)->execute($array);
        }

        public function deletePersonnage($perso) {
            $sql = "DELETE FROM personnages WHERE id=?";
            $this->getBdd()->prepare($sql)->execute([$perso['id']]);
        }
    }
    
?>