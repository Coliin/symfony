<?php
namespace App\Models;

class Contact{
    private $nom;
    private $prenom;
    private $mail;
    private $tel;
    private $mobile;

    public function __construct()
    {
        $this->nom="PACO";
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @return string
     */
    public function getTel(): string
    {
        return $this->tel;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }


}