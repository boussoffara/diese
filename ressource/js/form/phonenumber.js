$(document).ready(function() {
    $('[data-phone_number=\"true\"]').inputmask('+(999) (0)9 99 99 99 99',{removeMaskOnSubmit: true});
});
$(document).on('fieldset-added', document, function() {
    $('[data-phone_number=\"true\"]').inputmask('+(999) (0)9 99 99 99 99',{removeMaskOnSubmit: true});
});