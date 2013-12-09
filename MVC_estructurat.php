<?php
/**
 * Controlador principal de l'aplicació.
 * Redirigeix els paràmetres de controlador i accions als seus respectius
 * controladors i funcions
 */
$servidor='127.0.0.1';
$usuari='root';
$password='';
$bd='botiga';
 

$directoriControladors = "controlador/";
$controladorPredefinit = "productes";
$accioPredefinida = "_llistarProductesAction";

if(! empty($_GET['controlador']))
      $controlador = $_GET['controlador'];
else
      $controlador = $controladorPredefinit;
 
if(! empty($_GET['accio']))
      $accio = $_GET['accio'] . 'Action';
else
      $accio = $accioPredefinida;
 
$controlador = preg_replace('/[^a-zA-Z0-9]/', '', $controlador);
$accio = '_' . preg_replace('/[^a-zA-Z0-9]/', '', $accio);
 
 
$controlador = $directoriControladors .'MVC_'. $controlador . 'Controlador.php';
 
if(is_file($controlador))
      require_once $controlador;
else
      die('El controlador no existeix - 404 not found');
 
if(is_callable($accio))
      $accio();
else
      die('La accio no existeix - 404 not found');
?>