<?php include_once '../includes/funciones/bd_conexion.php' ?>
<?php include_once 'funciones/sesiones.php' ?>
<?php include_once 'templates/header.php' ?>


<?php include_once 'templates/barra.php' ?>

<!-- Main Sidebar Container -->
<?php include_once 'templates/navegacion.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
          <small>Informacion sobre el evento</small>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-6">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Usuarios Registrados
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="grafica-registros" style="height: 100%; width: 100%"></canvas>
          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-6">
        <?php 
        $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados";
        $resultado = $con->query($sql);
        $registrados = $resultado->fetch_assoc();
        ?>
        <!-- small card -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><?= $registrados['registros'] ?></h3>

            <p>Total Registrados</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <a href="lista-registrados.php" class="small-box-footer">
            Mas Informacion <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <?php 
        $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados";
        $resultado = $con->query($sql);
        $registrados = $resultado->fetch_assoc();
        ?>
        <!-- small card -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>$<?= $registrados['ganancias'] ?></h3>

            <p>Ganancias Totales</p>
          </div>
          <div class="icon">
            <i class="fas fa-dollar-sign"></i>
          </div>
          <a href="lista-registrados.php" class="small-box-footer">
            Mas Informacion <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>

    <h2 class="page-header">Regalos</h2>
    <div class="row">
      <div class="col-lg-3 col-6">
        <?php 
        $sql = "SELECT COUNT(id_registrado) AS pulseras FROM registrados WHERE regalo = 1";
        $resultado = $con->query($sql);
        $regalo = $resultado->fetch_assoc();
        ?>
        <!-- small card -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $regalo['pulseras'] ?></h3>

            <p>Pulseras</p>
          </div>
          <div class="icon">
            <i class="fas fa-gift"></i>
          </div>
          <a href="lista-registrados.php" class="small-box-footer">
            Mas Informacion <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <?php 
        $sql = "SELECT COUNT(id_registrado) AS etiquetas FROM registrados WHERE regalo = 2";
        $resultado = $con->query($sql);
        $regalo = $resultado->fetch_assoc();
        ?>
        <!-- small card -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $regalo['etiquetas'] ?></h3>

            <p>Etiquetas</p>
          </div>
          <div class="icon">
            <i class="fas fa-gift"></i>
          </div>
          <a href="lista-registrados.php" class="small-box-footer">
            Mas Informacion <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <?php 
        $sql = "SELECT COUNT(id_registrado) AS plumas FROM registrados WHERE regalo = 3";
        $resultado = $con->query($sql);
        $regalo = $resultado->fetch_assoc();
        ?>
        <!-- small card -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $regalo['plumas'] ?></h3>

            <p>Plumas</p>
          </div>
          <div class="icon">
            <i class="fas fa-gift"></i>
          </div>
          <a href="lista-registrados.php" class="small-box-footer">
            Mas Informacion <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'templates/footer.php' ?>