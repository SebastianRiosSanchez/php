<?php
class conexion
{
    private $server = "localhost";
    private $user = "root";  //Usuario de la base de datos.
    private $pass = "";   //Contraseña del usuario.
    private $conexion; //Guarda los datos de la conexión.

    public function __construct()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->server; dbname=album", $this->user, $this->pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return "falla de conexión" . $e;
        }
    }

    public function ejecutar($sql) //Se ejecuta la instrucción sql y sirve para Inertar/Eliminar/Actualizar
    {
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId(); //retorna el id insertado.
    }
    public function consultar($sql)
    {
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll(); //El método fetchAll retorna todos los registros que puedan modificarse con la sentencia SQL
    }
}
