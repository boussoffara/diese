$(document).ready(function() {
    $('select.default.form-control').select2({
        width: '100%',
    });
});
$(document).on('fieldset-added', document, function() {
    $('select.default.form-control').select2({
        width: '100%',
    });
});