<?php

/**
 * Bean que descriu Producte
 * @author Jaime
 */
class Producte {

    private $codi;
    private $nom;
    private $descripcio;
    private $dataAlta;
    private $preu;
    private $stock;
    private $imatge1;
    private $ID_categoria;
    //put your code here
    
    function __construct($codi, $nom, $descripcio, $dataAlta, $preu, $stock, $imatge1, $ID_categoria) {
        $this->codi = $codi;
        $this->nom = $nom;
        $this->descripcio = $descripcio;
        $this->dataAlta = $dataAlta;
        $this->preu = $preu;
        $this->stock = $stock;
        $this->imatge1 = $imatge1;
        $this->ID_categoria = $ID_categoria;
    }
    
    
    public function getCodi() {
        return $this->codi;
    }

    public function setCodi($codi) {
        $this->codi = $codi;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getDescripcio() {
        return $this->descripcio;
    }

    public function setDescripcio($descripcio) {
        $this->descripcio = $descripcio;
    }

    public function getDataAlta() {
        return $this->dataAlta;
    }

    public function setDataAlta($dataAlta) {
        $this->dataAlta = $dataAlta;
    }

    public function setPreu($preu) {
        $this->preu = $preu;
    }

    public function getPreu() {
        return $this->preu;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function getImatge1() {
        return $this->imatge1;
    }

    public function setImatge1($imatge1) {
        $this->imatge1 = $imatge1;
    }

    public function getID_categoria() {
        return $this->ID_categoria;
    }

    public function setID_categoria($ID_categoria) {
        $this->ID_categoria = $ID_categoria;
    }
    
}

?>
