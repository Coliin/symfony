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
        $this->prenom="Paco";
        $this->mail="michou@gmail.com";
        $this->tel="0235689748";
        $this->mobile="0665987415";
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }


}