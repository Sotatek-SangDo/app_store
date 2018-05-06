$(function() {
    $('#search_mini_form').each(function() {
        var self = this;
        $(this).find('input').keypress(function(e) {
            if(e.which == 10 || e.which == 13) {
                self.submit();
            }
        });
    });
    getData();

    setTimeout(function() {
        $( "#search" )
        .autocomplete({
            minLength: 0,
            source: function( request, response ) {
                var results= _.filter(JSON.parse(localStorage.getItem('products')), function(item){
                    return search(item.pro_name, request.term) || search(item.pro_sub_desc, request.term) || search(item.pro_desc, request.term);
                });
                response(results);
            },
            focus: function( event, ui ) {
                $( "#search" ).val( ui.item.pro_name );
                return false;
            },
            select: function( event, ui ) {
                $( "#search" ).val( ui.item.pro_name );
                $('#search_mini_form').submit();
                return false;
            }
        })
        .autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
            .append( "<div>" + item.pro_name + "</div>" )
            .appendTo( ul );
        };
    }, 5000);
});


var getData = function() {
    $.ajax({
        url: "/get-all",
        method: "get",
        contentType: 'application/json; charset=utf-8',
        success: function(response) {
            localStorage.setItem('products', response);
        }
    });
}
function  search(string, search) {
    return string.indexOf(search) >= 0;
}