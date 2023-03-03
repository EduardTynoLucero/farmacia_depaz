<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/css/all.min.css">
</head>

<?php 

session_start();
//echo '<pre>'; var_dump("LA SESION ES: ".$_SESSION['us_tipo']); echo '</pre>';
if(!empty($_SESSION['us_tipo'])){
    header('Location: controlador/LoginController.php');
}else{
    session_destroy();
?>
<body>
    <img class="wave" src="img/wave.png" alt="">
    <div class="contenedor">
        <div class="img">
            <img src="img/bg.svg" alt="">

        </div>
        <div class="contenido-login">
            <form action="controlador/LoginController.php" method="post">
                <img src="img/logo.png" alt="">
                <h2>Farmacia De Paz</h2>
                <div class="input-div user">
                   <div class="i">
                       <i class="fas fa-user"></i>
                   </div> 
                   <div class="div">
                        <h5>Usuario:</h5>
                        <input type="text" name="user" id="user" class="input"  >
                   </div>
                </div>
                <div class="input-div password">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password:</h5>
                        <input type="password" name="pass"  id="pass" class="input" >
                   </div>
                </div>
                <a href="#">Created</a>
                <input type="submit" class="btn" value="Iniciar Sesion">
            </form>
        </div>
    </div>
</body>
<script src="js/login.js"></script>
</html>
<?php 
}

?>