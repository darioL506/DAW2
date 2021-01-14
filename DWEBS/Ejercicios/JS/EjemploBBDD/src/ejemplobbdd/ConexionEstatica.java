package ejemplobbdd;

import Auxiliar.Constantes;
import java.sql.*;
import javax.swing.JOptionPane;

public class ConexionEstatica {

    //********************* Atributos *************************
    private static java.sql.Connection Conex;
    //Atributo a través del cual hacemos la conexión lógica.
    private static java.sql.Statement Sentencia_SQL;
    //Atributo que nos permite ejecutar una sentencia SQL
    private static java.sql.ResultSet Conj_Registros;

    static {
        abrirConexion();
    }

    //----------------------------------------------------------
    public static void abrirConexion() {
        try {
            //Cargar el driver/controlador
            //String controlador = "com.mysql.jdbc.Driver";
            //String controlador = "oracle.jdbc.driver.OracleDriver";
            //String controlador = "sun.jdbc.odbc.JdbcOdbcDriver"; 
            String controlador = "org.mariadb.jdbc.Driver"; // MariaDB la version libre de MySQL (requiere incluir la librería jar correspondiente).
            //Class.forName(controlador).newInstance();
            Class.forName(controlador);

            String URL_BD = "jdbc:mysql://localhost/" + Constantes.bbdd;
            //String URL_BD = "jdbc:mariadb://"+this.servidor+":"+this.puerto+"/"+this.bbdd+"";
            //String URL_BD = "jdbc:oracle:oci:@REPASO";
            //String URL_BD = "jdbc:oracle:oci:@REPASO";
            //String URL_BD = "jdbc:odbc:REPASO";

            //Realizamos la conexión a una BD con un usuario y una clave.
            Conex = java.sql.DriverManager.getConnection(URL_BD, Constantes.usuario, Constantes.passwd);
            Sentencia_SQL = Conex.createStatement();
            System.out.println("Conexion realizada con éxito");
        } catch (Exception e) {
            System.err.println("Exception: " + e.getMessage());
        }
    }

    //----------------------------------------------------------
    public static int obtenerDatosTabla(String nom_tabla) {
        int cod = 0;
        try {
            String Sentencia = "SELECT * FROM " + nom_tabla;
            Conj_Registros = Sentencia_SQL.executeQuery(Sentencia);
        } catch (SQLException ex) {
            cod = ex.getErrorCode();
        }
        return cod;
    }

    //----------------------------------------------------------
    public static int modificarDato(String tabla, String DNI, String Nuevo_Nombre) {
        int cod = 0;
        try {
            String Sentencia = "UPDATE " + tabla + " SET Nombre = '" + Nuevo_Nombre + "' WHERE DNI = '" + DNI + "'";
            Sentencia_SQL.executeUpdate(Sentencia);
        } catch (SQLException ex) {
            cod = ex.getErrorCode();
        }
        return cod;
    }

    //----------------------------------------------------------
    public static int insertarDato(String tabla, String DNI, String Nombre, String apell, int Tfno, int avi) {
        int cod = 0;
        String Sentencia = "INSERT INTO " + tabla + " VALUES ('" + DNI + "'," + "'" + Nombre + "','" + apell + "','" + Tfno + "')";
        try {
            Sentencia_SQL.executeUpdate(Sentencia);
        } catch (SQLException sq) {
            cod = sq.getErrorCode();
        }
        return cod;
    }

    //----------------------------------------------------------
    public static int borrarDato(String tabla, String DNI) {
        int cod = 0;

        String Sentencia = "DELETE FROM " + tabla + " WHERE DNI = '" + DNI + "'";
        try {
            Sentencia_SQL.executeUpdate(Sentencia);
        } catch (SQLException ex) {
            cod = ex.getErrorCode();
        }

        return cod;
    }

    //------------------------------------------------------
    public static String obtenerPrimero(String Campo) {
        String valor = "";
        try {
            Conj_Registros.first();
            valor = Conj_Registros.getString(Campo);
        } catch (SQLException ex) {
        }
        return valor;
    }

    //------------------------------------------------------
    public static String obtenerUltimo(String Campo) {
        String valor = "";
        try {
            Conj_Registros.last();
            valor = Conj_Registros.getString(Campo);
        } catch (SQLException ex) {
        }
        return valor;
    }

    //------------------------------------------------------
    public static String obtenerActual(String Campo) {
        String valor = "";

        try {
            valor = Conj_Registros.getString(Campo);
        } catch (SQLException ex) {
        }
        return valor;
    }

    //------------------------------------------------------
    public static boolean irSiguiente() {
        boolean conseguido = false;
        try {
            conseguido = Conj_Registros.next();
        } catch (SQLException ex) {
        }
        return conseguido;
    }

    //------------------------------------------------------
    public static boolean irAnterior() {
        boolean conseguido = false;
        try {
            conseguido = Conj_Registros.previous();
        } catch (SQLException ex) {
        }
        return conseguido;
    }

    //------------------------------------------------------
    public static int vaciarTabla(String tabla) {
        String sentencia = "TRUNCATE " + tabla;
        int cod = 0;
        try {
            Sentencia_SQL.executeUpdate(sentencia);
        } catch (SQLException ex) {
            cod = ex.getErrorCode();
        }
        return cod;
    }

    //------------------------------------------------------
    public static int insertarDato(String tab, String d, String nom, int tfn) {
        String Sentencia = "INSERT INTO " + tab + " VALUES ('" + d + "'," + "'" + nom + "','" + tfn + "')";
        int cod = 0;
        try {
            Sentencia_SQL.executeUpdate(Sentencia);
        } catch (SQLException ex) {
            cod = ex.getErrorCode();
        }
        return cod;
    }

    //------------------------------------------------------
    public static String obtenerPrimer(String Campo) {
        String valor = "";

        try {
            Conj_Registros.first();
            valor = Conj_Registros.getString(Campo);
        } catch (SQLException ex) {
        }

        return valor;
    }

    //------------------------------------------------------
    public static void cerrarConexion() {
        try {
            // resultado.close();
            Conex.close();
            System.out.println("Desconectado de la Base de Datos"); // Opcional para seguridad
        } catch (SQLException ex) {
            JOptionPane.showMessageDialog(null, ex.getMessage(), "Error de Desconexion", JOptionPane.ERROR_MESSAGE);
        }
    }
}
