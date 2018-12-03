$(document).on('ready', funcPrincipal);

function funcPrincipal()
{
    $('#miForm1').on('submit', ejecutarAjax);
}


function ejecutarAjax(event) 
{
    var datosEnviados=
    {
        'pass' : $('#pass').val(),
        'nuevapass' : $('#nuevapass').val(),
        'confnuevapass' : $('#confnuevapass').val(),
        
    };
    $.ajax({
        type       : 'POST',
        url        : 'adminUser.php',
        data       : datosEnviados,
        dataType   : 'json',
        encode     : true

    })
    .done(function(datos) {
        //Especificamos como actuar con los datos recibidos
        if (datos.exito) {
            alert(datos.mensaje);
            //$('#miForm')[0].reset();
            //window.location="/login.html";
            location.href = "login.html";

        }
        else{

            if(datos.errores.Pass){
                alert(datos.errores.Pass);
                 $('#miForm')[0].reset(); 
            }
                    
        }
    });

    event.preventDefault();
}
