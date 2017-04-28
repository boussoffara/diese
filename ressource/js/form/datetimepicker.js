$(document).ready(function() {
    $('[type=\"datetime\"]').each(function(element, index) {
        $(this).datetimepicker({
            locale: $(this).data('picker_locale'),
            format: $(this).data('picker_format'),
            showTodayButton: $(this).data('picker_today_button'),
            showClear: $(this).data('picker_clear_button'),
            toolbarPlacement: $(this).data('picker_toolbar'),
            calendarWeeks: $(this).data('picker_weeks'),
            stepping: $(this).data('picker_step'),
            minDate: $(this).data('picker_min'),
            maxDate: $(this).data('picker_max'),
            useCurrent: $(this).data('picker_current'),
            disabledDates: $(this).data('picker_disabled'),
            enabledDates: $(this).data('picker_enabled'),
            icons : {
                time: 'fa fa-clock-o',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-thumb-tack',
                clear: 'fa fa-undo',
                close: 'fa fa-close'
            },
            tooltips: {
                today: 'Selectionner la date/heure d\'aujoud\'hui',
                selectTime: 'Switcher la selection date/heure',
                clear: 'Supprimer la selection',
                close: 'Fermer',
                selectMonth: 'Selectionner le mois',
                prevMonth: 'Mois précédent',
                nextMonth: 'Mois suivant',
                selectYear: 'Selectionner l\'année',
                prevYear: 'Année précédente',
                nextYear: 'Année suivante',
                selectDecade: 'Selectionner la décénie',
                prevDecade: 'Décénie précédente',
                nextDecade: 'Décénie suivante',
                prevCentury: 'Siècle précédent',
                nextCentury: 'Siècle suivant'
            }
        });
    });
    var field = $('[data-picker_max_target!=\"\"][data-picker_max_target]');
    if(field.length) {
        var date = field.data('DateTimePicker').date();
        if (date){
            var name = field.attr('name');
            var pickerName = field.data('picker_name');
            var targets_name= field.data('picker_max_target');
            $.each(targets_name, function(index, target_name) {
                var max_target = name.replace(pickerName, target_name);
                $('[name=\"'+max_target+'\"]').data('DateTimePicker').maxDate(date);
            });
        }
    }
    var field = $('[data-picker_min_target!=\"\"][data-picker_min_target]');
    if(field.length) {
        var date = field.data('DateTimePicker').date();
        if (date){
            var name = field.attr('name');
            var pickerName = field.data('picker_name');
            var targets_name= field.data('picker_min_target');
            $.each(targets_name, function(index, target_name) {
                var max_target = name.replace(pickerName, target_name);
                $('[name=\"'+max_target+'\"]').data('DateTimePicker').minDate(date);
            });
        }
    }
    $(document).on('dp.change', '[data-picker_max_target!=\"\"][data-picker_max_target]', function(e) {
        var name = $(this).attr('name');
        var pickerName = $(this).data('picker_name');
        var targets_name= $(this).data('picker_max_target');
        $.each(targets_name, function(index, target_name) {
            var max_target = name.replace(pickerName, target_name);
            $('[name=\"'+max_target+'\"]').data('DateTimePicker').maxDate(e.date);
        });
    });
    $(document).on('dp.change', '[data-picker_min_target!=\"\"][data-picker_min_target]', function(e) {
        var name = $(this).attr('name');
        var pickerName = $(this).data('picker_name');
        var targets_name= $(this).data('picker_min_target');
        $.each(targets_name, function(index, target_name) {
            var min_target = name.replace(pickerName, target_name);
            $('[name=\"'+min_target+'\"]').data('DateTimePicker').minDate(e.date);
        });
    });
});
$(document).on('fieldset-added', document, function() {
    $('[type=\"datetime\"]').each(function(element, index) {
        $(this).datetimepicker({
            locale: $(this).data('picker_locale'),
            format: $(this).data('picker_format'),
            showTodayButton: $(this).data('picker_today_button'),
            showClear: $(this).data('picker_clear_button'),
            toolbarPlacement: $(this).data('picker_toolbar'),
            calendarWeeks: $(this).data('picker_weeks'),
            stepping: $(this).data('picker_step'),
            minDate: $(this).data('picker_min'),
            maxDate: $(this).data('picker_max'),
            useCurrent: $(this).data('picker_current'),
            disabledDates: $(this).data('picker_disabled'),
            enabledDates: $(this).data('picker_enabled'),
            icons : {
                time: 'fa fa-clock-o',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-thumb-tack',
                clear: 'fa fa-undo',
                close: 'fa fa-close'
            },
            tooltips: {
                today: 'Selectionner la date/heure d\'aujoud\'hui',
                selectTime: 'Switcher la selection date/heure',
                clear: 'Supprimer la selection',
                close: 'Fermer',
                selectMonth: 'Selectionner le mois',
                prevMonth: 'Mois précédent',
                nextMonth: 'Mois suivant',
                selectYear: 'Selectionner l\'année',
                prevYear: 'Année précédente',
                nextYear: 'Année suivante',
                selectDecade: 'Selectionner la décénie',
                prevDecade: 'Décénie précédente',
                nextDecade: 'Décénie suivante',
                prevCentury: 'Siècle précédent',
                nextCentury: 'Siècle suivant'
            }
        });
    });
});
