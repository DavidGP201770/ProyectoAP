$(document).on('ready', funcPrincipal);

function funcPrincipal()
{
    $('#miForm').on('submit', ejecutarAjax);
}


function ejecutarAjax(event) 
{
    var datosEnviados=
    {
        'usuario' : $('#txtUsu').val(),
        'contra' : $('#txtCont').val(),
    };
    $.ajax({
        type       : 'POST',
        url        : 'login.php',
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
            location.href = "administracionusuarios.php";

        }else if(datos.exito2){
            alert(datos.mensaje2);
            //$('#miForm')[0].reset();
            //window.location="/login.html";
            location.href = "index.html";

        }
        else{

            if(datos.errores.PassUsu){
                alert(datos.errores.PassUsu);
                 $('#miForm')[0].reset(); 
            }
                    
        }
    });

    event.preventDefault();
}
