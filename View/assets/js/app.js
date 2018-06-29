/* ouvrir fermer le menu */
 $('.m-nav-toggle').click(function(e){
   e.preventDefault();
   $('.m-right').toggleClass('is-open');
 })

/* switcher log in / sign in */
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

