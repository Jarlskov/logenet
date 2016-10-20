new Vue({
    el: '#logenet'
});

$('.datepicker').datetimepicker({
});
$('#fromtime').on("dp.change", function(e) {
    console.log(e);
    $('#totime').data("DateTimePicker").minDate(e.date);
});
$('#totime').on("dp.change", function(e) {
    $('#fromtime').data("DateTimePicker").maxDate(e.date);
});

//# sourceMappingURL=app.js.map
