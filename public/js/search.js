$(function() {
    $('#search_mini_form').each(function() {
        var self = this;
        $(this).find('input').keypress(function(e) {
            if(e.which == 10 || e.which == 13) {
                self.submit();
            }
        });
    });
})