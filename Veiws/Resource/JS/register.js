$(document).ready(function () {
    $('.patientOnly').css({ visibility: 'hidden' });
});
$('#roles').change(function () {
    let role = $(this).children('option').filter(':selected').text();
    if (role == 'Patient') {
        console.log('visible');
        $('.patientOnly').css({ visibility: 'visible' });
    } else {
        console.log('invisible');

        $('.patientOnly').css({ visibility: 'hidden' });
    }
});
