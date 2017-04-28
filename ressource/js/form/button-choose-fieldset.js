$(document).ready(function() {
    if($('[data-button_choose_fieldset=\"true\"]').length) {
        var button = $('[data-button_choose_fieldset=\"true\"]');
        var defaultChoice = button.data('default_choice');
        var alternativeChoice = button.data('alternative_choice');
        var defaultLabel = button.data('default_label');
        var alternativeLabel = button.data('alternative_label');
        var defaultChosen = true;
        button.text(defaultLabel);
        $.each(alternativeChoice, function(index, fieldsetId) {
            var target = 'fieldset#' + fieldsetId;
            $(target+' > fieldset').remove();
            $(target+'> legend').hide();
        });
        $(document).on('click', '[data-button_choose_fieldset=\"true\"]', function() {
            var button = $(this);
            var defaultChoice = button.data('default_choice');
            var alternativeChoice = button.data('alternative_choice');
            var defaultLabel = button.data('default_label');
            var alternativeLabel = button.data('alternative_label');
            var defaultChosen = true;
            $.each(defaultChoice, function(index, fieldsetId) {
                var target = 'fieldset#' + fieldsetId;
                var currentCount = $(target+' > fieldset').length 
                if(currentCount == 0) {
                    defaultChosen = false;
                }
            });
            if (defaultChosen) {
                $(this).text(alternativeLabel);
                $.each(defaultChoice, function(index, fieldsetId) {
                    var target = 'fieldset#' + fieldsetId;
                    $(target+' > fieldset').remove();
                    $(target+'> legend').hide();
                });
                $.each(alternativeChoice, function(index, fieldsetId) {
                    var target = 'fieldset#' + fieldsetId;
                    var template = $(target+' > span').data('template');
                    template = template.replace(/__index__/g, 0);
                    $(target+'> legend').show();
                    $(target).append(template);
                });
            }
            else {
                $(this).text(defaultLabel);
                $.each(defaultChoice, function(index, fieldsetId) {
                    var target = 'fieldset#' + fieldsetId;
                    var template = $(target+' > span').data('template');
                    template = template.replace(/__index__/g, 0);
                    $(target+'> legend').show();
                    $(target).append(template);
                });
                $.each(alternativeChoice, function(index, fieldsetId) {
                    var target = 'fieldset#' + fieldsetId;
                    $(target+' > fieldset').remove();
                    $(target+'> legend').hide();
                });
            }
            $(document).trigger('fieldset-added') ;                        
        });
    }
});