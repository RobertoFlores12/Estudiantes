<div class="container">

    <div class="mt-4">
        <?php if ($this->session->flashdata('success')) : ?>
            <p class="success"><strong><?php echo $this->session->flashdata('success'); ?></strong></p>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')) : ?>
            <p class="error"><strong><?php echo $this->session->flashdata('error'); ?></strong></p>
        <?php endif; ?>
    </div>
    <br>
    <div>
        <a class="btn btn-info" href="<?= site_url('ProfesorController/report_todos_los_profesores') ?>">
        Reporte  en PDF (Todos los Profesores)</a>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <h3>Listado de profesores</h3>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-success d-block" href="<?= site_url('ProfesorController/insertar') ?>">Agregar</a>
        </div>
    </div>

    <div class="row mt-4">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Id Profesor</th>
                    <th>Nombre</th>
                    <th>Fecha Nacimiento</th>
                    <th>Profesion</th>
                    <th>Genero</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $item) : ?>
                    <tr>
                        <td><?php echo $item->idprofesor; ?></td>
                        <td><?php echo $item->nombreCompleto; ?></td>
                        <td><?php echo $item->fecha_nacimiento; ?></td>
                        <td><?php echo $item->profesion; ?></td>
                        <td><?php echo $item->genero; ?></td>
                        <td><?php echo $item->email; ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?= site_url('ProfesorController/modificar/' . $item->idprofesor) ?>">Modificar</a>
                            <a class="btn btn-danger" href="<?= site_url('ProfesorController/eliminar/' . $item->idprofesor) ?>" onclick="return confirm('¿Está seguro?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>