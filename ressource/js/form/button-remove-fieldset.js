$(document).ready(function() {
    if($('[data-button_remove_fieldset=\"true\"]').length) {
        var button = $('[data-button_remove_fieldset=\"true\"]');
        var fieldsetId = button.data('target');
        button.remove();
        var target = 'fieldset#' + fieldsetId;
        var removeFieldsetButton = '<div class=\"form-group\"><div class=\"col-sm-offset-4 col-sm-8\"><button type=\"button\" data-target=\"'+fieldsetId+'\" data-button_remove_fieldset=\"true\" class=\"btn\">'+button.html()+'</button></div></div>';
        $(target+'>fieldset').append(removeFieldsetButton);
        var template = $(target+' > span').data('template');
        var templates = template.split('</fieldset>');
        templates[templates.length-2] = templates[templates.length-2] + removeFieldsetButton;
        template = templates.join('</fieldset>');
        $(target+' > span').data('template',template);

        $(document).on('click', '[data-button_remove_fieldset=\"true\"]', function() {
            var fieldsetId = $(this).data('target');
            var target = 'fieldset#' + fieldsetId;
            var currentCount = $(target+' > fieldset').length ;
            if (currentCount > 1) {
                console.log($(this).parentsUntil(target).prev());
                $(this).parentsUntil(target).remove();
            }
            else if(currentCount == 1){
                $(this).parentsUntil(target).remove();
            }
         });
        // Script to add action for the remove button on the last fieldset.
        /*$this->inlineScript()->appendScript("
            $(document).ready(function() {
                var button = $('[name=". $element->getAttribute('name') ."]');
                var fieldsetId = button.data('target');
                var target = 'fieldset#' + fieldsetId; 
                if (typeof countFieldsets === 'undefined') {
                    var countFieldsets = [];
                }
                if (typeof countFieldsets[fieldsetId] === 'undefined') {
                    countFieldsets[fieldsetId] = $(target+' > fieldset').length;
                }
                if($(target+' > fieldset').length <= 0){
                    button.hide();
                }
                else { button.show();}
            });
            $(document).bind('DOMNodeInserted', function(event) {
                var button = $('[name=". $element->getAttribute('name') ."]');
                var fieldsetId = button.data('target');
                var target = 'fieldset#' + fieldsetId; 
                if(event.target.parentNode.id == fieldsetId) {
                    if($(target+' > fieldset').length <= 0){
                        button.hide();
                    }
                    else { button.show();}
                }
            });
            $(document).bind('DOMNodeRemoved', function(event) {
                var button = $('[name=". $element->getAttribute('name') ."]');
                var fieldsetId = button.data('target');
                var target = 'fieldset#' + fieldsetId; 
                if(event.target.parentNode.id == fieldsetId) {
                    if(target+' > fieldset').length<= 0){
                        button.hide();
                    }
                    else { button.show();}
                }
            });
            $('[name=\"".$element->getAttribute('name') ."\"]').click(function() {
                var fieldsetId = $(this).data('target');
                var target = 'fieldset#' + fieldsetId;
                var currentCount = countFieldsets[fieldsetId];
                countFieldsets[fieldsetId] = countFieldsets[fieldsetId]-1;
                if (currentCount > 1) {
                    $(target+' > fieldset').last().remove();
                    $(target+'> legend').last().remove();
                }
                else if(currentCount == 1){
                    $(target+' > fieldset').last().remove();
                }
             });
        ");*/
    }
});