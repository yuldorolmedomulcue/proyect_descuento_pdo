<?php 
//paso4
//incluir conexion
include_once __DIR__ . "/conexion_sqlite.php";

//mostrar registros
$query= "SELECT * FROM regitros";
$stmt = $db->query($query);

//volcar registros
$registros = $stmt->fetchAll(PDO::FETCH_OBJ);

//mostrar en pantalla
// var_dump($registros);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Incluir Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

     <title>Registros</title>
</head>
<body>
<div class="container caja">
        <h2 class="mb-4">Panel de Control - Registros</h2>

        <?php if ($registros): ?>
            <?php foreach ($registros as $registro): ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Registro ID: <?php echo htmlspecialchars($registro->id); ?></h5>
                        <p class="card-text"><strong>Nombre:</strong> <?php echo htmlspecialchars($registro->nombre); ?></p>
                        <p class="card-text"><strong>Cédula:</strong> <?php echo htmlspecialchars($registro->cedula); ?></p>
                        <p class="card-text"><strong>Teléfono:</strong> <?php echo htmlspecialchars($registro->telefono); ?></p>
                        <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($registro->email); ?></p>
                        <p class="card-text"><strong>Dirección:</strong> <?php echo htmlspecialchars($registro->direccion); ?></p>
                        <p class="card-text"><strong>Departamento:</strong> <?php echo htmlspecialchars($registro->departamento); ?></p>
                        <p class="card-text"><strong>Ciudad:</strong> <?php echo htmlspecialchars($registro->ciudad); ?></p>
                        <p class="card-text"><strong>Fecha:</strong> <?php var_dump($registro->fecha_creacion); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info" role="alert">
                No hay registros disponibles.
            </div>
        <?php endif; ?>

    </div>

    <!-- Incluir Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>