$("#grupos").change(function()
{
    var query = $(this).val();
    console.log(query);
    if(query != '')
    {
        $.ajax({
            url: "tabla_asistencia.php",
            method: "POST",
            data: {query:query},
            success:function(data){
                $("#asistencia").html(data);
            }
            
        });
        
    }
})