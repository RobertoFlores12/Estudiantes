

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
    <a class="btn btn-info" href="<?=site_url('CarreraController/report_todas_las_carreras')?>">Reporte 
        en PDF (Todas las carreras)</a>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <h3>Listado de carreras</h3>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-success d-block" href="<?= site_url('CarreraController/insertar') ?>">Agregar</a>
        </div>
    </div>

    <div class="row mt-4">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Id Carrera</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $item) : ?>
                    <tr>
                        <td><?php echo $item->idcarrera; ?></td>
                        <td><?php echo $item->carrera; ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?= site_url('CarreraController/modificar/' . $item->idcarrera) ?>">Modificar</a>
                            <a class="btn btn-danger" href="<?= site_url('CarreraController/eliminar/' . $item->idcarrera) ?>" onclick="return confirm('¿Está seguro?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>