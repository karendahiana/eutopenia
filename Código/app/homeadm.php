<!DOCTYPE html>
<html lang="es-CO" class="h-100">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EUTOPENIA</title>
    <meta name="theme-color" content="#ff2e01">
    <meta name="theme-color" content="#ff2e01">
    <meta name="MobileOptimized" content="width">
    <meta name="HandshleFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar" content="black-traslucent">
    <!--Tags SEO-->
    <meta name="author" content="EUTOPENIA">
    <meta name="description" content="Aplicativo para el asilo Carmen Londoño">
    <meta name="keyworks" content="asilo, ancianos, donaciones, eutopia, web app">
    <!--favicon-->
    <link rel="icon" type="image/x-icon" href="../media/cba.webp">
    <link rel="apple-touch-icon" type="image/png" href="../media/cba.webp">
    <link rel="apple-touch-startup-image" type="image/webp" href="../media/cba.webp">
    <!--Styles Bootstrap 5.3.1 Alpha-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
  </head>
  <body>
      <?php
    require_once 'conexion.php';
    session_start();

    if (isset($_SESSION['administrador'])) {
        $search=$conn->prepare('SELECT * FROM administrador WHERE idadministrador=?');
        $search->bindParam(1,$_SESSION['administrador']);
        $search->execute();

        $data=$search->fetch(PDO::FETCH_ASSOC);

        $user=null;

        if (count($data)>0) {
            $user=$data;
        }
    }

        if (!empty($user)) {
            
    ?>
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
      <div class="container-fluid">
      <div class="row">		  
            <div class="col text-center">
              <img class="mb-2" src="../media/cba.webp" alt="Logo CBA" style="height: 60px">
              <img class="mb-2" src="../media/celia.webp" alt="Logo Celia" style="height: 60px">
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button aria-labelledby="labeldiv" alt="Menu de apartados de EUTOPENIA">
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav me-auto">
                <li class="nav-item">
                   <a class="nav-link active" aria-current="page" href="homeadm.php">Inicio</a>
                </li>
              <li class="nav-item">
                <a class="nav-link" href="Untitled2.html" _ngcontent-wdr-c200="" role="button">Informacion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="adm.php">Galeria</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="donaciones tabla">Donaciones</a>
              </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Usuarios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Configuración</a>
                </li>
            </ul>
            <div class="d-flex">
              <a href="logout.php"><button class="btn btn-primary" type="button">Salir</button></a>
            </div>
          </div>
      </div>
    </nav>
    <main class="w-100 container" style="width: 100%;">
    <div class="container mt-5">
    <div class="card" style="width: 18rem;">
  <img src="../media/perfil.webp" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Nombre administrador</h5>
    <p class="card-text">Centro del bienestar del anciano-Administrador</p>
    <a href="#" class="btn btn-primary">Editar perfil</a>
  </div>
    </div>
  
    </main>
    <?php
    }else{
        header('location: ./');
    }
    ?>
  </body>
</html>