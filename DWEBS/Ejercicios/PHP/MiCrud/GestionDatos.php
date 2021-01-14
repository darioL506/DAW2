<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestionDatos
 *
 * @author dario
 */
class GestionDatos {
    static  $conexion;
    
    public static function newConexion() {
        self::$conexion = mysqli_connect('localhost', 'dario', 'Chubaca2020', 'ejemploclase');
        print "Conexión realizada de forma procedimental: " . mysqli_get_server_info(self::$conexion) . "<br/>";

        if (mysqli_connect_errno(self::$conexion)) {
            print "Fallo al conectar a MySQL: " . mysqli_connect_error();        
        }
    }
    
    public static function cerrarConexion() {
        mysqli_close(self::$conexion);        
    }
    
    public static function consulta($consulta) {
        $resultado = mysqli_query(self::$conexion, $consulta);
        return $resultado;
    }
    
    public static function insertPersonas($dn,$no,$pass,$tfno) {
        $query = "INSERT INTO personas (DNI, Nombre, Clave, Tfno) VALUES ('" . $dn . "','" . $no . "', '".$pass."', '" . $tfno . "')";
        if (mysqli_query(self::$conexion, $query)) {
            echo 'Registro insertado con éxito' . '<br/>';
        } else {
            echo "Error al insertar: " . mysqli_error(self::$conexion) . '<br/>';
        }
    }
    
    public static function deletePersonas($dni) {
        $query = "DELETE FROM personas WHERE DNI = '".$dni."'";
        if (mysqli_query(self::$conexion, $query)) {
            echo "Registro borrado Ok";
        } else {
            echo "Error al borrar: " . mysqli_error(self::$conexion);
        }
    }

    public static function editPersonas($dni,$nombre,$tfno) {
        $query = "UPDATE personas SET Nombre = '".$nombre."', Tfno = '".$tfno."' WHERE DNI = '".$dni."'";
        if (mysqli_query(self::$conexion, $query)) {
            echo "Registro editado Ok";
        } else {
            echo "Error al editar: " . mysqli_error(self::$conexion);
        }
    }

    public static function inicioSesion($nombre, $pass) {
        $resultado = consulta(self::$conexion, "SELECT * FROM personas WHERE Nombre ='".$nombre."' AND Clave = '".$pass."'");        
        $entra = false;
        while ($fila = mysqli_fetch_array($resultado)) {
            $entra = true;
        }
        return $entra;
    }
}
