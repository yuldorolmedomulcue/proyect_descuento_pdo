<?php
//Paso3
//incluir conexion
include_once __DIR__ . "/conexion_sqlite.php";

//configurar la zona horaria 
date_default_timezone_set("America/Bogota");

//insertar datos, si se preciona isset en post porqeu asi esta en index.php
if (isset($_POST["btnRegistrarse"])) {

    //obtener valores una vez precionado el btn
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $departamento = $_POST['departamento'];
    $ciudad = $_POST['ciudad'];

    //validar campos vacios, obligatorio campos llenos
    if (empty($nombre) || empty($cedula) || empty($telefono) || empty($email)  || empty($direccion) || empty($departamento) || empty($ciudad)) {
        $error = "Error, algunos campos estan vacios";
        header('Location: index.php?error='.urlencode($error));
    }else{
        
        //validar si ya existe la cedula, para que no se registre varias veces
        $query = "SELECT * FROM regitros WHERE cedula= :cedula"; //:cedula, se hace por seguridad
        
        //statement
        $stmt = $db -> prepare($query);
        $stmt->bindParam(":cedula", $cedula, PDO::PARAM_STR); //:cedula, se hace por seguridad
        $resultado = $stmt->execute();

        //una vez ejecutado
        $registro_cedula = $stmt->fetch(PDO::FETCH_ASSOC);

        //validamos si existe $registro_cedula | pasamos a index
        if ($registro_cedula) {
            $error = "Error, cedula ya registrada";
            header('Location: index.php?error='.urlencode($error));
        }else{

            //si entra aqui no existe cedula, paramentros de posicion
            $query = "INSERT INTO regitros(nombre,cedula, telefono, email, direccion, departamento, ciudad, fecha_creacion) VALUES (:nombre,:cedula, :telefono, :email, :direccion, :departamento, :ciudad, ::fecha_creacion)";

            //configurar el statemnt
            $stmt = $db->prepare($query);

            //Debemos pasar el binparam las variables, no podemos pasar el dato directamente
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":cedula", $cedula, PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindParam(":departamento", $departamento, PDO::PARAM_STR);
            $stmt->bindParam(":ciudad", $ciudad, PDO::PARAM_STR);


            // Asignando la fecha actual
            $stmt->bindParam(":fecha_creacion", $fecha_creacion, PDO::PARAM_STR);

            $resultado = $stmt->execute();

            //valdacion de si hubo resultado
            if ($resultado == true) {
                
                //validar creacion y obtener el ultimo id que seria el codigo, se va index.php
                $codigoID = $db->lastInsertId();
                $mensaje = "Registro creado correctamente";

                //mensaje1 configuracion 
                header('Location: index.php?mensaje='.urlencode($mensaje).'&codigo='.urldecode($codigoID));

                exit;
            }else{
                //se genera un error y se envia al index
                $error = "Error, no se pudo crear el registro";
                header('Location: index.php?error='.urlencode($error));
                exit();
            }
        }
    }

}
?>