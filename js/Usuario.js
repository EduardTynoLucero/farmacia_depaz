

$(document).ready(function() {
   // let usuario = document.getElementById("id_usuario");
    var funcion ='';
    var edit = false;
    var id_usuario = $('#id_usuario').val();
    console.log("EL ID DEL USUARIO ES: "+id_usuario);
   
    buscar_usuario(id_usuario);

    function buscar_usuario(dato){
        funcion = 'buscar_usuario';
        $.post('../controlador/UsuarioController.php',{dato, funcion},(response)=>{
            //console.log(response);
            let nombre = '';
            let apellidos = '';
            let edad = '';
            let dpi = '';
            let tipo = '';
            let telefono = '';
            let residencia = '';
            let correo = '';
            let sexo = '';
            let adicional = '';
            let avatar = '';
            const usuario = JSON.parse(response);

            nombre += `${usuario.nombre}`;
            apellidos += `${usuario.apellidos}`;
            edad += `${usuario.edad}`;
            dpi += `${usuario.dpi}`;

            if(usuario.tipo == 'ROOT'){
                tipo += `<h1 class="badge badge-danger">${usuario.tipo}</h1>`;
              }
              if(usuario.tipo == 'ADMINISTRADOR'){
                tipo += `<h1 class="badge badge-warning">${usuario.tipo}</h1>`;
              }
              if(usuario.tipo_usuario == 'TECNICO'){
                tipo+= `<h1 class="badge badge-info">${usuario.tipo}</h1>`;
              }
            telefono += `${usuario.telefono}`;
            residencia += `${usuario.residencia}`;
            correo += `${usuario.correo}`;
            sexo += `${usuario.sexo}`;
            adicional += `${usuario.adicional}`;
            avatar += `${usuario.avatar}`;

            $('#nombre_us').html(nombre);
            $('#apellido_us').html(apellidos);
            $('#edad').html(edad);
            $('#dpi_us').html(dpi);
            $('#us_tipo').html(tipo);
            $('#telefono_us').html(telefono);
            $('#residencia_us').html(residencia);
            $('#correo_us').html(correo);
            $('#sexo_us').html(sexo);
            $('#adicional_us').html(adicional);
            $('#avatar4').attr('src',avatar);
            $('#avatar3').attr('src',avatar);
            $('#avatar2').attr('src',avatar);
            $('#avatar1').attr('src',avatar);


       });
    }

    $(document).on('click','.edit',(e)=>{
        funcion ='capturar_datos';
        edit = true;
        $.post('../controlador/UsuarioController.php',{funcion, id_usuario},(response)=>{
            console.log(response);
            const usuario = JSON.parse(response);
            $('#telefono').val(usuario.telefono);
            $('#residencia').val(usuario.residencia);
            $('#correo').val(usuario.correo);
            $('#sexo').val(usuario.sexo);
            $('#adicional').val(usuario.adicional);

        })
    });

    $('#form-usuario').submit(e=>{
        if(edit==true){
            let telefono = $('#telefono').val();
            let residencia = $('#residencia').val();
            let correo = $('#correo').val();
            let sexo = $('#sexo').val();
            let adicional = $('#adicional').val();

            funcion = 'editar_usuario';
            $.post('../controlador/UsuarioController.php',{id_usuario, funcion, telefono, residencia, correo, sexo, adicional},(response)=>{
                if(response=='editado'){
                    $('#editado').hide('slow');
                    $('#editado').show(1000);
                    $('#editado').hide(2000);
                    $('#form-usuario').trigger('reset');
                }
                edit = false;
                buscar_usuario(id_usuario);
            })
            console.log("SI ESTA EDITADO");
        }else{
            $('#noeditado').hide('slow');
            $('#noeditado').show(1000);
            $('#noeditado').hide(2000);
            $('#form-usuario').trigger('reset');
            console.log("NO ESTA EDITADO")
        }
        e.preventDefault();
    })

    $('#form-pass').submit(e=>{
        let oldpass = $('#oldpass').val();
        let newpass = $('#newpass').val();
       // console.log("el oldpass"+oldpass +" newpass"+newpass);
      

        funcion ='cambiar_contra';

        if(oldpass !='' && newpass !=''){
            $.post('../controlador/UsuarioController.php',{id_usuario, funcion, oldpass, newpass},(response)=>{
                // console.log("LA RESPUESTA ES: "+response);
                  if(response.trim()=='update'){
                      $('#update').hide('slow');
                      $('#update').show(1000);
                      $('#update').hide(2000);
                      $('#form-pass').trigger('reset');
                     // console.log("ENTRA AL IF");
                  }else{
          
                      $('#noupdate').hide('slow');
                      $('#noupdate').show(1000);
                      $('#noupdate').hide(2000);
                    
                    $('#form-pass').trigger('reset');
                      //onsole.log("NO ENTRA AL IF");
                  }
              });
        }else{
        
                alert("Los campos estas vacíos");
           
        }
       

        e.preventDefault();
    });

    $('#form-photo').submit(e=>{


       
        /* var form_data = new FormData();
        var file_data = $("#photo").prop("files")[0];

        form_data.append("photo", file_data);
        form_data.append("funcion", $("#funcion").val());
        



        $.ajax({

        
           
            
            cache: false,
            contentType: false,
            data: form_data,
            dataType: 'JSON',
            enctype: 'multipart/form-data',
            processData: false,
            method: "POST",
            url: "../controlador/UsuarioController.php",
            success: function (data) {

               // console.log(data);
            }

        }); */



        
        let formData = new FormData($('#form-photo')[0]);  

        $.ajax({
            url:'../controlador/UsuarioController.php',
            type: 'POST',
            data : formData,
            cache : false,
            processData: false,
            contentType: false
        }).done(function(response){
           console.log("LA RESPUESTA ES: "+response);
           const json = JSON.parse(response);
           if(json.alert == 'edit'){
            $('#avatar2').attr('src', json.ruta);
            $('#update2').hide('slow');
            $('#update2').show(1000);
            $('#update2').hide(2000);
            $('#form-photo').trigger('reset');
            buscar_usuario(id_usuario);
           }else{
            $('#noupdate2').hide('slow');
            $('#noupdate2').show(1000);
            $('#noupdate2').hide(2000);
            $('#form-photo').trigger('reset');
           }
          
           //$('#avatar2').attr('src',json.ruta);
          
     
        });

     //  console.log("LA FORMA ES: "+JSON.stringify($('#form-photo')[0]));
 
       e.preventDefault();
    })


    
})

