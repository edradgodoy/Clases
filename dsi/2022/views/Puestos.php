<?php 
include 'methods/Puestos/Puestos.php';
$puestos = Puestos::singleton_puestos();
?>
<div class="row">
    <button type="button" class="btn btn-primary" id="btnAddPuesto">
        Agregar puesto
    </button>
    <div class="modal fade" id="myModalPuesto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Puestos</h4>
                </div>
                <?php 
                    if (isset($_POST['addPuesto'])) {
                        $result = $puestos->addPuesto();
                        if ($result === true) {
                            echo '<script>window.location("Puestos");</script>';
                        } else {
                            $error = $result;
                        }
                    }

                    if (isset($_POST['editPuesto'])) {
                        $result = $puestos->editPuesto();
                        if ($result === true) {
                            echo '<script>window.location("Puestos");</script>';
                        } else {
                            $error = $result;
                        }
                    }
                ?>
                <form role="form" action="" method="POST" id="formPuesto">
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" name="idpuesto" id="idpuesto" style="display: none;">
                        </div>
                        <div class="form-group">
                            <label>Nombre del puesto:</label>
                            <input class="form-control" name="nombrePuesto" id="nombrePuesto">
                            <p class="help-block">Escriba el nombre del puesto para el usuario</p>
                        </div>
                        <?php 
                            if (isset($error)) {
                                echo '<div class="form-group">
                                    <div class="alert alert-danger">
                                    '.$error.'
                                    </div>
                                </div>';
                            }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="editPuesto" id="editPuesto" class="btn btn-warning" value="Editar">
                        <input type="submit" name="addPuesto" id="addPuesto" class="btn btn-success" value="Agregar">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    <br><br>
</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="tablaPuestos">
        <thead>
            <tr>
                <th>#</th>
                <th>Puesto</th>
                <th>Fecha</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#tablaPuestos').DataTable({
            responsive: true,
            retrieve: true,
            "order": [[ 1, 'asc' ]],
            // pasamos a prosesar la informacion a php
            "processing": true,
            "serverSide": true,
            'serverMethod': 'post',
            "ajax": "methods/Puestos/Lista.php"
        });
    });
</script>