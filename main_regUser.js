$(document).on('ready', funcPrincipal);

function funcPrincipal()
{
    $('#miForm').on('submit', ejecutarAjax);
}


function ejecutarAjax(event) 
{
    var datosEnviados=
    {
        'usuario' : $('#txtUsuario').val(),
        'contra' : $('#txtPassword').val(),

        'contraConf' : $('#txtConfPassword').val(),
        'nombre' : $('#txtNombre').val(),
        'last' : $('#txtApellido').val(),
        'direccion' : $('#txtDireccion').val(),
        'telefono' : $('#txtTelefono').val(),
        'correo' : $('#txtCorreo').val(),
    };
    $.ajax({
        type       : 'POST',
        url        : 'registrarUsuario.php',
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

        }else{

            if(datos.errores.usuExiste){
                alert(datos.errores.usuExiste);
                
            }
            if(datos.errores.confpass){
                alert(datos.errores.confpass);
            }
            if(datos.errores.emailInvalido){
                alert(datos.errores.emailInvalido);
            }
              $('#miForm')[0].reset(); 
               
        }
    });

    event.preventDefault();
}
