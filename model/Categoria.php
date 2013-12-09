<?php

/**
 * Bean que descriu Categoria
 * @author Jaime
 */
class Categoria {

    private $ID;
    private $descripcio;
    
    function __construct($ID, $descripcio) {
        $this->ID = $ID;
        $this->descripcio = $descripcio;
    }
    
    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getDescripcio() {
        return $this->descripcio;
    }

    public function setDescripcio($descripcio) {
        $this->descripcio = $descripcio;
    }

}

?>
