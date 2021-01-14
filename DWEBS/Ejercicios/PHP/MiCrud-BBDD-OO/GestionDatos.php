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
        self::$conexion = new mysqli('localhost', 'dario', 'Chubaca2020', 'ejemploclase');
        print "Conexión realizada de forma procedimental: " . self::$conexion->server_info . "<br/>";

        if (self::$conexion->errno) {
            print "Fallo al conectar a MySQL: " . self::$conexion->connect_errno;        
        }
    }
    
    public static function cerrarConexion() {
        self::$conexion->close();      
    }
    
    public static function consulta($consulta) {
        $stmt = self::$conexion->prepare($consulta);
        $stmt->execute();
        $resultado = $stmt->get_result();
        //-var_dump($resultado);
        return $resultado;
    }
    
    public static function insertPersonas($dn,$no,$pass,$tfno) {
        $query = "INSERT INTO personas (DNI, Nombre, Clave, Tfno) VALUES ('" . $dn . "','" . $no . "', '".$pass."', '" . $tfno . "')";
        
        if (self::$conexion->query($query)) {
            echo 'Registro insertado con éxito' . '<br/>';
        } else {
            echo "Error al insertar: " . self::$conexion->error . '<br/>';
        }
    }
    
    public static function deletePersonas($dni) {
        $query = "DELETE FROM personas WHERE DNI = '".$dni."'";
        if (self::$conexion->query($query)) {
            echo "Registro borrado Ok";
        } else {
            echo "Error al borrar: " . self::$conexion->error . '<br/>';
        }
    }

    public static function editPersonas($dni,$nombre,$tfno) {
        $query = "UPDATE personas SET Nombre = '".$nombre."', Tfno = '".$tfno."' WHERE DNI = '".$dni."'";
        if (self::$conexion->query($query)) {
            echo "Registro editado Ok";
        } else {
            echo "Error al editar: " . self::$conexion->error .'<br/>';
        }
    }

    public static function inicioSesion($nombre, $pass) {
        $resultado = self::consulta("SELECT * FROM personas WHERE Nombre ='".$nombre."' AND Clave = '".$pass."'");        
        $entra = false;
        while ($resultado->fetch_assoc()) {
            $entra = true;
        }
        return $entra;
    }
}
