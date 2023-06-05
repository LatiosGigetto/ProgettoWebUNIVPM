// Funzione per far funzionare il carosello con l'aiuto di Bootstrap

var myCarousel = document.querySelector('#carouselExampleCaptions')
var carousel = new bootstrap.Carousel(myCarousel, {
    interval: 5000, // imposta l'intervallo di tempo tra le slide (in millisecondi)
    wrap: true, // abilita il loop delle slide
});
