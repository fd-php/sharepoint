<?php

include('conex2.php');

 echo $_POST['id'];
 
 if (isset($_POST['update'])) {
  
  $fecha =  date("Y-m-d H:i:s");   

  $id = $_POST['id'];
  
  $estado= $_POST['estado'];
  
  $lider= $_POST['lider'];
  
  $descripcion = $_POST['descripcion'];
  
  $presupuesto = $_POST['presupuesto'];

  $gastos = $_POST['gastos'];

  $tiempo = $_POST['tiempo'];
  
  $query = "UPDATE proyectos SET estado ='$estado', lider ='$lider', descripcion = '$descripcion', presupuesto = '$presupuesto', gastos ='$gastos', tiempo ='$tiempo',  fecha_modificacion = '$fecha' WHERE id = $id";
  
  $result = mysqli_query($conn, $query);
  
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Item Modificado';
  $_SESSION['message_type'] = 'success';
  header('Location: projects.php');

 }