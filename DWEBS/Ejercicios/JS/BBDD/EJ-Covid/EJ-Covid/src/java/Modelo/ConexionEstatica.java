package Modelo;

import Auxiliar.Constantes;
import java.sql.*;
import java.util.HashMap;
import java.util.LinkedList;
import javax.swing.JOptionPane;

public class ConexionEstatica {

    //********************* Atributos *************************
    private static java.sql.Connection Conex;
    //Atributo a través del cual hacemos la conexión física.
    private static java.sql.Statement Sentencia_SQL;
    //Atributo que nos permite ejecutar una sentencia SQL
    private static java.sql.ResultSet Conj_Registros;


    public static void nueva(){
        try {
         //Cargar el driver/controlador
            //String controlador = "com.mysql.jdbc.Driver";
            //String controlador = "com.mysql.cj.jdbc.Driver";
            //String controlador = "oracle.jdbc.driver.OracleDriver";
            //String controlador = "sun.jdbc.odbc.JdbcOdbcDriver"; 
            String controlador = "org.mariadb.jdbc.Driver"; // MariaDB la version libre de MySQL (requiere incluir la librería jar correspondiente).
            //Class.forName("org.mariadb.jdbc.Driver");              
            //Class.forName(controlador).newInstance();
            Class.forName(controlador);
            //Class.forName("com.mysql.jdbc.Driver"); 

            //String URL_BD = "jdbc:mysql://localhost:3306/" + Constantes.BBDD;
            //String URL_BD = "jdbc:mariadb://"+"localhost:3306"+"/"+Constantes.BBDD;
            //String URL_BD = "jdbc:oracle:oci:@REPASO";
            //String URL_BD = "jdbc:oracle:oci:@REPASO";
            //String URL_BD = "jdbc:odbc:REPASO";
            //String connectionString = "jdbc:mysql://localhost:3306/" + Constantes.BBDD + "?user=" + Constantes.usuario + "&password=" + Constantes.password + "&useUnicode=true&characterEncoding=UTF-8";

            //Realizamos la conexión a una BD con un usuario y una clave.
            //Conex = java.sql.DriverManager.getConnection(connectionString);
            //Conex = java.sql.DriverManager.getConnection(URL_BD, Constantes.usuario, Constantes.password);
            Conex = DriverManager.getConnection(  
                   "jdbc:mariadb://localhost:3306/"+ Constantes.BBDD, Constantes.usuario, Constantes.password); 
            Sentencia_SQL = Conex.createStatement();
            System.out.println("Conexion realizada con éxito");
        } catch (Exception e) {
            System.err.println("Exception: " + e.getMessage());
        }
    }
    
    public static void cerrarBD() {
        try {
            // resultado.close();
            Conex.close();
            System.out.println("Desconectado de la Base de Datos"); // Opcional para seguridad
        } catch (SQLException ex) {
            JOptionPane.showMessageDialog(null, ex.getMessage(), "Error de Desconexion", JOptionPane.ERROR_MESSAGE);
        }
    }

    
    
    public static Usuario existeUsuario(String usuario) {
        Usuario existe = null;
        try {
            String sentencia = "SELECT * FROM Usuarios WHERE nombre = '" + usuario + "'";
            ConexionEstatica.Conj_Registros = ConexionEstatica.Sentencia_SQL.executeQuery(sentencia);
            if (ConexionEstatica.Conj_Registros.next())//Si devuelve true es que existe.
            {
                existe = new Usuario(Conj_Registros.getString("nombre"), Conj_Registros.getString("password"));
            }
        } catch (SQLException ex) {
            System.out.println("Error en el acceso a la BD.");
        }
        return existe;//Si devolvemos null el usuario no existe.
    }

  
    
    /**
     * Usando una LinkedList.
     * @return 
     */
    public static LinkedList obtenerUsuarios() {
        LinkedList usuariosBD = new LinkedList<>();
        Usuario user = null;
        try {
            String sentencia = "SELECT * FROM Usuarios";
            ConexionEstatica.Conj_Registros = ConexionEstatica.Sentencia_SQL.executeQuery(sentencia);
            while(Conj_Registros.next()){
                user = new Usuario(Conj_Registros.getInt("id"),Conj_Registros.getString("dni"),Conj_Registros.getString("nombre"),Conj_Registros.getInt("rol"), Conj_Registros.getInt("activo"));
                usuariosBD.add(user);
            }
        } catch (SQLException ex) {
        }
        return usuariosBD;
    }
    
    public static void nuevoUsuario(String dni, String nombre, String password, int rol, int activo) throws SQLException {
        String Sentencia = "INSERT INTO usuario (dni, nombre, password, rol, activo) "
                + "VALUES ('"+ dni +"','" + nombre + "','" + password + "',"+ rol + ","+ activo +")";
        ConexionEstatica.Sentencia_SQL.executeUpdate(Sentencia);
    }
    
    public void modificarUsuario(int id, String dni, String nombre, int rol, int activo) throws SQLException {
        String Sentencia = "UPDATE usaurio SET dni = '"+dni+"',"
                + "nombre = '"+ nombre +"',"                
                + "rol = "+rol+","
                + "activo = "+activo+" "
                + "WHERE id = " + id + "";
        ConexionEstatica.Sentencia_SQL.executeUpdate(Sentencia);
    }

    //----------------------------------------------------------
    public void Modificar_Dato(String tabla, String nombre, String apellidos, String newPass) throws SQLException {
        String Sentencia = "UPDATE " + tabla + " SET password = '" + newPass + "' WHERE nombre = '" + nombre + "' AND apellidos = '" + apellidos + "'";
        ConexionEstatica.Sentencia_SQL.executeUpdate(Sentencia);
    }

    //----------------------------------------------------------
    public static void Insertar_Dato(String tabla, String nombre, String apellido, String password, String genero, String fecha, boolean dwc, boolean dws, boolean di, String curso) throws SQLException {
        String Sentencia = "INSERT INTO " + tabla + " VALUES ('" + nombre + "'," + "'" + apellido + "','" + password + "','0','" + genero + "','" + fecha + "'," + dwc + "," + dws + "," + di + ",'" + curso + "')";
        ConexionEstatica.Sentencia_SQL.executeUpdate(Sentencia);
    }

    //----------------------------------------------------------
    public void Borrar_Dato(String tabla, String DNI) throws SQLException {
        String Sentencia = "DELETE FROM " + tabla + " WHERE DNI = '" + DNI + "'";
        ConexionEstatica.Sentencia_SQL.executeUpdate(Sentencia);
    }

}
