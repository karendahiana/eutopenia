<!DOCTYPE html>
<html>
<head>
  <title>Galería de Fotos</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <?php
// Carpeta donde se guardarán las imágenes subidas
$uploadDir = 'uploads/';

// Subir la imagen al servidor
$imageName = $_FILES['image']['name'];
$imageTmpName = $_FILES['image']['tmp_name'];
move_uploaded_file($imageTmpName, $uploadDir . $imageName);

// Guardar el título y la descripción en un archivo de texto
$title = $_POST['title'];
$description = $_POST['description'];
file_put_contents($uploadDir . pathinfo($imageName, PATHINFO_FILENAME) . '.txt', $description);

// Redireccionar a la página de la galería
header('Location: index.html');
exit;
?>
    <h1>Galería de Fotos</h1>
    
    <!-- Formulario para subir imágenes -->
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="image">Selecciona una imagen:</label>
        <input type="file" name="image" id="image" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="description">Descripción:</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Subir Imagen</button>
    </form>
    
    <!-- Galería de fotos -->
    <div class="row mt-4">
      <?php
      // Obtener las imágenes subidas
      $images = glob("uploads/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
      
      // Mostrar las imágenes en la galería
      foreach ($images as $image) {
        $title = pathinfo($image, PATHINFO_FILENAME);
        $description = file_get_contents("uploads/{$title}.txt");
        ?>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="<?php echo $image; ?>" class="card-img-top" alt="<?php echo $title; ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $title; ?></h5>
              <p class="card-text"><?php echo $description; ?></p>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</body>
<script>
    // Validar extensión de archivo antes de subirlo
document.getElementById('image').addEventListener('change', function() {
  var file = this.files[0];
  var fileType = file.type.split('/')[1];
  
  if (fileType !== 'jpg' && fileType !== 'jpeg' && fileType !== 'png' && fileType !== 'gif') {
    alert('Solo se permiten archivos de imagen (JPG, JPEG, PNG, GIF).');
    this.value = '';
  }
});
</script>
</html>

