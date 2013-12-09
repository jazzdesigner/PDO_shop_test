<?php
/** 
 * Controlador de sessions
 */
global $conn;
session_start();

/**
 * Afegeix productes al carret
 */
function _afegirProducteAction()
{ 
    
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $prod=$_GET['producte'];
        $nomProd=$_GET['nomProducte'];
        $preuProd=$_GET['preuProducte'];
        array_push($_SESSION['producte'],$prod);
        array_push($_SESSION['nomProducte'],$nomProd);
        array_push($_SESSION['preuProducte'],$preuProd);
        
        require 'model/MVC_productesModel.php';
	$productes = obtenirTotsProductes($conn);
	require 'vista/MVC_llistarVista.php';
   }
}

/**
 * Elimina Productes del carret
 */
function _eliminarProducteAction()
{ 
    
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $prod=$_GET['producte'];
        $trobat = false;
        
        $i=0;
        while ($trobat == false){
           if ($_SESSION['producte'][$i]==$prod) {
               unset($_SESSION['producte'][$i]);
               unset($_SESSION['nomProducte'][$i]);
               unset($_SESSION['preuProducte'][$i]);
               $trobat=true;
           }
           $i++;
        }
        
        require 'model/MVC_productesModel.php';
	$productes = obtenirTotsProductes($conn);
	require 'vista/MVC_llistarVista.php';
   }
}
?>
