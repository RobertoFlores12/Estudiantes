<?php
  $usuario = ($this->session->userdata['logged_in']['username']);
  $email = ($this->session->userdata['logged_in']['email']);
?>
<head>
  
<script src="<?php echo base_url(); ?>js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>js/ajax.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
</head>

<body>
<div id="info_user" style="text-align: right">
  <p><strong>Usuario:</strong> <?=$usuario?> (<?=$email?>) | <a href="<?=site_url('user_authentication/logout')?>">Cerrar sesión</a></p>
</div>
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('EstudianteController') ?>">Estudiantes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('CarreraController') ?>">Carreras</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('MateriaController') ?>">Materias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('ProfesorController') ?>">Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('GrupoController') ?>">Grupos</a>
        </li>
      </ul>
    </div>
  </nav>
</body>