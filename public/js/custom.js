jQuery(document).ready(function($){
    /*
     * <tr> selection
     */
    $('tr.selection').click(function(ev) {
        window.location.href = $(this).attr('href');
    });
});