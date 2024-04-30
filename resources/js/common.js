import $ from 'jquery';

$(() => {

    const $delete = $('.js-delete');
    $delete.on('click', function() {
        if (confirm('削除しますか？')) {
            $(this).closest('form').trigger('submit');
        } else {
            alert('キャンセルされました');
            return false;
        }
    });


    const $pagetop = $('.js-pagetop');
    const $window = $(window);
    $pagetop.on('click', () => {
        $('html, body').animate({
            scrollTop: 0
        }, 150, 'swing');
    });
    $window.on('scroll', () => {
        if ($window.scrollTop() > 1) {
            $pagetop.fadeIn(150).css('display', 'flex');
        } else {
            $pagetop.fadeOut(300);
        }
    });

});



