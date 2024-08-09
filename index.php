<!DOCTYPE html>
<html lang="en">

<head>

    <!--Metaetiquetas requeridas-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <title>Redencion 10% de Descuento</title>
</head>

<body>

    <div class="container mt-5 caja">
        <div class="row mt-4">
            <h1 class="text-center">Registrate y redime el codigo para tu inicio de semestre</h1>
        </div>

        <div class="row mt-4 mx-4"> <!--mx-4 hace mas peque;o barra de registro creado-->

<!-----------------------------------------------Mensajes y Errores----------------------------------------------->
        <!--mensaje2 configuracion, SOLO SE MOSTRARA CUANDO SEA CORRECTO-->
        <?php if (isset($_GET["mensaje"]) && isset($_GET["codigo"])) :?>
            <!--mensaje3 sacado de bootstrap alert missing-->
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo $_GET["mensaje"]." - TU CODIGO: ". $_GET["codigo"]; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>

        <!--mensaje5 configuracion, ERRORES-->
        <?php if (isset($_GET["error"])) :?>
            <!--mensaje3 sacado de bootstrap alert missing-->
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo $_GET["error"]; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>
        </div>
<!----------------------------------------------------------------------------------------------------------------->

        <form action="procesar.php" method="POST">
            <div class="row">
                <div class="col-sm-8">
                    <h5>Los campos (*) son obligatorios</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre (*):</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingresa tu nombre y apellidos">
                    </div>

                    <div class="mb-3">
                        <label for="cedula" class="form-label">Cedula (*):</label>
                        <input type="number" name="cedula" class="form-control" id="cedula" placeholder="Ingresa tu cedula">
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono (*):</label>
                        <input type="number" name="telefono" class="form-control" id="telefono" placeholder="ingresa tu telefono">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email (*):</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Ingresa tu email">
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Direccion (*):</label>
                        <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Ingresa tu direccion">
                    </div>

                    <div class="mb-3">
                        <label for="departamento" class="form-label">Departamento (*):</label>
                        <select class="form-select w-100" id="departamento" name="departamento">
                            <option value="">--Selecciona un departamento--</option>
                            <option value="Amazonas">Amazonas</option>
                            <option value="Antioquia">Antioquia</option>
                            <option value="Arauca">Arauca</option>
                            <option value="Atlántico">Atlántico</option>
                            <option value="Bolívar">Bolívar</option>
                            <option value="Boyacá">Boyacá</option>
                            <option value="Caldas">Caldas</option>
                            <option value="Caquetá">Caquetá</option>
                            <option value="Casanare">Casanare</option>
                            <option value="Cauca">Cauca</option>
                            <option value="Cesar">Cesar</option>
                            <option value="Chocó">Chocó</option>
                            <option value="Córdoba">Córdoba</option>
                            <option value="Cundinamarca">Cundinamarca</option>
                            <option value="Guainía">Guainía</option>
                            <option value="Guaviare">Guaviare</option>
                            <option value="Huila">Huila</option>
                            <option value="La Guajira">La Guajira</option>
                            <option value="Magdalena">Magdalena</option>
                            <option value="Meta">Meta</option>
                            <option value="Nariño">Nariño</option>
                            <option value="Norte de Santander">Norte de Santander</option>
                            <option value="Putumayo">Putumayo</option>
                            <option value="Quindío">Quindío</option>
                            <option value="Risaralda">Risaralda</option>
                            <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                            <option value="Santander">Santander</option>
                            <option value="Sucre">Sucre</option>
                            <option value="Tolima">Tolima</option>
                            <option value="Valle del Cauca">Valle del Cauca</option>
                            <option value="Vaupés">Vaupés</option>
                            <option value="Vichada">Vichada</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="ciudad" class="form-label">Ciudad (*):</label>
                        <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ingresa tu ciudad">
                    </div>

                    <button type="submit" name="btnRegistrarse" class="btn btn-success btn-x1 w-100 btnRegistrarse">REGISTRARSE</button>
                </div>
                
                <div class="col-sm-6">
                    <img src="img/mujer.png" class="img-fluid">
                </div>
            </div>

        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Paquete Bootstrap con Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>