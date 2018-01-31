<?php

namespace App\Models;


class User {
    
    private $nom;
    private $competences;
    
    public function __construct($nom=null){
        $this->nom=$nom;
        $this->competences=[]; //[] est similaire à array()
    }
    
    public function getNom() {
        return $this->nom;
    }

    public function getCompetences() {
        return $this->competences;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setCompetences($competences) {
        $this->competences = $competences;
    }
    
    public function addCompetence($competence){
        $this->competences[] = $competence;
    }

    public function __toString(){
        return $this->nom;
    }

}

