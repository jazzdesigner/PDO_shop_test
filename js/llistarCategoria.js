/* 
 * Comportament dels selectors a la Vista del llistat de categories
 * @author Jaime Zamorano.
 */

/**
 * Callback que elimina una categoria
 */
$(function() {
    $('.remove').click(function(){
        var idCat=$(this).parent().parent().attr('id'); //id producte
        window.location.replace('?controlador=categories&accio=eliminarCategoria&ID=' + idCat);
    })
})