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

    public function getStockByArea($Area) {
        $sql = "SELECT stock.nombre, stock.activo as 'activo', stock.cantidad_t, stock.descripcion, area_usuario.nombre AS 'area' FROM stock INNER JOIN area_usuario ON area_user_id_fk = area_usuario.id WHERE area_usuario.id = '$Area';";
        $query = $this->con->query($sql);
        return $query;
    }
    
    public function getHistorialByArea($Area){
        $sql = "select stock.nombre as 'nombre', historial.cantidad as 'cantidad', solicitud.fecha_hora as 'fecha-hora', solicitud.descripcion as 'descripcion', solicitud.estado_s as 'estado', area_usuario.nombre as 'area' from historial INNER JOIN stock ON stock_id_fk = stock.id INNER JOIN solicitud ON solicitud_id_fk = solicitud.id INNER JOIN area_usuario ON area_usuario_id_fk = area_usuario.id where area_usuario.id = $Area";
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
                $rut = $option['rut'];
                $nombre = $option['nombre'];
                $apellido = $option['apellido'];
                $passwd = $option['passwd'];
                $email = $option['email'];
                $telefono = $option['telefono'];
                $area_usuario_id_fk = $option['area_usuario_id_fk'];
                $tipo_user_id_fk = $option['tipo_user_id_fk'];
                $passwd_t = $option['passwd_t'];
                $existe = $option['existe'];
                $user = new Usuario();
                $user->Usuario($id, $rut, $nombre, $apellido, $passwd, $email, $telefono, $area_usuario_id_fk, $tipo_user_id_fk, $passwd_t);
            }
            if ($existe != 1) {
                return false;
            } else {
                return $user;
            }
        } else {
            return false;
        }
    }

    public function updatePass($rut, $passwd, $passwd_t) {
        $sql = "Update usuario SET passwd = SHA2('$passwd',0), passwd_t = '$passwd_t' WHERE usuario.rut = '$rut'";
        $this->con->query($sql);
    }

    public function updStock($id, $cantidad) {
        $sql = "UPDATE `stock` SET `cantidad_t` = '$cantidad' WHERE `stock`.`id` = $id;";

        $query = $this->con->query($sql);
    }

    public function getAllusers() {
        $sql = "SELECT usuario.rut, usuario.nombre, usuario.apellido, usuario.email, usuario.telefono, area_usuario.nombre AS 'area', tipo_user.nombre AS 'tipo' FROM usuario INNER JOIN area_usuario ON usuario.area_usuario_id_fk = area_usuario.id INNER JOIN tipo_user ON usuario.tipo_user_id_fk = tipo_user.id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addObs($user, $gravedad, $fecha, $hora, $obs) {
        $sql = "INSERT INTO `reporte` (`id`, `usuario_id_fk`, `gravedad`, `fecha`, `hora`, `observacion`) VALUES (null, '$user', '$gravedad', '$fecha', '$hora', '$obs');";
        $query = $this->con->query($sql);
    }

    public function getTable($name) {
        $sql = "SELECT COUNT(*) as 'registro' FROM $name";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getAllTables() {
        $sql = "SELECT table_name, table_rows
    FROM INFORMATION_SCHEMA.TABLES
    WHERE TABLE_SCHEMA = 'areabodega_1';";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getDataTables($table) {
        $sql = "SELECT * FROM $table";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getAllAreas() {
        $sql = "SELECT area_usuario.nombre FROM area_usuario;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getAvion() {
        $sql = "SELECT avion.patente, avion.nombre, avion.capacidad, avion.volumen FROM avion;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getTCarga() {
        $sql = "SELECT tipo_carga.nombre FROM tipo_carga;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getClasificacion() {
        $sql = "SELECT tipo_clasificacion.nombre FROM tipo_clasificacion;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getTipoUser() {
        $sql = "SELECT tipo_user.nombre FROM tipo_user;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getBoleto() {
        $sql = "SELECT boleto.codigo, cliente.nombre as 'Nombre cliente', cliente.apellido as 'Apellido cliente', vuelo.codigo as 'Codigo de vuelo' FROM boleto INNER JOIN cliente ON cliente.id = cliente_id_fk INNER JOIN vuelo ON vuelo.id = vuelo_id_fk;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCarga() {
        $sql = "SELECT carga.peso, carga.descripcion, tipo_carga.nombre as 'Tipo carga', cliente.rut as 'R.U.T cliente', tipo_clasificacion.nombre as 'Clasificacion', avion.patente as 'Patente de avion' FROM carga INNER JOIN tipo_carga ON tipo_carga_id_fk = tipo_carga.id INNER JOIN cliente ON cliente_id_fk = cliente.id INNER JOIN tipo_clasificacion ON clasificacion_id_fk = tipo_clasificacion.id INNER JOIN avion ON avion_id_fk = avion.id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCliente() {
        $sql = "SELECT cliente.rut, cliente.nombre, cliente.apellido, cliente.email, cliente.telefono, cliente.equipaje, cliente.numeroEquipaje FROM cliente;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getHistorial() {
        $sql = "SELECT historial.cantidad, solicitud.fecha_hora as 'fecha y hora de solicitud', solicitud.id as 'id de la solicitud', stock.nombre as 'articulo' FROM historial INNER JOIN solicitud ON solicitud_id_fk = solicitud.id INNER JOIN stock ON stock_id_fk = stock.id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getReporte() {
        $sql = "SELECT usuario.rut as 'RUT usuario', reporte.gravedad, reporte.fecha, reporte.hora, reporte.observacion FROM reporte INNER JOIN usuario ON usuario_id_fk = usuario.id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getSolicitud() {
        $sql = "select solicitud.descripcion as 'descripcion', solicitud.fecha_hora 'fecha-hora', solicitud.estado_s as 'estado', usuario.rut as 'RUT usuario' FROM solicitud INNER JOIN usuario ON usuario_id_fk = usuario.id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getStock() {
        $sql = "SELECT stock.nombre as 'nombre', stock.activo as 'activo', stock.cantidad_t as 'cantidad', stock.descripcion as 'descripcion', area_usuario.nombre as 'area' FROM stock INNER JOIN area_usuario ON area_user_id_fk = area_usuario.id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getVuelo() {
        $sql = "select vuelo.codigo as 'codigo', vuelo.fecha_horaS as 'fecha-hora salida', vuelo.fecha_horaE as 'fecha-hora entrada', vuelo.destino, vuelo.escala, avion.patente as 'patente de avion' FROM vuelo INNER JOIN avion ON avion_id_fk = avion.id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getTypeUser() {
        $sql = "SELECT * FROM tipo_user";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addUser($rut, $nombre, $apellido, $email, $telefono, $area, $tipo, $passwT) {
        $sql = "INSERT INTO usuario (id, rut, nombre, apellido, passwd, email, telefono, area_usuario_id_fk, tipo_user_id_fk, passwd_t) VALUES (NULL, '$rut', '$nombre', '$apellido', sha2('$passwT',0), '$email', '$telefono', '$area', '$tipo', '1');";
        $query = $this->con->query($sql);
    }

    public function updUser($email, $telefono, $area, $rut) {
        $sql = "UPDATE usuario SET email = '$email', telefono = '$telefono', area_usuario_id_fk = '$area' WHERE usuario.rut = '$rut';";
        $query = $this->con->query($sql);
    }

}
?>



