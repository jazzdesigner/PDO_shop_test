<?php
/**
 * Llegeix un fitxer i comprova el nom i contrasenya de l'usuari.
 * @param string $nom
 * @param string $contrasenya
 * @return string $nomUsuari retorna el nom d'usuari validat
 */
function comprovarUsuari($nom, $contrasenya){
    
    $file=fopen("uploaded/users.txt","r") or exit("El fichero no se ha podido leer");
    $nomUsuari="";
    
    while(!feof($file))
    {
        $array =explode(",", fgets($file));
        $sortir=false;
        $i=0;
        while($i < sizeof($array) && $sortir==false){
            if(($array[$i]==$nom) && $array[$i+1]==$contrasenya){
                if($array[$i]=="admin")
                    $nomUsuari="admin";
                else $nomUsuari=$nom;
                $sortir=true;
            }
            $i+=2;
        }
    }
    fclose($file);
    return $nomUsuari;
}    
?>
