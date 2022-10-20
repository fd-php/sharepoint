<?php

include "conex2.php";
	
	
if (isset($_POST['subirProyecto'])) {
  
  $fecha =  date("Y-m-d H:i:s");   
  
  $nombre = $_POST['nombre'];
  
  $descripcion = $_POST['descripcion'];
  
  $cliente = $_POST['cliente'];
  
  $lider = $_POST['lider'];
  
  $presupuesto = $_POST['presupuesto'];

  $gastos = $_POST['gastos'];

  $tiempo = $_POST['tiempo'];

  $estado = $_POST['estado'];
  
  $query = "INSERT INTO proyectos(nombre, descripcion, estado, cliente, lider, presupuesto, gastos, tiempo, fecha_carga) VALUES ('$nombre', '$descripcion', '$estado', '$cliente', '$lider', '$presupuesto', '$gastos', '$tiempo','$fecha')";
  
  $result = mysqli_query($conn, $query);
  
  if(!$result) {
    die("Query Failed.");
  }

  

  $_SESSION['message'] = 'Nota Guardada Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: projects.php');

}
?>