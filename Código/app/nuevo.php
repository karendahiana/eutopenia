<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galería de Fotos</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Galería de fotos</h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <img src="ruta/a/tu/imagen.jpg" alt="Imagen 1" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Título de la imagen 1</h5>
          <p class="card-text">Descripción de la imagen 1</p>
        </div>
      </div>
    </div>
    
    <!-- Repite este bloque de código por cada imagen que quieras agregar -->
    
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
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