$(".btnDelete").click(function (e) {
    e.preventDefault();
    var _href = $(this).attr("href");
    $("form#formDelete").attr("action", _href);
    if (confirm("Bạn có chắc muốn xoá không?")) {
        $("form#formDelete").submit();
    }
});
