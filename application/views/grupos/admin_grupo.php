<script src="<?php echo base_url(); ?>js/admin_grupo.js"></script>
<div class="container">
        <h1>Administrar grupo</h1>
        <hr>
        <div>
            <p><strong>Materia:</strong><?php echo $data_grupo->materia; ?></p>
            <p><strong>Profesor:</strong><?php echo $data_grupo->nombre . " " . $data_grupo->apellido; ?></p>
            <p><strong>Grupo:</strong><?php echo $data_grupo->num_grupo; ?></p>
            <p><strong>Año:</strong><?php echo $data_grupo->anio; ?></p>
            <p><strong>Ciclo:</strong><?php echo $data_grupo->ciclo; ?></p>
            <input type="hidden" id="idgrupo" value="<?= $data_grupo->idgrupo; ?>" />
        </div>
        <div>
            Estudiante:
            <select id="estudiante" class="form-control" style="width: auto !important">
                <option>[Seleccione una opcion]</option>
                <?php foreach ($estudiantes as $item) : ?>
                    <option value="<?= $item->idestudiante ?>">
                        <?= $item->nombre . " " . $item->apellido ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <button class="btn btn-success" onclick="agregarEstudiante()">
                Agregar
            </button>
        </div>
        <br>
        <div>
        <a class="btn btn-info" href="<?= site_url('GrupoController/report_todos_los_inscritos/' . $data_grupo->idgrupo) ?>">Reporte en PDF</a>
            <form action="<?= site_url("GrupoController"); ?>/postAdminAlumnos" method="POST" class="form-ajax">
                <table style="min-width:  800px">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Estudiantes</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla"></tbody>
                </table>
                <br>
                <!-- Aqui se agrega toda la informacion que se enviará 
                Debe estar oculta porque solo interesa que se envie y que no se ve -->
                <div id="data" hidden></div>
                <button class="btn btn-primary">Guardar</button>
                <a class="btn btn-secondary" href="<?= site_url('GrupoController') ?>">Volver</a>
            </form>
        </div>
        <script>
            // Se cargar los estudiantes previamente agregados
            // Esto con el objetico de manipular la información
            // en formato de objetos JSON
            estudiantes = <?= json_encode($grupo_estudiantes) ?>;
            // Mostrando estudiantes
            mostrarEstudiantes();
        </script>

</div>