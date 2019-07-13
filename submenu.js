$(document).ready(function () {
    $('#sub-menu-btn').click(function (e) { 
        e.preventDefault();
        if($('#submenu').hasClass('active-submenu')){
            $('#submenu').css({animationName: 'cerrarSubMenu', animationDuration: '350ms'});
            setTimeout(function(){$('#submenu').toggleClass('active-submenu')}, 300);
        }
        else{
            $('#submenu').css({animationName: 'desplegarSubMenu', animationDuration: '350ms'});
            $('#submenu').toggleClass('active-submenu');
        }

        $('#bar-icon').toggleClass(['fa-bars', 'fa-times']);
    });
});