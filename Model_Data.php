<?php

require 'clases_php/Usuario.php';

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
    public function isUserPassValid($correo, $pass) {
        $sql = "SELECT COUNT(*) AS 'existe' 
	            FROM usuario
	            WHERE email = '$correo' AND passwd = sha2('$pass',0)";

        $query = $this->con->query($sql);

        while ($fila = $query->fetch_row()) {
            return ($fila[0] == 1);
        }

        return false;
    }

    public function getUserbyRut($correo) {
        $sql = "SELECT * FROM usuario where email = '$correo'";
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

    public function getStockByArea($area) {
        $sql = "SELECT * FROM stock where area_user_id_fk = '$area'";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getStock() {
        $sql = "SELECT * FROM stock";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getHistorial() {
        $sql = "SELECT * FROM historial;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getUserbyemail($email) {
        $sql = "SELECT *, COUNT(*) AS 'existe' FROM usuario where email = '$email';";
        $query = $this->con->query($sql);
        $existe = 0;
        if ($query) {
            foreach ($query as $option) {
                $id = $option['id'];
                $rut= $option['rut'];
                $nombre= $option['nombre'];
                $apellido= $option['apellido'];
                $passwd= $option['passwd'];
                $email= $option['email'];
                $telefono= $option['telefono'];
                $area_usuario_id_fk= $option['area_usuario_id_fk'];
                $tipo_user_id_fk= $option['tipo_user_id_fk'];
                $passwd_t= $option['passwd_t'];
                $existe = $option['existe'];
                $user = new Usuario();
                $user->Usuario($id, $rut, $nombre, $apellido, $passwd, $email, $telefono, $area_usuario_id_fk, $tipo_user_id_fk, $passwd_t);
                
            }
            if ($existe !=1){
                return false;
            }else{
                return $user;
            }
        }
        else{
            return false;
        }
        
    }
    
    public function updatePass($rut, $passwd, $passwd_t) {
        $sql = "Update usuario SET passwd = SHA2('$passwd',0), passwd_t = '$passwd_t' WHERE usuario.rut = '$rut'";
        $this->con->query($sql);
    }
    
    public function updStock($id,$cantidad) {
        $sql = "UPDATE `stock` SET `cantidad_t` = '$cantidad' WHERE `stock`.`id` = $id;";
        
        $query = $this->con->query($sql);
        
    }
    
    public function getAllusers() {
        $sql = "SELECT usuario.rut, usuario.nombre, usuario.apellido, usuario.email, usuario.telefono, area_usuario.nombre AS 'area', tipo_user.nombre AS 'tipo' FROM usuario INNER JOIN area_usuario ON usuario.area_usuario_id_fk = area_usuario.id INNER JOIN tipo_user ON usuario.tipo_user_id_fk = tipo_user.id;";
        $query = $this->con->query($sql);
        return $query;
        
    }
    

}
?>



