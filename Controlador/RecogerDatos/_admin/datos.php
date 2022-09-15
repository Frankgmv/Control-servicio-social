<?php
include "../../../Modelo/conexion_db.php";

$ida = $_SESSION['id_adm'];

class Admin
{
    var $identidad;
    var $nombres;
    var $apellidos;
    var $edad;
    var $fecha_registro;
    var $celular;
    var $correo;
    var $rol;
    var $ocupacion;
    var $donde_labora;

    function Admin($id)
    {
        global $conn;
        $sql_data = "SELECT * FROM ADMINS WHERE IDENTIDAD = '$id';";
        $consult = mysqli_query($conn, $sql_data);
        $result = mysqli_fetch_assoc($consult);

        $this->identidad = $id;
        $this->nombres = $result['NOMBRES'];
        $this->apellidos = $result['APELLIDOS'];
        $this->edad = $result['EDAD'];
        $this->fecha_registro = $result['FECHA_REGISTRO'];
        $this->celular = $result['CELULAR'];
        $this->correo = $result['CORREO'];
        $this->rol = $result['ROL'];
        $this->ocupacion = $result['OCUPACION'];
        $this->donde_labora = $result['DONDE_LABORA'];
    }
    function get_directivos()
    {
    }

    function Get_estudiantes()
    {
    }

    function  Get_ (){}
}

$Ferxxo = new Admin($ida);

header("../../../Vista/perfiles/_admin/perfil_admin.php");
