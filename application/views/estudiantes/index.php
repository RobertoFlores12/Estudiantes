<div class="container">
    <?php if ($this->session->flashdata('success')) : ?>
        <p class="success"><strong><?php echo $this->session->flashdata('success'); ?></strong></p>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <p class="error"><strong><?php echo $this->session->flashdata('error'); ?></strong></p>
    <?php endif; ?>
    <br>
    <div>
        <a class="btn btn-info" href="<?= site_url('EstudianteController/reporte_todos_los_estudiantes') ?>">
        Reporte  en PDF (Todos los Estudiantes)</a>
    </div>
    <br>
    <div class="row mt-4">
        <div class="col-6">
            <h3>Listado de estudiantes</h3>
        </div>
        <div class="col-6">
            <a class="btn btn-success d-block" href="<?= site_url('EstudianteController/insertar') ?>">Agregar</a>
        </div>
    </div>
    <table class="table mt-4">
        <thead class="thead-dark">
            <tr>
                <th>Id Estudiante</th>
                <th>Email</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $item) : ?>
                <tr>
                    <td><?php echo $item->idestudiante; ?></td>
                    <td><?php echo $item->email; ?></td>
                    <td><?php echo $item->usuario; ?></td>
                    <td><?php echo $item->nombre; ?></td>
                    <td><?php echo $item->apellido; ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?= site_url('EstudianteController/modificar/' . $item->idestudiante) ?>">Modificar</a>
                        <a class="btn btn-danger" href="<?= site_url('EstudianteController/eliminar/' . $item->idestudiante) ?>" onclick="return confirm('¿Está seguro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>