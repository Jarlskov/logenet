/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));

new Vue({
    el: '#logenet'
});

$.material.init();

$('document').ready(function() {
    if ($('.datepicker').length) {
        $('.datepicker').each(function() {
            $(this).datetimepicker({
                defaultDate: $(this).data('defaultDate') ? $(this).data('defaultDate') : new Date()
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
