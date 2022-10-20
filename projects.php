<?php include("./layouts/header.php");
include('conex2.php');
?> 

<!-- Site wrapper -->
<?php if (isset($_SESSION['message'])) { ?>
                   
                    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset();
                } ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Proyectos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a class="btn btn-info btn-sm" href="project-add.php">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Agregar Proyecto
                          </a>
              
              <li class="breadcrumb-item active">Proyectos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Proyectos</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
          
          <?php
           
                        $query = "SELECT * FROM proyectos";

                        $result_tasks = mysqli_query($conn, $query);
                        
                        while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                       
                       
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Nombre Proyecto
                      </th>
                      <th style="width: 30%">
                          Equipo
                      </th>
                      <th>
                          Progreso Proyecto
                      </th>
                      <th style="width: 8%" class="text-center">
                          Stado
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>
                      <?php echo $row['id']; ?>
                      </td>
                      <td>
                          <a>
                          <?php echo $row['nombre']; ?>
                          </a>
                          <br/>
                          <small>
                          <?php echo $row['fecha_carga']; ?>
                          </small>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="dist/img/avatar.png">
                              </li>
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="dist/img/avatar2.png">
                              </li>
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="dist/img/avatar3.png">
                              </li>
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="dist/img/avatar4.png">
                              </li>
                          </ul>
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                              </div>
                          </div>
                          <small>
                              57% Completado
                          </small>
                      </td>
                      <td class="project-state">
                        <?php if ($row['estado']=== "Cancelado"){?>
                            
                          <span class="badge badge-warning"><?php echo $row['estado']; ?></span>  
                          <?php }
                          else {?>
                            <span class="badge badge-success"><?php echo $row['estado']; ?></span>
                            <?php  }
                        ?>
                          
                      </td>
                      <td class="project-actions text-right">
                      
                          <a class="btn btn-primary btn-sm" href="project-detail.php?id=<?php echo $row['id'] ?>">
                              <i class="fas fa-folder">
                              </i>
                              Ver
                          </a>
                          <a class="btn btn-info btn-sm" href="project-edit.php?id=<?php echo $row['id'] ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Editar
                          </a>
                          <a class="btn btn-danger btn-sm" href="delete_task.php?id=<?php echo $row['id'] ?>">
                              <i class="fas fa-trash">
                              </i>
                              Borrar
                          </a>
                      </td>
                  </tr>
           
              </tbody>
              <?php } ?>
          </table>
        </div>

      
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->

  <?php include("./layouts/footer.php");?> 
