<?php 

include '../modelo/Presentacion.php';

$presentacion = new Presentacion();

session_start();
$id_usuario_session  = $_SESSION['usuario'];

if($_POST["funcion"]=='crear'){
    $nombre = $_POST['nombre_presentacion'];
  
    //echo 'EL NOMBRE: '.$nombre;

    $presentacion -> crear($nombre);
    //echo 'ENTRO A CREAR';
    
}

if($_POST["funcion"]=='editar'){
    $nombre = $_POST['nombre_presentacion'];
    $id_editado = $_POST['id_editado'];
    //echo 'EL NOMBRE: '.$nombre;

    $presentacion -> editar($nombre, $id_editado);
   // echo 'SI ENTRO AQUI ID:'. $id_editado;
    
}

if($_POST["funcion"]=='buscar'){
   
    $presentacion -> buscar();
    $json = array();

    foreach($presentacion->objetos as $objeto){
        $json[]= array(
            'id'=>$objeto->id_presentacion,
            'nombre'=> $objeto->nombre,
        );

    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
    
}


if($_POST['funcion']=='borrar'){
    $id = $_POST['id'];
    $presentacion -> borrar($id);
   // echo 'SI LLEGA';
}

?>