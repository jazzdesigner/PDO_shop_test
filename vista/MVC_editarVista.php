<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <title>Botiga Online | La Botiga de la Figa</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({ appendText: "(aa-mm-dd)" }).formatDate("yy-mm-dd");
        });
    </script>
</head>
<body>

    <header>
        <div id="header">
            <a id="header_logo" href="?accio=llistarProductes"></a>
            <div class="header_login">
                hola, <?php echo $_SESSION['usuari'] ?>
                <br/>
                <a href="MVC_estructurat.php?controlador=login&accio=evaluarLogin">logout</a>    
            </div>
        </div>
    </header>
        
    <container>
        <form action="MVC_estructurat.php?accio=_editarProducte" method="POST" enctype="multipart/form-data">
            <h2>Editant Producte nº <?php echo $_GET["codi"]?></h2>
            Nom: <input type="text" name="nom" /><br/>
            Descripció: <input type="text" name="descripcio" /><br/>
            Data d'Alta: <input type="text" name="dataAlta" id="datepicker" /><br/>
            Preu: <input type="number" name="preu" /><br/>
            Quantitat de productes:
            <select name="stock">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="5">5</option>
                <option value="10">10</option>
            </select><br/>
            Imatge: <input type="file" name="image" /><br/>
            Categoria:
            <select name="categoria">
                <option value="Alumne">alumne</option>
                <option value="Professor">professor</option>
            </select><br/>
            <input type="hidden" name="codi" value="<?php echo $_GET["codi"]?>"/>
            <br/>            

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
