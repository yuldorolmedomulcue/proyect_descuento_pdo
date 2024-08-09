<?php  

/*-------------------------- Instancia de PDO para conexion SQLITE--------------------------*/
$db = new PDO("sqlite:".__DIR__."/usuarios.db");

/*------------------------ Creacion DB usuarios.db, que aqui mismo--------------------------*/
//Configuarcion la db 
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Definicion de la tabla, trabajaremos desde el codigo
$definicion_tabla = "CREATE TABLE IF NOT EXISTS regitros(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    cedula TEXT NOT NULL,
    nombre TEXT NOT NULL,
    telefono TEXT NOT NULL,
    email TEXT NOT NULL,
    direccion TEXT NOT NULL,
    departamento TEXT NOT NULL,
    ciudad TEXT NOT NULL,
    fecha_creacion DATE
)";

//crea la bd
$resultado = $db -> exec($definicion_tabla);
// echo "Tabla creada correctamente";

?>