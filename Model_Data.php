<?php

class Data {

    private $con_info = [
        "host" => "localhost",
        "user" => "root",
        "passwd" => "",
        "database" => "areabodega_1",
        "port" => 3306
    ];
    private $con = null;

    public function __construct() {
        $this->con = new mysqli($this->con_info["host"], $this->con_info["user"],
                $this->con_info["passwd"], $this->con_info["database"],
                $this->con_info["port"]);

        if ($this->con->connect_error) {
            die("Error de conexión! : " . $this->con->connect_error);
        }
    }

    public function getConnection() {
        return $this->con;
    }

    //reconoce si existe un usuario con ese rut y passwd
    public function isUserPassValid($rut, $pass) {
        $sql = "SELECT COUNT(*) AS 'existe' 
	            FROM usuario
	            WHERE rut = '$rut' AND passwd ='$pass'";

        $query = $this->con->query($sql);

        while ($fila = $query->fetch_row()) {
            return ($fila[0] == 1);
        }

        return false;
    }

    public function getUserbyRut($rut) {
        $sql = "SELECT * FROM usuario where rut = '$rut'";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getArea() {
        $sql = "SELECT * FROM area_usuario;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addStock($nombre, $cantidad, $descripcion, $area) {
        $sql = "INSERT INTO `stock` (`id`, `nombre`, `activo`, `cantidad_t`, `descripcion`, `area_user_id_fk`) VALUES (null, '$nombre', '1', '$cantidad', '$descripcion', '$area');";
        $this->con->query($sql);
    }
    
    public function getHistorial() {
        $sql = "SELECT * FROM historial;";
        $query = $this->con->query($sql);
        return $query;
    }

}
?>



