$(function () {
    $('.menu-btn, .overlay, .back-menu').on('click', function () {
        $('.sidebar').toggleClass('sidebar-active');
        $('.overlay').toggleClass('overlay-active');

    });
});
$(function () {
    $('.overlay-2, .back, .category-btn').on('click', function () {
        $('.category-menu').toggleClass('category-menu-active');
        $('.overlay-2').toggleClass('overlay-2-active');

    });
});
