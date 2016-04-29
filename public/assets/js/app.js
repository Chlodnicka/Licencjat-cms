$(document).ready( function () {
    dropdown();
    dropdownLectures();
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

                $.each(data, function(index, element) {
                    model.append("<option value='"+ element.id +"'>" + element.title + "</option>");
                });
            });
    });
}