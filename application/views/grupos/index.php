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
        <a class="btn btn-info" href="<?= site_url('GrupoController/report_todos_los_grupos') ?>">
        Reporte  en PDF (Todos los Grupos)</a>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <h3>Listado de Grupos</h3>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-success d-block" href="<?= site_url('GrupoController/insertar') ?>">Agregar</a>
        </div>
    </div>

    <div class="row mt-4">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                <th>Id Grupo</th>
                <th>Número de grupo</th>
                <th>Año</th>
                <th>Ciclo</th>
                <th>Materia</th>
                <th>Profesor</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $item) : ?>
                    <tr>
                        <td><?php echo $item->idgrupo; ?></td>
                        <td><?php echo $item->num_grupo; ?></td>
                        <td><?php echo $item->anio; ?></td>
                        <td><?php echo $item->ciclo; ?></td>
                        <td><?php echo $item->materia; ?></td>
                        <td><?php echo $item->nombre ." " . $item->apellido; ?></td>
                        <td>
                            <a class="btn btn-warning" href="<?=site_url('GrupoController/adminAlumnos/' . $item->idgrupo)?>">Administrar</a>
                            <a class="btn btn-primary" href="<?= site_url('GrupoController/modificar/' . $item->idgrupo) ?>">Modificar</a>
                            <a class="btn btn-danger" href="<?= site_url('GrupoController/eliminar/' . $item->idgrupo) ?>" onclick="return confirm('¿Está seguro?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>