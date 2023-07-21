<!DOCTYPE html>
<html lang="es">
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
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>
<body>
<?php
      require_once 'conexion.php';
      $mi=null;
      
      if(isset($_POST['insertar'])){
        $insert=$conn->prepare('INSERT INTO galeria (imagen,titulo,descripcion) VALUES(?,?,?,?,?)');
        $insert->bindParam(1,$_POST['imagen']);
        $insert->bindParam(2,$_POST['titulo']);
        $insert->bindParam(3,$_POST['descripcion']);

        if($insert->execute()) {
          $mi='Datos registrados';
        }else{
          $mi="Datos no registrados";
        }
      }
    ?>
  <main >
    <header class="mb-auto">
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
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="homeadm.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Untitled2.html" _ngcontent-wdr-c200="" role="button">Informacion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Galeria</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Donaciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Usuarios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="confi.html">Configuración</a>
              </li>
            </ul>
            <div class="d-flex end">
              <a href="logout.php" class="btn btn-primary" style="margin-left: 560px;">Salir</a>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <div class="container mt-5">
    <?php

if ($msg!='') {
  echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>'.$msg.'!</strong>
  </div>';
}
?>
<!--Verificacion de resgistro-->
<?php

if ($mi!='') {
  echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>'.$mi.'!</strong>
  </div>';
}
?>
      <h1>Galería de Fotos</h1>
      <form id="uploadForm" action="" method="post" enctype="application/x-www-form-urlencoded">
        <div class="mb-3">
          <label for="photoUpload" class="form-label">Selecciona una foto:</label>
          <input type="file" class="form-control" name="photoUpload" id="photoUpload" accept="image/*" multiple>
        </div>
        <button type="submit" class="btn btn-primary"  name="insertar">Subir Foto</button>
      </form>
      <div id="gallery" class="row mt-3"></div>
    </div>
  </main>

  <script>
    document.getElementById('uploadForm').addEventListener('submit', function(event) {
  event.preventDefault();

  var files = document.getElementById('photoUpload').files;
  
  for (var i = 0; i < files.length; i++) {
    var file = files[i];
    var reader = new FileReader();

    reader.onload = function(e) {
      var imgSrc = e.target.result;

      var galleryItem = document.createElement('div');
      galleryItem.classList.add('col-md-4', 'mb-3');
      
      var img = document.createElement('img');
      img.classList.add('img-fluid');
      img.src = imgSrc;
      
      galleryItem.appendChild(img);
      document.getElementById('gallery').appendChild(galleryItem);
    }
    
    reader.readAsDataURL(file);
  }
});
  </script>
</body>
</html>