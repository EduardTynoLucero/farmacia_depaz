<?php 

include '../modelo/Tipo.php';

$tipo = new Tipo();

session_start();
$id_usuario_session  = $_SESSION['usuario'];

if($_POST["funcion"]=='crear'){
    $nombre = $_POST['nombre_tipo'];
  
    //echo 'EL NOMBRE: '.$nombre;

    $tipo -> crear($nombre);
    //echo 'ENTRO A CREAR';
    
}

if($_POST["funcion"]=='editar'){
    $nombre = $_POST['nombre_tipo'];
    $id_editado = $_POST['id_editado'];
    //echo 'EL NOMBRE: '.$nombre;

    $tipo -> editar($nombre, $id_editado);
   // echo 'SI ENTRO AQUI ID:'. $id_editado;
    
}

if($_POST["funcion"]=='buscar'){
   
    $tipo -> buscar();
    $json = array();

    foreach($tipo->objetos as $objeto){
        $json[]= array(
            'id'=>$objeto->id_tipo_prod,
            'nombre'=> $objeto->nombre,
        );

    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
    
}


if($_POST['funcion']=='borrar'){
    $id = $_POST['id'];
    $tipo -> borrar($id);
   // echo 'SI LLEGA';
}

?>