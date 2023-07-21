<?php
// Realizar una consulta SQL
$sql = "SELECT * FROM usuario";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Recorrer los resultados y mostrarlos en la interfaz
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["idusuario"] . "<br>";
        echo "Nombre: " . $row["nombre"] . "<br>";
        echo "Apellido: " . $row["apellido"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Numero de telefono: " . $row["n_telefono"] . "<br>";
        echo "Edad: " . $row["edad"] . "<br>";
        echo "Ciudad: " . $row["ciudad"] . "<br>";
        echo "<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>
