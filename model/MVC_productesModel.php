<?php
/*
 * MVC. Model dels productes
 * autor: Jaime Zamorano
 */
global $servidor, $usuari, $password, $bd;

try {
    $conn = new PDO("mysql:host=$servidor;dbname=$bd",$usuari, $password);
    $conn->exec('set names utf8');
} catch (PDOException $e) {
    print "¡Problema amb la connexió de MySQL!: " . $e->getMessage() . "<br/>";
    die();
}

/**
 * Obté una matriu amb els resultats de tots els productes
 * @param object $conn connexió a la bd
 * @return array $productes
 */
function obtenirTotsProductes($conn) {

    $consulta = 'SELECT * FROM producte';
    $resultat = $conn->query($consulta);
    
    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $productes[]=$row;
    }
    return $productes ;
}

/**
 * Obté una matriu amb els resultats dels productes donada una paraula
 * @param string $paraula
 * @param object $conn connexió a la bd
 * @return array $productes
 */
function cercaProductes($paraula,$conn){
    
        $sentencia = $conn->prepare("SELECT * FROM producte WHERE descripcio LIKE ?");
        $sentencia->execute(array("%$paraula%"));

        while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) {
            $productes[]=$fila;
        }

    return $productes ;
}

/**
 * Obté una matriu amb els resultats de tots els productes segons la quantitat
 * @param int $quantitat
 * @param object $conn connexió a la bd
 * @return array $productes
 */
function obtenirProductesPerQuantitat($quantitat,$conn) {

    if ($quantitat == "tots")
        $quantitat = 100;
    
    $consulta = 'SELECT * FROM producte';
    $resultat = $conn->query($consulta);
    $i=0;
    while (($row = $resultat->fetch(PDO::FETCH_ASSOC)) && $i < $quantitat) {
        $productes[]=$row;
        $i++;
    }

    return $productes ;
}

/**
 * Obté una matriu amb els resultats de tots els productes segons la categoria
 * @param string $categoria
 * @param object $conn connexió a la bd
 * @return array $productes
 */
function obtenirProductesPerCategoria($categoria,$conn) {

        if ($categoria == "totes")
            $categoria = "%";
        $sentencia = $conn->prepare("SELECT * FROM producte WHERE ID_categoria LIKE ?");
        $sentencia->execute(array($categoria));

        while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) {
            $productes[]=$fila;
        }

    return $productes ;
}

function obtenirProducte($p,$conn) {

        $sentencia = $conn->prepare("SELECT * FROM producte WHERE codi = ?");
        $sentencia->execute(array($p));

        while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) {
            $productes[]=$fila;
        }

    return $productes;
}
/**
 * Afegeix un nou producte a la base de dades
 * @param object $p objecte de producte
 * @param object $conn connexió a la bd
 */
function afegir($p,$conn) {
    $sentencia = $conn->prepare(
            "INSERT INTO producte (codi,nom,descripcio,dataAlta,preu,stock,imatge1,ID_categoria)
                VALUES (?,?,?,?,?,?,?,?)");
    $p1=$p->getCodi();
    $p2=$p->getNom();
    $p3=$p->getDescripcio();
    $p4=$p->getDataAlta();
    $p5=$p->getPreu();
    $p6=$p->getStock();
    $p7=$p->getImatge1();
    $p8=$p->getID_Categoria();

    $sentencia->bindParam(1,$p1);
    $sentencia->bindParam(2,$p2);
    $sentencia->bindParam(3,$p3);
    $sentencia->bindParam(4,$p4);
    $sentencia->bindParam(5,$p5);
    $sentencia->bindParam(6,$p6);
    $sentencia->bindParam(7,$p7);
    $sentencia->bindParam(8,$p8);        
    
    $sentencia->execute();
}

/**
 * Esborra un objecte de la taula segons el codi
 * @param integer $codi
 * @param object $conn connexió a la bd
 */
function esborrar($codi,$conn) {
    $sentencia = $conn->prepare('DELETE FROM producte WHERE codi = ?');
    $sentencia->bindParam(1,$codi);
    
    $sentencia->execute();
}

/**
 * Edita el producte segons l'objecte
 * @param object $p objecte de producte
 * @param object $conn connexió a la bd
 */
function editarProducte($p,$conn) {
        $sentencia = $conn->prepare("UPDATE producte SET nom = ?, descripcio = ?,
            dataAlta = ?, preu = ?, stock = ?, imatge1 = ?, ID_categoria = ? WHERE codi = ?");

        $sentencia->bindParam(1,$p->getNom());
        $sentencia->bindParam(2,$p->getDescripcio());
        $sentencia->bindParam(3,$p->getDataAlta());
        $sentencia->bindParam(4,$p->getPreu());
        $sentencia->bindParam(5,$p->getStock());
        $sentencia->bindParam(6,$p->getImatge1());
        $sentencia->bindParam(7,$p->getID_Categoria());
        $sentencia->bindParam(8,$p->getCodi());
        
        $sentencia->execute();
}
?>