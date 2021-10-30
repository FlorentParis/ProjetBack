<?php
    class Manager {
        public $actualPlayer;

        public function setActualPlayer($perso) {
            $this->actualPlayer = $perso;
        }

        public function getActualPlayer() {
            return $this->actualPlayer;
        }
    }
?>