<?php include("./layouts/header.php");
include('conex2.php');
?> 

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Edicion de Proyecto</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="projects.php">Inicio</a></li>
              <li class="breadcrumb-item active">Edicion de Proyecto</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <?php  $id = $_GET['id'];?>
    <?php
                        $query = "SELECT * FROM proyectos WHERE id = $id";

                        $result_tasks = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
    <form action="edit.php" method="POST">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>
              <input type="text" name="id" class="form-control"  value="<?php echo $_GET['id'] ?>" hidden="" >
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nombre del Proyecto</label>
                <input type="text" id="inputName" class="form-control" value="<?php echo $row['nombre']; ?>" disabled>
              </div>
              <div class="form-group">
                <label for="inputDescription">Descripcion del Proyecto</label>
                <textarea id="inputDescription" name="descripcion" class="form-control" rows="4"><?php echo $row['descripcion']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Estado</label>
                <select id="inputStatus" name="estado" class="form-control custom-select">
                  <option disabled>Opciones</option>
                  <option>Finalizado</option>
                  <option>En Progreso</option>
                  <option>Cancelado</option>
                  <option selected><?php echo $row['estado']; ?></option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Cliente</label>
                <input type="text" name="cliente" id="inputClientCompany" class="form-control" disabled value="<?php echo $row['cliente']; ?>">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Lider del Proyecto</label>
                <input type="text" name="lider" id="inputProjectLeader" class="form-control" value="<?php echo $row['lider']; ?>">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Presupuesto</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Presupuesto Estimado</label>
                <input type="number" name="presupuesto" id="inputEstimatedBudget" class="form-control" value="<?php echo $row['presupuesto']; ?>" step="1">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Gastos</label>
                <input type="number" name="gastos" id="inputSpentBudget" class="form-control" value="<?php echo $row['gastos']; ?>" step="1">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Tiempo en Dias</label>
                <input type="number" name="tiempo" id="inputEstimatedDuration" class="form-control" value="<?php echo $row['tiempo']; ?>" step="0.1">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
         
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="projects.php" class="btn btn-secondary">Cancel</a>
          <input type="submit" name="update" value="Save Changes" class="btn btn-success float-right">
        </div>
      </div>
                        </form>
      <?php } ?>
    </section>
    <!-- /.content -->
    <?php include("./layouts/footer.php");?> 
