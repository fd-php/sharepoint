<?php include("./layouts/header.php");?> 

 

<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar Proyecto </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Agregar Proyecto</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>
             
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
    
            <div class="card-body">
    
            <form action="subirProyecto.php" method="POST">
              <div class="form-group">
                <label for="inputName">Nombre del Proyecto</label>
                <input type="text"  id="inputName" name="nombre" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Descripcion del Proyecto</label>
                <textarea id="inputDescription" name="descripcion" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Estado</label>
                <select id="inputStatus" name="estado" class="form-control custom-select">
                  <option selected disabled>Opciones</option>
                  <option>En Progreso</option>
                  <option>Cancelado</option>
                  <option>Finalizado</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Cliente</label>
                <input type="text" id="inputClientCompany" name="cliente" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Lider del Proyecto</label>
                <input type="text" id="inputProjectLeader" name="lider" class="form-control">
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
                <input type="number" id="inputEstimatedBudget" name="presupuesto" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Gastos Totales</label>
                <input type="number" id="inputSpentBudget" name="gastos" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Tiempo Estimado Proyecto</label>
                <input type="number" id="inputEstimatedDuration" name="tiempo" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
         <a href="projects.php" class="btn btn-secondary">Cancelar</a>
          <input type="submit" name="subirProyecto" value="Crear nuevo Proyecto" class="btn btn-success float-right">
          </form>
        </div>
      </div>
     
    </section>
    
    <!-- /.content -->
    <?php include("./layouts/footer.php");?> 