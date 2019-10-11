$(function () {
    // Datepicker
    if ($('input[type="datetimepicker"]').length > 0) {
        $('input[type="datetimepicker"]').daterangepicker({
            timePicker: true,
            timePicker24Hour: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                // format: 'M/DD hh:mm A' --deited by reza
                format: 'YYYY-MM-DD'
            }
        });
    }
});