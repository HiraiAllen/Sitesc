//Jquery implementacion
$(document).ready(function () {
    function desplegarTablas()
    {
        $('#tabla-uno').toggleClass(['tabla-admin-des', 'tabla-admin']);
        $('#sub-tablas').toggleClass(['sub-tablas-rep', 'sub-tablas-active']);
    }

    $('#link-est').click(function (e) { 
        e.preventDefault();
        desplegarTablas();
    });

    $('#regresar-btn').click(function (e) { 
        e.preventDefault();
        desplegarTablas();
    });

});
