<?php include("./layouts/header.php");
include "conex2.php";

$fileUpload=(isset($_FILES['fileUpload']['name']))?$_FILES['fileUpload']['name']:"";
$fileName=(isset($_POST['fileName']))?$_POST['fileName']:"";
$opciones=(isset($_POST['opciones']))?$_POST['opciones']:"";
$nombre = $_SESSION['nombre'];
  
    

switch($opciones) {

	case "Agregar":

		$fecha = new DateTime();
		$nombreArchivo = ($fileUpload!="")?$fecha->getTimestamp()."_".$_FILES['fileUpload']['name']:"nada";
		$tmpArchivo = $_FILES['fileUpload']['tmp_name'];

		if($tmpArchivo!="") {

			move_uploaded_file($tmpArchivo,"./compartido/".$nombreArchivo);
  
            $fecha =  date("Y-m-d H:i:s");

            $id_proyecto = $_GET['id'];
    
            $descripcion = $_POST['descripcion'];

            
            $query = "  INSERT INTO colaboraciones(id_proyecto, nombre, descripcion, nombre_archivo,  fecha_colabora) 
                VALUES ('$id_proyecto','$nombre', '$descripcion', '$nombreArchivo','$fecha')";
    
            $result = mysqli_query($conn, $query);
    
            if(!$result) {
            die("Query Failed.");
            } 
		}

	break;

	case "Cancelar":

	break;

	case "Descargar":
		
		?> <meta http-equiv="refresh" content="0;url=download.php?archivo=<?php echo $fileName;?>"> <?php

	break;

	case "Borrar":

		$filePath = './compartido/'.$fileName;

		if(!empty($fileName) && file_exists($filePath)) {
		
			unlink($filePath);
		}
		
	break;

}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Colaboracion </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="projects.php">Inicio</a></li>
              <li class="breadcrumb-item active">Colaboracion</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<div class="col-md-5">

		<form method="POST" enctype="multipart/form-data">
		
		<div class="form-group">
                <label for="inputDescription">Describa Colaboracion</label>
                <textarea id="inputDescription" name="descripcion" class="form-control" rows="4"></textarea>
              </div>
		<div class = "form-group">
			<label for="fileUpload">Seleccione Archivo:</label>
			<input type="file" class="form-control" id="fileUpload" name="fileUpload">
		</div>

		<div class="btn-group" role="group" aria-label="">
			<button type="submit" name="opciones" value="Agregar" class="btn btn-success">Agregar</button>
			<button type="submit" name="opciones" value="Cancelar" class="btn btn-info">Cancelar</button>
		</div>
	</form>
	

</div>

<div class="col-md-7">
<?php
 $id = $_GET['id'];
                                                
                        $query = "SELECT * FROM colaboraciones WHERE id_proyecto = $id";

                        $result_tasks = mysqli_query($conn, $query);
                        
                        while ($row = mysqli_fetch_assoc($result_tasks)) { }?>
                        
<table class="table table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre archivo</th>
			<th>Opciones</th>
		</tr>
	</thead>

	<?php

		$archivos = scandir("./compartido");
		$num=0;

		for ($i=2; $i<count($archivos); $i++) {
			$num++;
	?>
		<tbody>
			<tr>
				<th scope="row"><?php echo $num;?></th>
				<td><?php echo $archivos[$i]; ?></td>
                
				<td>
					<form method="POST">

						<input type="hidden" name="fileName" id="fileName" value="<?php echo $archivos[$i]; ?>"/>
						<input type="submit" name="opciones" value="Descargar" class="btn btn-primary"/>
						<!-- <input type="submit" name="opciones" value="Borrar" class="btn btn-danger"/> -->
					</form>
				</td>
			</tr>
		</tbody>
	<?php }?>
</table>

</div>

<?php include("./layouts/footer.php");?> 