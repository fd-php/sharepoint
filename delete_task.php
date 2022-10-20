<?php

include('conex2.php');
$id = $_GET['id'];
$query = "DELETE FROM proyectos WHERE id = $id";
$result = mysqli_query($conn, $query);
if(!$result) {
  die("Query Failed.");
}

  

  $_SESSION['message'] = 'Proyecto Eliminado Correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: projects.php');
  


