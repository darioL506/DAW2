<?php
class Conexion {
    
    private function newConexion() {
        $conexion = mysqli_connect('localhost', 'dario', 'Chubaca2020', 'ejemploclase');
        print "Conexión realizada de forma procedimental: " . mysqli_get_server_info($conexion) . "<br/>";

        if (mysqli_connect_errno($conexion)) {
            print "Fallo al conectar a MySQL: " . mysqli_connect_error();        
        }
        return $conexion;
    }
    
    private function cerrarConexion($conexion) {
        mysqli_close($conexion);        
    }
    
    public function consulta($consulta) {
        $conexion = self::newConexion();
        $resultado = mysqli_query($conexion, $consulta);        
        self::cerrarConexion($conexion);
        return $resultado;
    }
    
    public function insertPersonas($dn,$no,$pass,$tfno) {
        $conexion = self::newConexion();
        $query = "INSERT INTO personas (DNI, Nombre, Clave, Tfno) VALUES ('" . $dn . "','" . $no . "', '".$pass."', '" . $tfno . "')";
        if (mysqli_query($conexion, $query)) {
            echo 'Registro insertado con éxito' . '<br/>';
        } else {
            echo "Error al insertar: " . mysqli_error($conexion) . '<br/>';
        }
        self::cerrarConexion($conexion);
    }
    
    public function deletePersonas($dni) {
        $conexion = self::newConexion();
        $query = "DELETE FROM personas WHERE DNI = '".$dni."'";
        if (mysqli_query($conexion, $query)) {
            echo "Registro borrado Ok";
        } else {
            echo "Error al borrar: " . mysqli_error($conexion);
        }
        self::cerrarConexion($conexion);
    }
    
    public function editPersonas($dni,$nombre,$tfno) {
        $conexion = self::newConexion();
        $query = "UPDATE personas SET Nombre = '".$nombre."', Tfno = '".$tfno."' WHERE DNI = '".$dni."'";
        if (mysqli_query($conexion, $query)) {
            echo "Registro editado Ok";
        } else {
            echo "Error al editar: " . mysqli_error($conexion);
        }
        self::cerrarConexion($conexion);
    }

    public function inicioSesion($nombre, $pass) {
        $conexion = self::newConexion();
        $resultado = consulta($conexion, "SELECT * FROM personas WHERE Nombre ='".$nombre."' AND Clave = '".$pass."'");        
        $entra = false;
        while ($fila = mysqli_fetch_array($resultado)) {
            $entra = true;
        }
        self::cerrarConexion($conexion);
        return $entra;
    }
}