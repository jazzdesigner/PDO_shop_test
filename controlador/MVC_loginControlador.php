<?php
/*
 * Controlador del login i logout dels usuaris 
 */
global $conn;

/**
 * Comprova si la sessió està activa i es redirigeix a tancar la sessió
 */
function _evaluarLoginAction()
{
    if (isset($_SESSION)){
        _logoutAction();
        echo "logout";
    }
    else {
        header ('location: vista/MVC_loginVista.php');
    }
}

/**
 * Comprova l'usuari i la contrasenya.
 * Retorna una llista dels productes i activa la sessió d'usuari
 */
function _loginAction()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        require 'model/MVC_loginModel.php';
        $usuari=comprovarUsuari($_POST['nom'], $_POST['contrasenya']);
    }
    session_start();
    $_SESSION['usuari'] = $usuari;
    $_SESSION['producte'] = array();
    $_SESSION['nomProducte'] = array();
    $_SESSION['preuProducte'] = array();
    require 'model/MVC_productesModel.php';
    $productes = obtenirTotsProductes($conn);
    require 'vista/MVC_llistarVista.php';
}

/**
 * Tanca la sessió de l'usuari i destrueix els objectes de la sessió.
 */
function _logoutAction()
{
    session_destroy();
    require 'model/MVC_productesModel.php';
    $productes = obtenirTotsProductes($conn);
    require 'vista/MVC_llistarVista.php';
    exit;
}
?>