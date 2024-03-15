<?php
include('consultas_informacion/index.php');
var_dump($result_sede);
//                        die();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Principal</title>
</head>

<body>
    <div class="container m-5">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col d-flex justify-content-center">
                <img src="assets/fcv.png" class="w-50" alt="">
            </div>
            <div class="col d-flex justify-content-center">
                <div class="row ">
                    <div class="col-12 text-center">Informe analisis de vulnerabilidaddes de servicios IT</div>
                    <div class="col text-center">Proceso: CIBERSEGURIDAD</div>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="row ">
                    <div class="col text-center">
                        <?php $hoy = getdate(); ?>
                        <p><?php echo " Fecha : " . $hoy['mday'] . "/" . $hoy['mon'] . "/" . $hoy['year']   ?></p>
                    </div>
                    <div class="col-12 text-center">
                        <p>FCV</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="" class="col-1 col-form-label">Id caso:</label>
                        <div class="col">
                            <input type="text" class="form-control">
                        </div>
                        <label for="" class="col-1 col-form-label">IP/RED:</label>
                        <div class="col">
                            <input type="text" class="form-control">
                        </div>
                        <label for="" class="col-2 text-center col-form-label">Id server :</label>
                        <div class="col">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="" class="col-sm-2 col-form-label text-center">Sede:</label>
                        <div class="col">
                            <select name="sedes" id="sedes" class="form-select">
                                <option value="Seleccione_sede" selected>Seleccione una sede :</option>
                                <?php
                                // Verificar si se ha enviado el formulario y conservar el valor seleccionado

                                while ($row = $result_sede->fetch_assoc()) {
                                    $selected = ($row['id_sede'] == $nombre_sede) ? 'selected' : '';
                                    echo '<option value="' . $row['id_sede'] . '" ' . $selected . '>' . $row['nombre_sede'] . '</option>';
                                }
                                ?>
                            </select>
                            <?php
                            if (!empty($errors) && in_array("Seleccione una sede", $errors)) {
                                echo "<div class='alert alert-danger mt-2' role='alert'>Seleccione una sede.</div>";
                            }
                            ?>
                        </div>
                        <label for="" class="col-sm-2 col-form-label text-center">Nombre servidor:</label>
                        <div class="col">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3 mb-3 border border-dark text-center">
                        <div class="col">
                            <h4>Herramientas usadas para el analisis:</h4>
                            <p>OpenVAS (Open Vulnerability Assessment System) es una plataforma de escaneo de vulnerabilidades de código abierto que </p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php
                        // Definir el número de repeticiones deseado
                        $num_repeticiones = 15;

                        // Bucle para repetir el formulario
                        for ($i = 0; $i < $num_repeticiones; $i++) {
                        ?>
                            <!-- <div class="row d-flex align-items-center justify-content-center">
                                <div class="col-1 text-center">
                                    <label for="">ID</label>
                                    <input type="text" name="id[]" value="<?php echo $i ?>" class="form-control w-75">
                                </div>
                                <div class="col ">
                                    <label for="">Vulnerabilidad</label>
                                    <textarea name="" id="" cols="30" rows="10"></textarea>
                                    <input type="text" name="vulnerabilidad[]" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">Criticidad</label>
                                    <input type="text" name="criticidad[]" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">CVE</label>
                                    <input type="text" name="cve[]" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">Aplicaciones</label>
                                    <input type="text" name="aplicaciones[]" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">Acción Recomendada</label>
                                    <input type="text" name="accion_recomendada[]" class="form-control">
                                </div>
                            </div> -->
                            <!-- <div class="row">
                                <div class="col d-flex align-items-center">
                                    <label for="">ID</label>
                                    <input type="text" name="id[]" value="<?php echo $i ?>" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">Vulnerabilidad</label>
                                    <textarea name="vulnerabilidad[]" class="form-control" rows="5"></textarea>
                                </div>
                                <div class="col">
                                    <label for="">Criticidad</label>
                                    <textarea name="criticidad[]" class="form-control" rows="5"></textarea>
                                </div>
                                <div class="col">
                                    <label for="">CVE</label>
                                    <textarea name="cve[]" class="form-control" rows="5"></textarea>
                                </div>
                                <div class="col">
                                    <label for="">Aplicaciones</label>
                                    <textarea name="aplicaciones[]" class="form-control" rows="5"></textarea>
                                </div>
                                <div class="col">
                                    <label for="">Acción Recomendada</label>
                                    <textarea name="accion_recomendada[]" class="form-control" rows="4"></textarea>
                                </div>
                            </div> -->
                            <div class="row">
    <div class="col-1 d-flex align-items-center">
        <label for="">ID:</label>
        <input type="text" name="id[]" value="<?php echo $i ?>" class="form-control">
    </div>
    <div class="col">
        <label for="">Vulnerabilidad:</label>
        <textarea name="vulnerabilidad[]" class="form-control" rows="5"></textarea>
    </div>
    <div class="col-2">
        <label for="">Criticidad:</label>
        <select name="criticidad[]" class="form-control">
            <option value="Seleccione">Seleccione:</option>
            <option value="Critical">Critical</option>                                        
            <option value="High">High</option>
            <option value="Medium">Medium</option>
            <option value="Low">Low</option>
        </select>
    </div>
    <div class="col">
        <label for="">CVE:</label>
        <input type="text" name="cve[]" class="form-control">
    </div>
    <div class="col">
        <label for="">Aplicaciones:</label>
        <input type="text" name="aplicaciones[]" class="form-control">
    </div>
    <div class="col">
        <label for="">Acción Recomendada:</label>
        <textarea name="accion_recomendada[]" class="form-control" rows="4"></textarea>
    </div>
</div>



                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>