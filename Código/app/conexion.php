<?php
$servername = "db4free.net";
$username = "maryori";
$password = "Nsti@vf5V*#jB5K";
$dbname = "cbaproyecto";
$msg=null;

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //$msg="<i class='bi bi-check-circle'></i> Connected successfully";
} catch(PDOException $e) {
  $msg="<i class='bi bi-check-circle'></i>Connection failed: " . $e->getMessage();
}
?>
