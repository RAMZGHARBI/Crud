<?php

class User {
    private $id;
    private $nom;    
    private $email;
    private $pwd;

    public function __construct($nom= null,$email = null, $pwd = null) { 
        $this->nom = $nom; 
        $this->email = $email;
        $this->pwd = $pwd;
    }

    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the value of email
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Get the value of pwd
     */
    public function getPwd() {
        return $this->pwd;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
}
?>