<?php

/**
 * MVC. Model dels productes
 * Fa servir el conector BDAccessor.
 * Es connecta mitjançant la connexió MySQL original
 * @autor: Jaime Zamorano
 */
global $servidor, $usuari, $password, $bd;

try {
    $conn = new PDO("mysql:host=$servidor;dbname=$bd",$usuari, $password);
} catch (PDOException $e) {
    print "¡Problema amb la connexió de MySQL!: " . $e->getMessage() . "<br/>";
    die();
}

/**
 * funció que mostra tots els resultats de la taula
 * @param object $conn Objecte de connexió a la BD
 * @return array[] matriu amb els resultats de la consulta
 */
function obtenirTotesCategories($conn) {

    $consulta = 'SELECT * FROM categoria';
    $resultat = $conn->query($consulta);

    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $categories[]=$row;
    }
    return $categories;

}

/**
 * funció que mostra tots els IDs de la taula
 * @param object $conn Objecte de connexió a la BD
 * @return array[] matriu amb els resultats de la consulta
 */
function obtenirNomsCategories($conn) {
    
    $consulta = 'SELECT ID FROM categoria';
    $resultat = $conn->query($consulta);

    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $categories[]=$row;
    }
    return $categories;
    
}
/**
 * funció que afegeix una nova categoria a la taula
 * @param object $conn Objecte de connexió a la BD
 * @return integer retorna el nombre de registres afegits
 */
function afegirCategoria($cat,$conn) {

    $sentencia = $conn->prepare("INSERT INTO categoria(ID,descripcio) VALUES (?,?)");

    $p1=$cat->getID();
    $p2=$cat->getDescripcio();
    $sentencia->bindParam(1,$p1);
    $sentencia->bindParam(2,$p2);
    
    $sentencia->execute();
}

/**
 * funció que esborra una categoria
 * @param string $ID
 * @param object $conn Objecte de connexió a la BD
 */
function esborrarCategoria($ID,$conn) {

    $sentencia = $conn->prepare("DELETE FROM categoria WHERE ID = ?");
    
    $sentencia->bindParam(1,$ID);
    $sentencia->execute();
}
?>