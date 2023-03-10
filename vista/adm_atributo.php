<?php  
session_start();

if($_SESSION['us_tipo']==1 || $_SESSION['us_tipo'] ==3){
  include_once 'layouts/header.php';
?>


<title>Adm |Catalogo</title>

<?php include_once 'layouts/nav.php'; ?>

  <div class="modal fade" id="cambiologo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cambiar Logo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <img  id="logoactual" src="../img/lab/avatar.png" class="profile-user-img img-fluid img-circle v">
              </div>
             <div class="text-center">
              <b id="nombre_logo">
              
              </b>
            </div> 
            <div class="alert alert-success text-center" id="edit" style="display:none">
                          <span><i class="fas fa-check m-2">Logo actualizado</i></span>
                        </div>
                        <div class="alert alert-danger text-center" id="noedit" style="display:none">
                          <span><i class="fas fa-times m-2">Formato no Soportado </i></span>
                        </div>
            <form method="post" id="form-logo"  enctype="multipart/form-data">
              <div class="input-group mb-3 ml-5 mt-2">
                 <input type="file" name="photo" id="photo" class="input-group">
                 <input type="hidden" name="funcion" id="funcion" >
                 <input type="hidden" name="id_logo_lab" id="id_logo_lab" >
                  
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

 <!--Crear laboratorio-->
    <div class="modal fade" id="crearlaboratorio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="card card-success">
             <div class="card-header">
                 <h3 class="card-title">Crear Laboratorio</h3>
                 <button data-dismiss="modal" arial-label="close" class="close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="card-body">

                  <div class="alert alert-success text-center" id="add-laboratorio" style="display:none">
                    <span><i class="fas fa-check m-2">Laboratorio Registrado</i></span>
                  </div>
                  
                  <div class="alert alert-success text-center" id="edit-lab" style="display:none">
                    <span><i class="fas fa-check m-2">Laboratorio Actualizado</i></span>
                  </div>
                  <div class="alert alert-danger text-center" id="noadd-laboratorio" style="display:none">
                    <span><i class="fas fa-times m-2">Error. </i></span>
                  </div>
                 <form id="form-crear-laboratorio">
                    <div class="form-group">
                         <label for="nombre-laboratorio">Nombre Laboratorio</label>
                         <input id="nombre-laboratorio" type="text" class="form-control" placeholder="Ingrese nombre" required>
                         <input type="hidden" name="id_editar_lab" id="id_editar_lab">
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

<!--Crear tipo-->
    <div class="modal fade" id="creartipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="card card-success">
             <div class="card-header">
                 <h3 class="card-title">Crear Tipo</h3>
                 <button data-dismiss="modal" arial-label="close" class="close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="card-body">

                  <div class="alert alert-success text-center" id="add-tipo" style="display:none">
                    <span><i class="fas fa-check m-2">Tipo Registrado</i></span>
                  </div>
                  
                  <div class="alert alert-success text-center" id="edit-tipo" style="display:none">
                    <span><i class="fas fa-check m-2">Tipo Actualizado</i></span>
                  </div>
                  <div class="alert alert-danger text-center" id="noadd-tipo" style="display:none">
                    <span><i class="fas fa-times m-2">Error. </i></span>
                  </div>
                 <form id="form-crear-tipo">
                    <div class="form-group">
                         <label for="nombre">Nombre Tipo</label>
                         <input id="nombre-tipo" type="text" class="form-control" placeholder="Ingrese nombre" required>
                          <input type="hidden" id="id_editar_tip">
                    </div>
                   
             </div>
             <div class="card-footer">
                <button type="submit" class="btn bg-gradient-primary float-right m-1">Crear</button>
                <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Guardar</button>
                </form>
             </div>
         </div>


          
         
          
        </div>
      </div>
    </div>

<!--Crear presentacion-->
    <div class="modal fade" id="crearpresentacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="card card-success">
             <div class="card-header">
                 <h3 class="card-title">Crear Presentacion</h3>
                 <button data-dismiss="modal" arial-label="close" class="close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="card-body">

                 <div class="alert alert-success text-center" id="add-pre" style="display:none">
                    <span><i class="fas fa-check m-2">Presentacion Registrado</i></span>
                  </div>
                  
                  <div class="alert alert-success text-center" id="edit-pre" style="display:none">
                    <span><i class="fas fa-check m-2">Presentacion Actualizada</i></span>
                  </div>
                  <div class="alert alert-danger text-center" id="noadd-pre" style="display:none">
                    <span><i class="fas fa-times m-2">Error. </i></span>
                  </div>
                 <form id="form-crear-presentacion">
                    <div class="form-group">
                         <label for="nombre">Nombre Presentacion</label>
                         <input id="nombre-presentacion" type="text" class="form-control" placeholder="Ingrese nombre" required>
                         <input type="hidden" id="id_editar_pre">
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
            <h1>Gestion atributos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gestion atributos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a href="#laboratorio" class="nav-link active" data-toggle="tab">Laboratorio</a></li>
                                <li class="nav-item"><a href="#tipo" class="nav-link" data-toggle="tab">Tipo</a></li>
                                <li class="nav-item"><a href="#presentacion" class="nav-link" data-toggle="tab">Presentacion</a></li>
                            </ul>
                        </div>
                        <div class="card-body p-0">
                            <div class="tab-content" >
                                <div class="tab-pane active"  id="laboratorio">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title">Busca laboratorio <button type="button" data-toggle="modal" data-target="#crearlaboratorio" class="btn bg-gradient-primary btn-sm m-2">Crear Laboratorio</button></div>
                                            <div class="input-group">
                                                <input id="buscar-laboratorio" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 table-responsive">
                                          <table class="table table-hover text-nowrap">
                                            <thead class="table-success">
                                              <tr>
                                                <th>Accion</th>
                                                
                                                <th>Logo</th>
                                                <th>Laboratorio</th>
                                              
                                              </tr>
                                            </thead>
                                            <tbody  id="laboratorios" class="table-active">

                                            </tbody>
                                          </table>
                                        </div>
                                        <div class="card-fotter"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tipo">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title">Busca tipo<button type="button" data-toggle="modal" data-target="#creartipo" class="btn bg-gradient-primary btn-sm m-2">Crear Tipo</button></div>
                                            <div class="input-group">
                                                <input id="buscar-tipo" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 table-responsive">
                                          <table class="table table-hover text-nowrap">
                                            <thead class="table-success">
                                              <tr>
                                                <th>Accion</th>
                                                <th>Tipos</th>
                                              
                                              </tr>
                                            </thead>
                                            <tbody  id="tipos" class="table-active">

                                            </tbody>
                                          </table>
                                        </div>
                                        <div class="card-fotter"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="presentacion">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title">Busca presentacion<button type="button" data-toggle="modal" data-target="#crearpresentacion" class="btn bg-gradient-primary btn-sm m-2">Crear Presentacion</button></div>
                                            <div class="input-group">
                                                <input id="buscar-presentacion" type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 table-responsive">
                                          <table class="table table-hover text-nowrap">
                                            <thead class="table-success">
                                              <tr>
                                                <th>Accion</th>
                                                <th>Tipos</th>
                                              
                                              </tr>
                                            </thead>
                                            <tbody  id="presentaciones" class="table-active">

                                            </tbody>
                                          </table>
                                        </div>
                                        <div class="card-fotter"></div>
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                        <div class="card-footer">
                            
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
<script src="../js/Laboratorio.js"></script>
<script src="../js/Tipo.js"></script>
<script src="../js/Presentacion.js"></script>
