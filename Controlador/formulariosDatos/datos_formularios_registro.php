<?php
// TODO esta página es para recibir los datos de los distintos formularios de registro. nuevo_registro.php
#primera verificación

include("../../Modelo/conexion_db.php");

// https://www.htmlquick.com/es/reference/tags/input-password.html  para mejorar tus campos de contraseñas

if (isset($_POST['Crear_estudiantes']) or isset($_POST['Crear_directivos']) or isset($_POST['Crear_admins'])) {

    #Guardar los datos de los estudiantes en la base de datos
    if (isset($_POST['Crear_estudiantes'])) {
        $identidad = $_POST['identidad'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $edad = $_POST['edad'];
        $fecha_actual = $_POST['fecha_actual'];
        $celular = strval($_POST['celular']);
        $correo = $_POST['correo'];
        $rol = $_POST['rol'];
        $grado = $_POST['grado'];
        $nombre_tecnica = $_POST['nombre_tecnica'];
        $contra = $_POST['contra'];
        $ClaveEspecial3 = $_POST['claveEspecial3'];
        $tyc = $_POST['tyc'];

        $verif = "SELECT CLAVE_ESTUDIANTES  FROM SUPER_ADMINS WHERE IDENTIDAD = '1011';";

        $result = mysqli_query($connEstudiante, $verif);

        $guar = mysqli_fetch_array($result);

        if ($ClaveEspecial3 == $guar['CLAVE_ESTUDIANTES']) {

            $contra_segura = password_hash($contra, PASSWORD_BCRYPT, ['mas' => 11]);

            #CONSULTA PARA GUARDAR LOS DATOS
            $consultaEstudiantes = "INSERT INTO ESTUDIANTES (IDENTIDAD, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, CELULAR, CORREO, ROL, GRADO, NOMBRE_TECNICA, CONTRA, TYC)
             VALUES ('$identidad', '$nombres', '$apellidos', $edad, '$fecha_actual', '$celular', '$correo', '$rol', '$grado', '$nombre_tecnica', '$contra_segura', '$tyc');";

            $return = mysqli_query($connEstudiante, $consultaEstudiantes);

            if (!$return) {
                #mensaje de error
                $_SESSION['tipoAlerta'] = "warning";
                $_SESSION['tituloDeAlerte'] = " Registro. ";
                $_SESSION['mensajeDeAlerta'] = "El estudiante no a podido ser registrado correctamente.";
                header('Location:../../index.php');
            } else {
                #mensaje de éxito al guardar 
                $_SESSION['tituloDeAlerte'] = " Registro. ";
                $_SESSION['tipoAlerta'] = "success";
                $_SESSION['mensajeDeAlerta'] = "El estudiante a podido ser registrado correctamente, inicie sesión normalmente.";
                header('Location:../../index.php');
            }
        } else {
            #De clave  
            $_SESSION['tipoAlerta'] = "error";
            $_SESSION['tituloDeAlerte'] = " Clave especial incorrecta.";
            $_SESSION['mensajeDeAlerta'] = "Si no conoces la clave especial de estudiante pídela al administrador para que te conceda el permiso de registro.";
            header('Location:../../index.php');
        }
    }

    #Guardar los datos de los directivos en la base de datos
    if (isset($_POST['Crear_directivos'])) {

        $identidad = $_POST['identidad'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $edad = $_POST['edad'];
        $fecha_actual = $_POST['fecha_actual'];
        $celular = strval($_POST['celular']);
        $correo = $_POST['correo'];
        $rol = $_POST['rol'];
        $Establecimiento = $_POST['donde_labora'];
        $ocupacion = $_POST['ocupacion'];
        $contra = $_POST['contra'];
        $ClaveEspecial2 = $_POST['claveEspecial2'];
        $tyc = $_POST['tyc'];


        $verif = "SELECT CLAVE_DIRECTIVOS FROM SUPER_ADMINS WHERE IDENTIDAD = '1011';";

        $result = mysqli_query($connDirectivo, $verif);

        $guar = mysqli_fetch_array($result);

        if ($ClaveEspecial2 == $guar['CLAVE_DIRECTIVOS']) {

            $contra_segura = password_hash($contra, PASSWORD_BCRYPT, ['vueltas' => 13]);

            $consulta = "INSERT INTO DIRECTIVOS (IDENTIDAD, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, CELULAR, CORREO, ROL, DONDE_LABORA, OCUPACION, CONTRA, TYC)
            VALUES ('$identidad', '$nombres', '$apellidos', $edad, '$fecha_actual', '$celular', '$correo', '$rol', '$Establecimiento', '$ocupacion', '$contra_segura', '$tyc');";

            $return = mysqli_query($connDirectivo, $consulta);
            echo "Entre: " . $guar['CLAVE_DIRECTIVOS'];
            if (!$return) {
                #mensaje de error
                $_SESSION['tipoAlerta'] = "warning";
                $_SESSION['tituloDeAlerte'] = " Registro. ";
                $_SESSION['mensajeDeAlerta'] = "El directivo no a podido ser registrado.";
                header('Location:../../index.php');
            } else {
                #mensaje de éxito al guardar
                $_SESSION['tipoAlerta'] = "success";
                $_SESSION['tituloDeAlerte'] = " Registro. ";
                $_SESSION['mensajeDeAlerta'] = "Directivo registrado correctamente, espere confirmación del perfil";
                header('Location:../../index.php');
            }
        } else {
            #De clave  
            $_SESSION['tipoAlerta'] = "error";
            $_SESSION['tituloDeAlerte'] = " Clave especial incorrecta. ";
            $_SESSION['mensajeDeAlerta'] = "Si no conoces la clave especial pídela al super administrador para que te conceda el permiso de ser directivo en la plataforma.";
            header('Location:../../index.php');
        }
    }
    #Guardar los datos de los admins en la base de datos
    if (isset($_POST['Crear_admins'])) {

        # TODO CREAR UNA INTERFACE PARA QUE EL SUPER-ADMINISTRADOR PUEDA CAMBIAR EL CÓDIGO DE VERIFICACIÓN PARA PODER CREAR SU PERFIL DE ADMINISTRADOR ALIADO, ESTE CÓDIGO PODRÁ SER MODIFICADO SOLO POR EL SUPER-ADMINISTRADOR PARA DAR ACCESOS NUEVOS A OTROS Y LUEGO ACEPTAR SU SOLICITUD DE INGRESOS DE DATOS LA BASE DE DATOS CENTRAL DE LA PLATAFORMA "CONTROL DE SERVICIO SOCIAL".

        $identidad = $_POST['identidad'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $edad = $_POST['edad'];
        $fecha_actual = $_POST['fecha_actual'];
        $celular = strval($_POST['celular']);
        $correo = $_POST['correo'];
        $rol = $_POST['rol'];
        $Establecimiento = $_POST['donde_labora'];
        $contra = $_POST['contra'];
        $ClaveEspecial = $_POST['ClaveEspecial'];
        $ocupacion = $_POST['ocupacion'];
        $tyc = $_POST['tyc'];


        $verificacion = "SELECT CLAVE_ADMINS FROM SUPER_ADMINS WHERE IDENTIDAD = '1011';";

        $return = mysqli_query($connAdmin, $verificacion);

        $guardarAca = mysqli_fetch_array($return);

        if ($ClaveEspecial === $guardarAca['CLAVE_ADMINS']) {

            $contra_segura = password_hash($contra, PASSWORD_BCRYPT, ['vueltas' => 39]);

            $consulta =  "INSERT INTO ADMINS (IDENTIDAD, NOMBRES, APELLIDOS, EDAD, FECHA_REGISTRO, CELULAR, CORREO, ROL, DONDE_LABORA, OCUPACION, CONTRA, TYC) VALUES('$identidad', '$nombres', '$apellidos', $edad, '$fecha_actual', '$celular', '$correo', '$rol', '$Establecimiento', '$ocupacion', '$contra_segura', '$tyc');";


            $return = mysqli_query($connAdmin, $consulta);


            if (!$return) {
                #mensaje de error
                $_SESSION['tipoAlerta'] = "warning";
                $_SESSION['tituloDeAlerte'] = " Registro. ";
                $_SESSION['mensajeDeAlerta'] = "El usuario no a podido ENVIAR su solicitud de administrador.";
                header('Location:../../index.php');
            } else {
                #mensaje de éxito al guardar
                $_SESSION['tipoAlerta'] = "success";
                $_SESSION['tituloDeAlerte'] = " Registro. ";
                $_SESSION['mensajeDeAlerta'] = "Solicitud de administrador nuevo admin enviada correctamente, espere confirmación del super administrador.";
                header('Location:../../index.php');
            }
        } else {

            // #De clave  
            $_SESSION['tipoAlerta'] = "error";
            $_SESSION['tituloDeAlerte'] = " Clave especial incorrecta. ";
            $_SESSION['mensajeDeAlerta'] = "Si no conoces la clave especial pídela al super administrador para que te conceda el permiso de ser administrador.";
            header('Location:../../index.php');
        }
    }
} else {

    header("Location:errores.php");
}

mysqli_close($connAdmin);
mysqli_close($connDirectivo);
mysqli_close($connEstudiante);
