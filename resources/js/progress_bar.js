$(document).ready(function () {
    let progress = $('.progress-bar');
    progress.animate({
        width: '50%'
    }, 500);
    progress.animate({
        width: '100%'
    }, 500);
    setTimeout(function () {
        $('.record-list').show();
    }, 1000);
    progress.fadeOut(2000);
});


