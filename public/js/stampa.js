function stampaPagina(id) {
    var nuovaFinestra = window.open('/sezione-clienti/coupon-generato/' + id, '_blank');
    nuovaFinestra.onload = function() {
        nuovaFinestra.print();
    };
}
