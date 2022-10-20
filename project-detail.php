<?php include("./layouts/header.php");
include('conex2.php');
?> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Detalles del Proyecto</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="projects.php">Inicio</a></li>
              <li class="breadcrumb-item active">Detalles del Proyecto</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <?php  $id = $_GET['id'];?>
    
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detalles del Proyecto</h3>

          <?php
                        $query = "SELECT * FROM proyectos WHERE id = $id";

                        $result_tasks = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                              

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Gastos Estimados</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $row['presupuesto']; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Gastos Totales</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $row['gastos']; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Tiempo Estimado</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $row['tiempo']; ?></span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-12">
                  <h4>Colaboraciones</h4>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Usuario</a>
                        </span>
                        <span class="description"></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                      
                      </p>

                      <p>
                        <a href="compartido.php" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Archivos</a>
                      </p>
                    </div>

                 
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-cog"></i> <?php echo $row['nombre']; ?></h3>
              <p class="text-muted"><?php echo $row['descripcion']; ?></p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Cliente
                <b class="d-block"><?php echo $row['cliente']; ?></b>
                </p>
                <p class="text-sm">Lider del Proyecto
                  <b class="d-block"><?php echo $row['lider']; ?></b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">Fecha Creacion</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-calendar"></i> <?php echo $row['fecha_carga']; ?></a>
                </li>
           
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="compartido.php" class="btn btn-sm btn-primary">Agregar Archivos</a>
                
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <?php } ?>
    </section>
    <!-- /.content -->
    <?php include("./layouts/footer.php");?> 