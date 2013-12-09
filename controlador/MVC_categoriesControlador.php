<?php
/**
 * Controlador de categories
 * @author Jaime Zamorano
 */
global $conn;
session_start();

/**
 * Llista tots els productes de la base de dades.
 * Retorna una llista dels productes
 */
function _llistarCategoriesAction()
{
	
        require 'model/MVC_categoriesModel.php';
       
	$categories = obtenirTotesCategories($conn);
 
	require 'vista/MVC_llistarCategoriesVista.php';
}

/**
 * Afegeix una nova categoria a la base de dades
 */
function _afegirCategoriesAction()
{ 

        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            require 'vista/MVC_afegirCategoriesVista.php';
        }
                
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            require_once ('model/Categoria.php');
            $cat= new Categoria($_POST['ID'],$_POST['descripcio']);

            require 'model/MVC_categoriesModel.php';
            afegirCategoria($cat,$conn);
            
            $categories = obtenirTotesCategories($conn);
            require 'vista/MVC_llistarCategoriesVista.php';
        }
}

/**
 * Elimina una categoria segons un codi donat
 */
function _eliminarCategoriaAction()
{
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            $ID=$_GET['ID'];
            require 'model/MVC_categoriesModel.php';
            esborrarCategoria($ID,$conn);
        } else {
            exit("no s'ha pogut eliminar");
        }
	$categories = obtenirTotesCategories();
	require 'vista/MVC_llistarCategoriesVista.php';
}

?>