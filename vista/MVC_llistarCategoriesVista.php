<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <title>Botiga Online | La Botiga de la Figa</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="js/llistarCategoria.js" type="text/javascript"></script>
</head>
<body>

    <header>
        <div id="header">
            <div id="categories">
                <a href="?controlador=categories&accio=llistarCategories">categories</a><br/>
                <a href="?accio=llistarProductes">productes</a>
            </div>
            <a id="header_logo" href="?accio=llistarProductes"></a>
            <div class="header_login">
                hola, <?php echo $_SESSION['usuari'] ?>
                <br/>
                <a href="MVC_estructurat.php?controlador=login&accio=evaluarLogin">logout</a>    
            </div>
        </div>
    </header>
        
    <container>
        
        <h1>Categories:</h1>

        <?php
        foreach ($categories as $categoria) {
            ?>
        <div id="<?php echo $categoria["ID"] ?>" class="categoria">
            <div class="buttons">
                <button class="remove" title="esborrar"></button>
            </div>
            <div class="info">
                <h2><?php echo $categoria["ID"] ?></h2>
                <p> <?php echo $categoria["descripcio"] ?></p>
            </div>
        </div>   
            <?php
        }
        ?>
        
        <div class="add">
            <button class="afegir" title="afegir"></button>
            <label><a href="MVC_estructurat.php?controlador=categories&accio=afegirCategories">Afegir Categoria</a></label>
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
