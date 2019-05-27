$(document).ready(function () {
    $("#searchInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        var items = $(".items-searching");

        items.parent().parent().parent().hide();

        items.filter(function () {
            return $(this).text().toLowerCase().indexOf(value) === 0;
        }).parent().parent().parent().show();
    });
});