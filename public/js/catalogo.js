
// Listener per aprire/chiudere la barra di ricerca nel catalogo

document.addEventListener("DOMContentLoaded", function() {
            var barradiricerca = document.getElementById("barradiricerca");
            var bottone = document.getElementById("mostrabarradiricerca");
            bottone.addEventListener("click", function() {
                if (barradiricerca.style.display === "none") {
                    barradiricerca.style.display = "flex";
                    barradiricerca.style.justifyContent = "center";
                } else {
                    barradiricerca.style.display = "none";
                }
            });
        });

