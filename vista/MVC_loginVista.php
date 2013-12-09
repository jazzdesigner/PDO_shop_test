<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <title>Botiga Online | La Botiga de la Figa</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <header>
        <div id="header">
            <a id="header_logo" href="?accio=llistarProductes"></a>
        </div>
    </header>
        
    <container>
        <form action="../MVC_estructurat.php?controlador=login&accio=_login" method="POST">
            <h2>Login</h2>
            Nom: <input type="text" name="nom" /><br/>
            Contrasenya: <input type="password" name="contrasenya" /><br/>
            <input type="submit" value="envia" name="submit" />
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
