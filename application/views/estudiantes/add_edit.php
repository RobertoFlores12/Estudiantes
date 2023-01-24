<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
</head>
<div class="container mt-4">
<h1><?php echo isset($estudiante) ? "Modificar" : "Agregar"; ?></h1>
<hr>
    <?php if ($this->session->flashdata('success')) : ?>
        <p class="success"><strong><?php echo $this->session->flashdata('success'); ?></strong></p>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <p class="error"><strong><?php echo $this->session->flashdata('error'); ?></strong></p>
    <?php endif; ?>
    <form class="form form-ajax" action="<?= site_url("EstudianteController"); ?>/<?= isset($estudiante) ? "update" : 'add'; ?>" method="POST">
        <div>
            <input class="form-control" type="hidden" name="PK_estudiante" value="<?=isset($estudiante) ? $estudiante->idestudiante : "";?>">
        </div>
        <div>
            <p>Id Estudiante:</p>
            <input class="form-control" type="text" name="idestudiante" value="<?=isset($estudiante) ? $estudiante->idestudiante : "";?>" required>
        </div>
        <div>
            <p>Nombre:</p>
            <input class="form-control" type="text" name="nombre" value="<?=isset($estudiante) ? $estudiante->nombre : "";?>" required>
        </div>
        <div>
            <p>Apellido:</p>
            <input class="form-control" type="text" name="apellido" value="<?=isset($estudiante) ? $estudiante->apellido : "";?>" required>
        </div>
        <div>
            <p>Email:</p>
            <input class="form-control" type="text" name="email" value="<?=isset($estudiante) ? $estudiante->email : "";?>" required>
        </div>
        <div>
            <p>Usuario:</p>
            <input class="form-control" type="text" name="usuario" value="<?=isset($estudiante) ? $estudiante->usuario : "";?>" required>
        </div>
        <div>
            <p>Carrera:</p>
            <select class="form-control" name="idcarrera" required>
                <?php foreach ($carreras as $item): ?>
                <option value="<?=$item->idcarrera?>"
                    <?=isset($estudiante) && $item->idcarrera == $estudiante->idcarrera ? "selected='selected'" : "";?>>
                    <?=$item->carrera?>
                </option>
                <?php endforeach;?>
            </select>
        </div>
        <br>
        <div>
            <input type="submit" class="btn btn-success" value="Guardar">
        </div>
    </form>
    <div class="mb-4">
        <a class='btn btn-primary' href="<?= site_url('EstudianteController') ?>">Volver</a>
    </div>
</div>