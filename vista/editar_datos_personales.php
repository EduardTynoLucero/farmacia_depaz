<?php  
session_start();

if($_SESSION['us_tipo']==1 || $_SESSION['us_tipo'] ==3){
  include_once 'layouts/header.php';
?>


<title>Adm |Editar Datos Personales</title>

<?php include_once 'layouts/nav.php'; ?>

    
    <!-- Modal -->
    <div class="modal fade" id="cambiocontra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cambiar Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <img id="avatar2" src="../img/avatar.png" class="profile-user-img img-fluid img-circle v">
            </div>
            <div class="text-center">
              <b>
                <?php echo $_SESSION['nombre_us']?>
              </b>
            </div>
            <div class="alert alert-success text-center" id="update" style="display:none">
                          <span><i class="fas fa-check m-2">Password actualizado</i></span>
                        </div>
                        <div class="alert alert-danger text-center" id="noupdate" style="display:none">
                          <span><i class="fas fa-times m-2">passsword incorrecto </i></span>
                        </div>
            <form id="form-pass">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                  </div>
                  <input type="password" id="oldpass" class="form-control" placeholder="Ingrese password actual" requerid>

                  
              </div>
            
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" id="newpass" class="form-control" placeholder="Ingrese password nuevo" requerid>
              </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn bg-gradient-primary">Guardar</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!--CAMBIO FOTO MODAL -->
    <div class="modal fade" id="cambiophoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cambiar Avatar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <img  id="avatar1" src="../img/avatar.png" class="profile-user-img img-fluid img-circle v">
              </div>
             <div class="text-center">
              <b>
                <?php echo $_SESSION['nombre_us']?>
              </b>
            </div> 
            <div class="alert alert-success text-center" id="update2" style="display:none">
                          <span><i class="fas fa-check m-2">Avatar actualizado</i></span>
                        </div>
                        <div class="alert alert-danger text-center" id="noupdate2" style="display:none">
                          <span><i class="fas fa-times m-2">Formato no Soportado </i></span>
                        </div>
            <form method="post" id="form-photo"  enctype="multipart/form-data">
              <div class="input-group mb-3 ml-5 mt-2">
                 <input type="file" name="photo" id="photo" class="input-group">
                 <input type="hidden" name="funcion" id="funcion" value="cambiar_foto">
                  
              </div>

              <!-- <div class="card card-user " >
                <div class="card-body" class="input-group mb-3 ml-5 mt-2">
                  <div id="load_img">
                     <div class="input-group mb-3 ml-3 mt-2">
                          <input type="hidden" name="imagen_perfil" id="imagen_perfil">
                          <img id="imagen_perfil_img"  width="100%" src="../img/avatar.png" class="profile-user-img img-fluid img-circle v" alt="Imagen de Perfil">
                        </div>
                            <span class="btn btn-outline-secondary btn-file" style="width: 100%; margin-top: 5px; mb-3; ml-3; mt-2">
                              
                           
                              Imagen Perfil <input type="file" name="file_one" id="file_one"  onchange="subir_foto_perfil(this)">
                            
                            </span>
                            <div class="text-center">
                              <b>
                                <?php echo $_SESSION['nombre_us']?>
                              </b>
                            </div>
                  </div>
                </div>
              </div> -->
              
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn bg-gradient-primary">Guardar</button>
    
          </div>
          </form>
          
        </div>
      </div>
    </div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Datos Personales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
              <li class="breadcrumb-item active">Datos Personales</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-success card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img id="avatar3"src="../img/avatar.png" class="profile-user-img img-fluid img-circle">
                               
                            </div>
                            <div class="text-center mt-1">
                              <button type="button" data-toggle="modal" data-target="#cambiophoto" class="btn btn-primary btn-sm">Cambiar avatar</button>
                            </div>
                            <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['usuario'];?>">
                            <h3 id="nombre_us" class="profile-username tex-center text-success">Nombre</h3>
                            <p id="apellido_us" class="text-muted text-center"></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b style="color:#0B7300">Edad</b><a id="edad" class="float-right"></a>
                                    </li>

                                    <li class="list-group-item">
                                        <b style="color:#0B7300">DPI:</b><a id="dpi_us" class="float-right"></a>
                                    </li>

                                    <li class="list-group-item">
                                        <b style="color:#0B7300">Tipo Usuario:</b>
                                        <span id="us_tipo" class="float-right"></span>
                                    </li>
                                    <button data-toggle="modal" data-target="#cambiocontra" type="button" class="btn btn-block btn-outline-warning btn-sm">Cambiar Password</button>
                                </ul>
                        </div>
                    </div>

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Sobre Mi</h3>
                        </div>
                        <div class="card-body">
                            <strong style="color:#0B7300">
                                <i class="fas fa-phone mr-1"></i>Telefono
                            </strong>
                            <p id="telefono_us" class="text-muted"></p>
                            <strong style="color:#0B7300">
                            <i class="fas fa-map-marker-alt mr-1"></i>Residencia
                            </strong>
                            <p id="residencia_us" class="text-muted"></p>
                            <strong style="color:#0B7300">
                            <i class="fas fa-at mr-1"></i>Correo
                            </strong>
                            <p id="correo_us" class="text-muted"></p>
                            <strong style="color:#0B7300">
                            <i class="fas fa-smile-wink mr-1"></i>Sexo
                            </strong>
                            <p id="sexo_us" class="text-muted"></p>
                            <strong style="color:#0B7300">
                            <i class="fas fa-pencil-alt mr-1"></i>Informacion Adicional
                            </strong>
                            <p id="adicional_us" class="text-muted"></p>
                            <button class="edit btn btn-bloc bg-gradient-danger">Editar</button>
                        </div>
                        <div class="card-footer">
                          <p class="text-muted">Clic en boton si desea editar</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card card-sucess">
                      <div class="card-header">
                          <h3 class="card-title">Editar Datos Personales</h3>
                      </div>
                      <div class="card-body">
                        <div class="alert alert-success text-center" id="editado" style="display:none">
                          <span><i class="fas fa-check m-1"> Editado</i></span>
                        </div>
                        <div class="alert alert-danger text-center" id="noeditado" style="display:none">
                          <span><i class="fas fa-times m-1"> Edicion Deshabilitada</i></span>
                        </div>
                        <form id="form-usuario" class="form-horizontal">
                          <div class="form-group row">
                            <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                               <input type="number" id="telefono" class="form-control">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="residencia" class="col-sm-2 col-form-label">Residencia</label>
                            <div class="col-sm-10">
                               <input type="text" id="residencia" class="form-control">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                            <div class="col-sm-10">
                               <input type="text" id="correo" class="form-control">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
                            <div class="col-sm-10">
                               <input type="text" id="sexo" class="form-control">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="adicional" class="col-sm-2 col-form-label">Informacion Adional</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="adicional" cols="30" rows="10"></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10 float-right">
                                  <button class="btn btn-block btn-outline-success">Guardar</button>
                              </div>
                          </div>
                        </form>

                      </div>
                      <div class="card-footer">
                          <p class="text-muted">Cuidado con ingregar datos Erroneos</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
  
  include_once 'layouts/footer.php';
  ?>

<?php 
}else{
    header("Location: ../index.php");
}



?>
<script src="../js/Usuario.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script>

function subir_foto_perfil(input) {
        $("#load_img").text('Cargando...');
        let file = input.files[0];
        let inputFileImage = file.name;
        //console.log("LEYENDO EL FILE"+ document.getElementById("file_one"));
        console.log("EL FILE SELEC ES: "+ inputFileImage);
    
        var data = new FormData();
        data.append('file_one', file);
        data.append('field', 'imagen_perfil');

       // console.log("LA FORMA ES: "+JSON.stringify($('#form-photo')[0])); 

        $.ajax({
            type: "POST", 
            url: "../controlador/Upload_image.php", 
            data: data, 
            contentType: false, 
            cache: false,
            processData: false, 
            success: function(data) 
            {
                $("#load_img").html(data);
             
            }
         });

         $('#form-photo').submit(e=>{
              e.preventDefault();
              //console.log("EL NOMBRE DE LA FOTO ES:"+inputFileImage)
              funcion ='cambiar_foto';

              $.post('../controlador/UsuarioController.php',{ funcion,inputFileImage},(response)=>{
                //const respuesta = JSON.parse(response);
              });
       
      
        });
  }


  
 


</script>