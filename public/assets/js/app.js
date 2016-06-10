$(document).ready( function () {
    dropdown();
    dropdownLectures();
    dropdown_admin();
    menu();
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
function dropdownLectures() {
    $( "select[name='courses']" ).change(function () {
        $.get("/api/dropdown",
            { courses: $(this).val() },
            function(data) {
                var model = $("select[name='lectures']");
                model.empty();
                model.append("<option value='0'>Brak wykładu</option>");
                $.each(data, function(index, element) {
                    model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                });
            });
    });
}

function dropdown_admin() {
    $('#side-menu .dropdown').on('click', function (e) {
        if(!($(e.target).hasClass('side-item'))){
            $('#side-menu .dropdown > ul').toggleClass('display');
        }
    });
}

function menu() {
    $('.menu-button').on('click', function (e) {
        if(!($(e.target).hasClass('side-item'))){
            $('.main-menu').toggleClass('display');
        }
    });
}