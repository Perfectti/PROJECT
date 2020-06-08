//script para el boton de contacto (incompleto)

// document.getElementById("botoncontacto").onclick = function () {
//     location.href = "www.yoursite.com";
// };

//Mientras el formulario de búsqueda está vacío, se desactiva el botón submit

jQuery(document).ready(function(){
  jQuery("#botonbusc").attr('disabled',true);
  jQuery("#busctext").keyup(function(){
    if(jQuery(this).val().length !=0)
      jQuery("#botonbusc").attr('disabled',false);
    else
      jQuery("#botonbusc").attr('disabled',true);
  })
});

jQuery(document).ready(function(){
  jQuery("#botonbuscside").attr('disabled',true);
  jQuery("#busctextside").keyup(function(){
    if(jQuery(this).val().length !=0)
      jQuery("#botonbuscside").attr('disabled',false);
    else
      jQuery("#botonbuscside").attr('disabled',true);
  })
});


// jQuery(document).ready(function(){
//   jQuery("#commsub").attr('disabled',true);
//   jQuery("#comm").keyup(function(){
//     if(jQuery(this).val().length !=0)
//       jQuery("#commsub").attr('disabled',false);
//     else
//       jQuery("#commsub").attr('disabled',true);
//   })
// });

// var scroll = window.pageYOffset; //Guardamos en una variable la "cantidad" de scroll de la página
// window.onscroll = function(){
//   var curscroll = window.pageYOffset;
//   if (scroll > curscroll) {
//     document.getElementByClassName("navbar").style.top = "0";
//   }else {
//     document.getElementByClassName("navbar").style.top = "-50px";
//   }
//   scroll = curscroll;
// }
