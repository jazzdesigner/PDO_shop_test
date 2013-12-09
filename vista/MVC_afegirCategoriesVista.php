<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <title>Botiga Online | La Botiga de la Figa</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <div id="header">
            <a id="header_logo" href="index.php"></a>
            <div class="header_login">
                hola, <?php echo $_SESSION['usuari'] ?>
                <br/>
                <a href="MVC_estructurat.php?controlador=login&accio=evaluarLogin">logout</a>    
            </div>
        </div>
    </header>
        
    <container>
        <form action="MVC_estructurat.php?controlador=categories&accio=_afegirCategories" method="POST">
            <h2>Afegir Categoria</h2>
            Nom: <input type="text" name="ID" /><br/>
            Descripció: <input type="text" name="descripcio" /><br/>
            <input type="submit" value="submit" name="envia" />
        </form>
        
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
