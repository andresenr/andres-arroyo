<?php

class conexion {

    private $servidor="boya9f4ww2jhbkwn6ayd-mysql.services.clever-cloud.com";
    private $usuario="umfucalnhiftvllt";
    private $contrasenia="bDfyPYiUOn5c3Vnnf0p8";
    private $conexion;

    public function __construct() {

        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=boya9f4ww2jhbkwn6ayd", $this->usuario, $this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            return "Falla de conexión".$e;
        }

    }

    public function ejecutar($sql) {

        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();

    }

    public function consultar ($sql) {

        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();

    }

}

?>
