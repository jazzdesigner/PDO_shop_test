/* 
 * Comportament dels selectors a la Vista del llistat de productes
 * @author Jaime Zamorano.
 */

$(function() {
    /**
     * Callback que edita un producte
     */
    $('.edit').click(function(){
        var codi=$(this).parent().parent().attr('id'); //id producte
        window.location.replace('?accio=editarProducte&codi='+codi);
    })

    /**
     * Callback que elimina un producte 
     */
    $('.remove').click(function(){
        var idProd=$(this).parent().parent().attr('id'); //id producte
        window.location.replace('?codi=' + idProd +'&accio=eliminarProducte');
    })

    /**
     * Callback que afegeix un producte a la sessió
     */
    $('.buy').click(function(){
        var idP=$(this).parent().parent().attr('id'); //id producte
        var nP=$(this).parent().next().next().children(':first-child').next().text();
        var pP =$(this).parent().next().next().next().children(':first-child').text();
        window.location.replace('?controlador=sessio&accio=afegirProducte&producte='
            +idP+'&nomProducte='+nP+'&preuProducte='+pP);
    })

    /**
     * Callback que afegeix un nou producte
     */
    $('.afegir').click(function(){
        window.location.replace('?accio=afegirProducte');
    })
});


