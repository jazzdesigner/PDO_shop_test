<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <title>Botiga Online | La Botiga de la Figa</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="js/llistarProducte.js" type="text/javascript"></script>
</head>
<body class="mostrarProducte">

    <header>
        <div id="header">
            <a id="header_logo" href="?accio=llistarProductes"></a>
            <div id="categories">
                <a href="?controlador=categories&accio=llistarCategories">categories</a><br/>
                <a href="?accio=llistarProductes">productes</a>
            </div>
            <div id="cart">
                <?php 
                    for($i=0;$i < sizeof($_SESSION['producte']);$i++){
                    ?>
                        <label class="<?php echo $_SESSION['producte'][$i] ?>">
                            <?php echo $_SESSION['nomProducte'][$i] ?>
                            <b><?php echo $_SESSION['preuProducte'][$i] ?></b>
                            <a href="?controlador=sessio&accio=eliminarProducte&
                               producte=<?php echo $_SESSION['producte'][$i] ?>&
                               nomProducte=<?php echo $_SESSION['nomProducte'][$i] ?>">(X)</a>
                        </label><br/>
                <?php 
                    }
                ?>
            </div>
            <div class="header_login">
                hola,<?php echo $_SESSION['usuari'] ?>
                <br/>
                <a href="MVC_estructurat.php?controlador=login&accio=evaluarLogin">logout</a>    
            </div>
        </div>
    </header>
        
    <container>
        
        <a class="enrera" href="?accio=llistarProductes">&lt; enrera</a>
        <?php
        foreach ($productes as $producte) {
            ?>
        <div id="<?php echo $producte["codi"]?>" class="product">
            <div class="buttons">
                <button class="buy" title="comprar"></button>
                <button class="edit" title="editar"></button>
                <button class="remove" title="esborrar"></button>
            </div>
                <img src="<?php echo "uploaded/".$producte["imatge1"]?>"/>
            <div class="info">
                <h5><?php echo $producte["ID_categoria"] ?></h5>
                <h2><?php echo $producte["nom"] ?></h2>
                <p> <?php echo $producte["descripcio"] ?></p>

                <div class="extended_info">
                    <h2><?php echo $producte["preu"] ?>€</h2>
                    <p>
                        <span>Data d'alta:</span>
                        <br/>
                        <?php echo $producte["dataAlta"] ?>
                        <br/>
                        <span>Stock:</span>
                        <?php echo $producte["stock"] ?> unitats
                    </p>
                </div>
            </div>
        </div>   
            <?php
        }
        ?>
        
        <div class="add">
            <button class="afegir" title="afegir"></button>
            <label><a href="?accio=afegirProducte">Afegir Producte</a></label>
        </div>
        
    </container>

    <footer>
        <div class="container">
            <div class="autor">
                <span>Botiga de la figa</span>
                <hr>
                Jaime Zamorano
            </div>
            <div class="logo"></div>
        </div>
    </footer>    

</body>
</html>
