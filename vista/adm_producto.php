<?php  
session_start();

if($_SESSION['us_tipo']==1 || $_SESSION['us_tipo'] ==3  ){
  include_once 'layouts/header.php';
?>


<title>Adm |Editar Datos Personales</title>

<?php include_once 'layouts/nav.php'; ?>

    
    

 <!-- Modal CONFIRMACION -->
 <div class="modal fade" id="confirmar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cambiar Accion</h5>
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
            <span class="text">Necesitamos su password para continuar</span>
            <div class="alert alert-success text-center" id="confirmar_pass" style="display:none">
              <span><i class="fas fa-check m-2">Se modifico al Usuario</i></span>
            </div>
            <div class="alert alert-danger text-center" id="rechazar_pass" style="display:none">
              <span><i class="fas fa-times m-2">Error al actualizar </i></span>
            </div>
            <form id="form-confirmar">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                  </div>
                  <input type="password" id="oldpass" class="form-control" placeholder="Ingrese password actual" requerid>
                  <input type="hidden" id="id_user" >
                  <input type="hidden" id="funcion" >
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

    <!--REGISTRAR USUARIO-->
    <div class="modal fade" id="crearusuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="card card-success">
             <div class="card-header">
                 <h3 class="card-title">Crear Usuario</h3>
                 <button data-dismiss="modal" arial-label="close" class="close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="card-body">

                  <div class="alert alert-success text-center" id="add" style="display:none">
                    <span><i class="fas fa-check m-2">Usuario Registrado</i></span>
                  </div>
                  <div class="alert alert-danger text-center" id="noadd" style="display:none">
                    <span><i class="fas fa-times m-2">Error. </i></span>
                  </div>
                 <form id="form-crear">
                    <div class="form-group">
                         <label for="nombre">Nombres</label>
                         <input id="nombre" type="text" class="form-control" placeholder="Ingrese nombre" required>
                    </div>
                    <div class="form-group">
                         <label for="apellido">Apellidos</label>
                         <input id="apellido" type="text" class="form-control" placeholder="Ingrese Apellido" required>
                    </div>
                    <div class="form-group">
                         <label for="edad">Nacimiento</label>
                         <input id="edad" type="date" class="form-control" placeholder="Ingrese Nacimiento" required>
                    </div>
                    <div class="form-group">
                         <label for="dpi">DPI</label>
                         <input id="dpi" type="text" class="form-control" placeholder="Ingrese DPI" required>
                    </div>
                    <div class="form-group">
                         <label for="pass">Password</label>
                         <input id="pass" type="password" class="form-control" placeholder="Ingrese password" required>
                    </div>
                
             </div>
             <div class="card-footer">
                <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
                <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                </form>
             </div>
         </div>


          
         
          
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
            <h1>Gestion Usuarios
            <button type="button" id="button-crear" data-toggle="modal" data-target="#crearusuario" class="btn bg-gradient-primary ml-2">Crear Usuarios</button></h1>
            <input type="hidden" id="tipo_usuario" value="<?php echo $_SESSION['us_tipo'] ?>"> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="adm_catalogo.php">Home</a></li>
              <li class="breadcrumb-item active">Gestion Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section>
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Buscar Usuario</h3>
                    <div class="input-group">
                        <input type="text" id="buscar" class="form-control float-left" placeholder="Ingrese nombre de usuario">
                        <div class="input-group-append">
                            <button class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="usuarios"class="row d-flex align-items-stretch">

                    </div>

                </div>
                <div class="card-footer">

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
<script src="../js/Gestion_usuario.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script>

