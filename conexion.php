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

    public function ejecutar($sql)
    {
        $this->conexion->exec($sql); //Se ejecuta la instrucción sql.
        return $this->conexion->lastInsertId(); //retorna el id insertado.
    }
    public function consulta($sql)
    {
        $resultado = $this->conexion->query($sql);
        return $resultado->fetchAll(PDO::FETCH_ASSOC); //Devuelve un array asociativo.
    }
}
