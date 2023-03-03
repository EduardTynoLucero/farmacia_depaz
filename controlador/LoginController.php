<?php 
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
include_once '../modelo/Usuario.php';
session_start();

$user = $_POST['user'];
$pass = $_POST['pass']; 

/* echo 'USUARIO: '. $user;
echo 'PASSWORD: '. $pass;
 */

$usuario = new Usuario();


/* foreach($usuario-> objetos as $objeto){
print_r($objeto);

}
 */

 if(!empty($_SESSION['us_tipo'])){
  //session_destroy();
  //phpinfo();
  //echo 'entrando en el if'.$_SESSION['us_tipo'];

    switch($_SESSION['us_tipo']){
        case 1:
          header('Location: ../vista/adm_catalogo.php');
          break;
      
        case 2:
          header('Location: ../vista/tec_catalogo.php');
         // header('Location: ../vista/adm_catalogo56.php');
          break;

        case 3:
            header('Location: ../vista/adm_catalogo.php');
           // header('Location: ../vista/adm_catalogo56.php');
            break;
      }
 }
 else{
    $usuario -> Loguearse($user, $pass);
    if(!empty($usuario -> objetos)){

        foreach($usuario -> objetos as $objeto){
          $_SESSION['usuario'] = $objeto -> id_usuario;
          $_SESSION['us_tipo'] = $objeto -> us_tipo;
          $_SESSION['nombre_us'] = $objeto -> nombre_us;
        }
        
        switch($_SESSION['us_tipo']){
          case 1:
            header('Location: ../vista/adm_catalogo.php');
            break;
        
          case 2:
            header('Location : ../vista/tec_catalogo.php');
            break;

          case 3:
            header('Location : ../vista/adm_catalogo.php');
            break;
        }
    }else{
        header('Location: ../index.php');
    }

 }


?>