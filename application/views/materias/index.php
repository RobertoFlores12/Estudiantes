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
        <a class="btn btn-info" href="<?= site_url('MateriaController/report_todas_las_materias') ?>">
        Reporte  en PDF (Todas las Materias)</a>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <h3>Listado de materias</h3>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-success d-block" href="<?= site_url('MateriaController/insertar') ?>">Agregar</a>
        </div>
    </div>

    <div class="row mt-4">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Id Materia</th>
                    <th>Materia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $item) : ?>
                    <tr>
                        <td><?php echo $item->idmateria; ?></td>
                        <td><?php echo $item->materia; ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?= site_url('MateriaController/modificar/' . $item->idmateria) ?>">Modificar</a>
                            <a class="btn btn-danger" href="<?= site_url('MateriaController/eliminar/' . $item->idmateria) ?>" onclick="return confirm('¿Está seguro?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>