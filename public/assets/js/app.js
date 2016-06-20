$(document).ready( function () {
    dropdown();
    dropdownLectures();
    dropdown_admin();
    menu();
    //on_change();
});

function dropdown() {
    $('.exercise .dropdown h3').on('click', function (e) {
        $('.dropdown .drop').toggleClass('display');
        if($('.dropdown .drop').hasClass('display')){
            $('.exercise .dropdown i').removeClass('fa-chevron-down');
            $('.exercise .dropdown i').addClass('fa-chevron-up');
        } else {
            $('.exercise .dropdown i').removeClass('fa-chevron-up');
            $('.exercise .dropdown i').addClass('fa-chevron-down');
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

function on_change() {
    $('input:not([type="submit"])').on('change', function(){
            $(window).bind('beforeunload', function () {
                return 'Are you sure you want to leave?';
            });
    });
}