new Vue({
    el: '#logenet'
});

$('document').ready(function() {
    if ($('.datepicker').length) {
        $('.datepicker').each(function() {
            $(this).datetimepicker({
                defaultDate: $(this).data('defaultDate')
            });
            $(this).datetimepicker().trigger('dp.change');
        });
        $('#fromtime').on("dp.change", function(e) {
            $('#totime').data("DateTimePicker").minDate(e.date);
        });
    }

    $('.linked-row').click(function() {
        window.document.location = $(this).data('href');
    });

    if ($('.event-form').length) {
        $('input[type="file"]').fileinput({
            showCaption: false,
        });
    }
});
