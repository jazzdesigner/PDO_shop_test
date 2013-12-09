<?php
/**
 * Controlador dels productes
 */
global $conn;

session_start();

/**
 * Llista tots els productes de la base de dades.
 * Retorna una llista dels productes
 */
function _llistarProductesAction()
{
        require 'model/MVC_productesModel.php';
	$productes = obtenirTotsProductes($conn);
        require 'model/MVC_categoriesModel.php';
	$categories = obtenirTotesCategories($conn);
	require 'vista/MVC_llistarVista.php';
}

function _mostrarProducteAction()
{
        require 'model/MVC_productesModel.php';
	$productes = obtenirProducte($_GET['codi'],$conn);
        require 'model/MVC_categoriesModel.php';
	$categories = obtenirTotesCategories($conn);
	require 'vista/MVC_mostrarProducteVista.php';
}

/**
 * Llista els productes per quantitat
 */
function _ordenarProductesPerQuantitatAction()
{
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $quantitat=$_POST['quantitat'];
            require 'model/MVC_productesModel.php';
            $productes = obtenirProductesPerQuantitat($quantitat,$conn);
        }
        require 'model/MVC_categoriesModel.php';
	$categories = obtenirTotesCategories($conn);
	require 'vista/MVC_llistarVista.php';
}

function _cercarProductesPerParaulaAction() {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $paraula=$_POST['paraula'];
            require 'model/MVC_productesModel.php';
            $productes = cercaProductes($paraula,$conn);
        }
        require 'model/MVC_categoriesModel.php';
	$categories = obtenirTotesCategories($conn);
	require 'vista/MVC_llistarVista.php';
}
/**
 * Llistar productes per categoria
 */
function _ordenarProductesPerCategoriaAction()
{
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $categoria=$_POST['categoria'];
            
            require 'model/MVC_productesModel.php';
            
            $productes = obtenirProductesPerCategoria($categoria,$conn);
        }
        require 'model/MVC_categoriesModel.php';
	$categories = obtenirTotesCategories($conn);
	require 'vista/MVC_llistarVista.php';
}

/**
 * Afegeix un nou producte a la base de dades.
 */
function _afegirProducteAction()
{ 

        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            require 'vista/MVC_afegirVista.php';
        }
                
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {            
            if(isset($_FILES['image'])){
                $errors= array();
                $file_name = $_FILES['image']['name'];
                $file_size =$_FILES['image']['size'];
                $file_tmp =$_FILES['image']['tmp_name'];
                $file_type=$_FILES['image']['type'];   
                $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

                $expensions= array("jpeg","jpg","png"); 		
                if(in_array($file_ext,$expensions)=== false){
                        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }
                if($file_size > 2097152){
                $errors[]='File size must be shorter than 2 MB';
                }				
                if(empty($errors)==true){
                        move_uploaded_file($file_tmp,"uploaded/".$file_name);
                }else{
                        print_r($errors);
                }
            }
                         
            require_once ('model/Producte.php');
            $p= new Producte($_POST['codi'],$_POST['nom'],$_POST['descripcio'],
                    $_POST['dataAlta'],$_POST['preu'],$_POST['stock'],$file_name,$_POST['categoria']);

            require 'model/MVC_productesModel.php';
            afegir($p,$conn);

            header ('location: MVC_estructurat.php');
        }
}

/**
 * Elimina un producte segons un codi donat
 */
function _eliminarProducteAction()
{
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            require 'model/MVC_productesModel.php';
            $codi=$_GET['codi'];
            esborrar($codi,$conn);
            header ('location: MVC_estructurat.php');
        } else {
            exit("no s'ha pogut eliminar");
        }
}

/**
 * Edita un producte segons un codi donat
 */
function _editarProducteAction()
{
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            $codi=$_GET['codi'];
            require 'vista/MVC_editarVista.php';
        }
        
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {                        
            if(isset($_FILES['image'])){
                $errors= array();
                $file_name = $_FILES['image']['name'];
                $file_size =$_FILES['image']['size'];
                $file_tmp =$_FILES['image']['tmp_name'];
                $file_type=$_FILES['image']['type'];   
                $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

                $expensions= array("jpeg","jpg","png"); 		
                if(in_array($file_ext,$expensions)=== false){
                        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }
                if($file_size > 2097152){
                $errors[]='File size must be shorter than 2 MB';
                }				
                if(empty($errors)==true){
                        move_uploaded_file($file_tmp,"uploaded/".$file_name);
                }else{
                        print_r($errors);
                }
            }
            require_once ('model/Producte.php');
            $p= new Producte($_POST['codi'],$_POST['nom'],$_POST['descripcio'],$_POST['dataAlta'],
                    $_POST['preu'],$_POST['stock'],$file_name,$_POST['categoria']);
            
            require_once 'model/MVC_productesModel.php';
            editarProducte($p,$conn);
            header ('location: MVC_estructurat.php');
        }
}
?>