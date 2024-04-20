import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;


$(function(){
    $('.js-delete').on('click', function(){
        if(confirm('削除しますか？')) {
            $(this).closest('form').trigger('submit');
        } else {
            alert('キャンセルされました');
            return false;
        }
    });
});