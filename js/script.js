/* Author:

*/
$(document).ready(function(){
     $("ul.rslides").responsiveSlides({
      auto: true,             // Boolean: Animate automatically, true or false
      speed: 1000,            // Integer: Speed of the transition, in milliseconds
      timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
      pager: false,           // Boolean: Show pager, true or false
      nav: false,             // Boolean: Show navigation, true or false
      random: false,          // Boolean: Randomize the order of the slides, true or false
      pause: false,           // Boolean: Pause on hover, true or false
      pauseControls: false,   // Boolean: Pause when hovering controls, true or false
      prevText: "Previous",   // String: Text for the "previous" button
      nextText: "Next",       // String: Text for the "next" button
      maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
      controls: "",           // Selector: Where controls should be appended to, default is after the 'ul'
      namespace: "rslides",   // String: change the default namespace used
      before: function(){},   // Function: Before callback
      after: function(){}     // Function: After callback
    });


    /*$('ul.slideshow').cycle({
        fx: 'none', // efeito para os slides
        speed: 1000, // speed of the transition (any valid fx speed value)
        timeout: 5000, // milliseconds between slide transitions (0 to disable auto advance)
        cleartype: true,//!$.support.opacity,   true if clearType corrections should be applied (for IE)
        cleartypeNoBg: true, //Internet Explorer & jQuery Cycle Plugin Background Issue
        pager:  'ul.pager',  // element, jQuery object, or jQuery selector string for the element to use as pager container
        pagerAnchorBuilder: function(idx, slide) {
            return '<li><a href="#"><img src="" width="50" height="50" /></a></li>';
        } // callback fn for building anchor links:  function(index, DOMelement)
    });*/
   $('ul.slideshow').roundabout({
     bearing:0.5, //A direção de partida em que Roundabout deve enfrentar em relação ao focusBearing .
    tilt: 0.6,//Altera ligeiramente os cálculos de elementos móveis. No padrão forma , ajusta a inclinação aparente. Outras formas, será diferente.
    minZ: 100, //Menor o índice z que será atribuído a um elemento móvel. Isto ocorre quando o elemento de movimento é oposto (isto é, 180 ° de distância) a focusBearing .
    maxZ: 300, //O maior índice z que será atribuído a um elemento móvel. Isto ocorre quando o elemento móvel é a mesma orientação, como a focusBearing .
    minOpacity: 0.0, //A menor opacidade que será atribuído a um elemento móvel. Isto ocorre quando o elemento de movimento é oposto (isto é, 180 ° de distância) a focusBearing .
    maxOpacity: 1.0, // A maior opacidade que será atribuído a um elemento móvel. Isto ocorre quando o elemento móvel é a mesma orientação, como a focusBearing .
    minScale: 0.0, //O menor tamanho (em relação ao seu tamanho inicial), que será atribuído a um elemento móvel. Isto ocorre quando o elemento de movimento é oposto (isto é, 180 ° de distância) a focusBearing .
    maxScale: 0.8, //O maior tamanho (em relação ao seu tamanho inicial), que será atribuído a um elemento móvel. Isto ocorre quando o elemento móvel é a mesma orientação, como a focusBearing .
     autoplay: true, //Quando true, Roundabout avançará automaticamente os elementos que se deslocam para o próximo filho em um intervalo regular
       autoplayDuration: 4500, // O período de tempo (em milissegundos) entre animação é desencadeada quando uma rotunda de autoplay está jogando
       autoplayPauseOnHover: true, // Quando true, Roundabout vontade pausa autoplay quando o usuário move o cursor sobre o recipiente Roundabout.
       btnNext: ".next", // Um seletor jQuery de elementos de página que, quando clicado, irá acionar o Roundabout para animar o próximo elemento em movimento.
       btnPrev: ".prev", // Um seletor jQuery de elementos de página que, quando clicado, irá acionar o Roundabout para animar o elemento anterior em movimento.
       btnToggleAutoplay: ".toggle",  // Um seletor jQuery de elementos de página que, quando clicado, vai alternar a Rotunda do autoplay estado (ou iniciar ou parar).


   });
});