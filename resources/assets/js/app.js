$(function() {
  $(".app-container").toggleClass("expanded");
  $(".navbar-expand-toggle").click(function() {
    $(".app-container").toggleClass("expanded");
    return $(".navbar-expand-toggle").toggleClass("fa-rotate-90");
  });
  return $(".navbar-right-expand-toggle").click(function() {
    $(".navbar-right").toggleClass("expanded");
    return $(".navbar-right-expand-toggle").toggleClass("fa-rotate-90");
  });
});

$(function() {
  return $(".side-menu .nav .dropdown").on('show.bs.collapse', function() {
    return $(".side-menu .nav .dropdown .collapse").collapse('hide');
  });
});

$('.alert, hr.mensagem').not('.alert-important').delay(3000).slideUp(300);

function formatPhone( input ){
    if( input == null || input.length == 0 ){
        return '';
    } else{
        switch (input.length) {
            case 8:
                return input.slice(0,4) + '-' + input.slice(4,8);
            case 9:
                return input.slice(0,5) + '-' + input.slice(5,9);
            case 10:
                return '(' + input.slice(0,2) + ') ' + input.slice(2,6) + '-' + input.slice(6,10);
            case 11:
                return '(' + input.slice(0,2) + ') ' + input.slice(2,7) + '-' + input.slice(7,11);
            default:
                return input;
        }
    }
}
