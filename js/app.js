$(function(){
    scrollNav();


    //Navegación Principal
        
    //Clase del menu
    $('body.conferencia .navegacion_principal a:contains("Inicio")').addClass('activo');
    $('body.calendario .navegacion_principal a:contains("Colecciones")').addClass('activo');
    $('body.invitados .navegacion_principal a:contains("Nuestra Historia")').addClass('activo');

});

function scrollNav() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#nav").offset().top
    }, 2500);
    $('.app_whatsapp').show(7000);
}
