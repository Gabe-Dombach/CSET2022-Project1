$(document).ready(function () {
    $('.patientOnly').css({ display: 'none' });
});
$('#roles').change(function () {
    let role = $(this).children('option').filter(':selected').text();
    if (role == 'Patient') {
        console.log('visible');
        $('.patientOnly').css({ display:'block'});
    } else {
        console.log('invisible');

        $('.patientOnly').css({ display: 'none' });
    }
});
