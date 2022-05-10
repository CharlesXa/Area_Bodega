<?php

class Usuario {
    private $id;
    private $rut;
    private $nombre;
    private $apellido;
    private $passwd;
    private $email;
    private $telefono;
    private $area_usuario_id_fk;
    private $tipo_user_id_fk;
    private $passwd_t;
    
    public function Usuario($id, $rut, $nombre, $apellido, $passwd, $email, $telefono, $area_usuario_id_fk, $tipo_user_id_fk, $passwd_t) {
        $this->id = $id;
        $this->rut = $rut;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->passwd = $passwd;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->area_usuario_id_fk = $area_usuario_id_fk;
        $this->tipo_user_id_fk = $tipo_user_id_fk;
        $this->passwd_t = $passwd_t;
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getRut() {
        return $this->rut;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getPasswd() {
        return $this->passwd;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getArea_usuario_id_fk() {
        return $this->area_usuario_id_fk;
    }

    public function getTipo_user_id_fk() {
        return $this->tipo_user_id_fk;
    }

    public function getPasswd_t() {
        return $this->passwd_t;
    }


}
