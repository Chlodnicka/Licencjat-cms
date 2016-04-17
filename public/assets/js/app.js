$(document).ready( function () {
    dropdown(); 
});

function dropdown() {
    $('.dropdown h3').on('click', function (e) {
        $('.dropdown p').toggleClass('display');
        if($('.dropdown p').hasClass('display')){
            $('.dropdown i').removeClass('fa-chevron-down');
            $('.dropdown i').addClass('fa-chevron-up');
        } else {
            $('.dropdown i').removeClass('fa-chevron-up');
            $('.dropdown i').addClass('fa-chevron-down');
        }
    });
}