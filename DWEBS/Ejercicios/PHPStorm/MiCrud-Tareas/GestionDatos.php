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
    
    private static function newConexion() {
        self::$conexion = new mysqli('localhost', 'dario', 'Chubaca2020', 'ejemploclase');
        print "Conexión realizada de forma procedimental: " . self::$conexion->server_info . "<br/>";

        if (self::$conexion->errno) {
            print "Fallo al conectar a MySQL: " . self::$conexion->connect_errno;        
        }
    }
    
    private static function cerrarConexion() {
        self::$conexion->close();      
    }
    
    private static function consulta($consulta) {
        self::newConexion();
        $stmt = self::$conexion->prepare($consulta);
        $stmt->execute();
        $resultado = $stmt->get_result();
        //-var_dump($resultado);
        self::cerrarConexion();
        return $resultado;
    }
    
    public static function getAllPersonas() {
        $resultado = self::consulta("SELECT * FROM personas");
        return $resultado;
    }

    public static function insertPersonas($dn,$no,$pass,$tfno) {
        self::newConexion();
        $query = "INSERT INTO personas (DNI, Nombre, Clave, Tfno) VALUES ('" . $dn . "','" . $no . "', '".$pass."', '" . $tfno . "')";
        
        if (self::$conexion->query($query)) {
            echo 'Registro insertado con éxito' . '<br/>';
        } else {
            echo "Error al insertar: " . self::$conexion->error . '<br/>';
        }
        self::cerrarConexion();
    }
    
    public static function deletePersonas($dni) {
        self::newConexion();
        $query = "DELETE FROM personas WHERE DNI = '".$dni."'";
        if (self::$conexion->query($query)) {
            echo "Registro borrado Ok";
        } else {
            echo "Error al borrar: " . self::$conexion->error . '<br/>';
        }
        self::cerrarConexion();
    }

    public static function editPersonas($dni,$nombre,$tfno) {
        self::newConexion();
        $query = "UPDATE personas SET Nombre = '".$nombre."', Tfno = '".$tfno."' WHERE DNI = '".$dni."'";
        if (self::$conexion->query($query)) {
            echo "Registro editado Ok";
        } else {
            echo "Error al editar: " . self::$conexion->error .'<br/>';
        }
        self::cerrarConexion();
    }

    public static function inicioSesion($nombre, $pass) {
        self::newConexion();
        $resultado = self::consulta("SELECT * FROM personas WHERE Nombre ='".$nombre."' AND Clave = '".$pass."'");        
        $entra = false;
        while ($resultado->fetch_assoc()) {
            $entra = true;
        }
        self::cerrarConexion();
        return $entra;
    }
    
    public static function newTarea($tarea,$descr,$nivel) {
        self::newConexion();
        $query = "INSERT INTO tareas (tarea, descripcion, porcDes, nivel) VALUES ('" . $tarea . "','" . $descr . "', 0, '" . $nivel . "')";        
        if (self::$conexion->query($query)) {
            echo 'Registro insertado con éxito' . '<br/>';
        } else {
            echo "Error al insertar: " . self::$conexion->error . '<br/>';
        }
        self::cerrarConexion();
    }
    
    public static function getAllTareas() {
        $resultado = self::consulta("SELECT * FROM tareas");
        return $resultado;
    }
}
