
// // Per motivi di indirizzamento di Apache le due funzioni usano un link leggermente diverso
// così da permettere diversi filepath relativi in base a dove viene chiamata la funzione.

function stampaPaginaCatalogo(id) {
    var nuovaFinestra = window.open('../sezione-clienti/coupon-generato/' + id, '_blank');
    nuovaFinestra.onload = function() {
        nuovaFinestra.print();
    };
}

function stampaPaginaProfilo(id) {
    var nuovaFinestra = window.open('./sezione-clienti/coupon-generato/' + id, '_blank');
    nuovaFinestra.onload = function() {
        nuovaFinestra.print();
    };
}