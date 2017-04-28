$(document).ready(function() {
    if($('[data-button_add_fieldset=\"true\"]').length) {
        var button_add_fieldset = $('[data-button_add_fieldset=\"true\"]');
        var fieldsetId = button_add_fieldset.data('target');
        var target = 'fieldset#' + fieldsetId;
        if (typeof countFieldsets === 'undefined') {
            var countFieldsets = [];
        }
        if (typeof countFieldsets[fieldsetId] === 'undefined') {
            countFieldsets[fieldsetId] = $(target+' > fieldset').length;
        }
        $(document).on('click', '[data-button_add_fieldset=\"true\"]', function() {
            var fieldsetId = $(this).data('target');
            var target = 'fieldset#' + fieldsetId;
            var currentCount = countFieldsets[fieldsetId];
            countFieldsets[fieldsetId] = countFieldsets[fieldsetId]+1;
            var template = $(target+' > span').data('template');
            template = template.replace(/__index__/g, currentCount);
            $(target).append(template);
            $(document).trigger('fieldset-added') ;
         });
    }
});
