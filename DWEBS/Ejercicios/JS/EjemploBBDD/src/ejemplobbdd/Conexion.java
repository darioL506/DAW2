package ejemplobbdd;

import Auxiliar.Constantes;
import java.sql.*;
import java.util.ArrayList;
import javax.swing.JOptionPane;

public class Conexion {

    //********************* Atributos *************************
    private java.sql.Connection Conex;
    //Atributo a través del cual hacemos la conexión física.
    private java.sql.Statement Sentencia_SQL;
    //Atributo que nos permite ejecutar una sentencia SQL
    private java.sql.ResultSet Conj_Registros;
    //(Cursor) En él están almacenados los datos.

    //********************** Constructores **************************
    //----------------------------------------------------------
    public Conexion() {
        //this.abrirConexion();
    }

    public void abrirConexion() {
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

    //********************** Métodos **************************
    //----------------------------------------------------------
    public int obtenerDatosTabla(String nom_tabla) {
        int cod = 0;
        String Sentencia = "SELECT * FROM " + nom_tabla;
        try {
            Conj_Registros = Sentencia_SQL.executeQuery(Sentencia);
        } catch (SQLException ex) {
            cod = ex.getErrorCode();
        }
        return cod;
    }

    //----------------------------------------------------------
    private void mostrarFilaActual() {
        int i, Num_Cols;
        try {
            Num_Cols = Conj_Registros.getMetaData().getColumnCount();
            for (i = 1; i <= Num_Cols; i++) {
                System.out.println(Conj_Registros.getString(i));
            }
        } catch (SQLException ex) {
        }
    }

    //----------------------------------------------------------
    public void mostrarTabla(String tabla) {
        try {
            obtenerDatosTabla(tabla);

            //Conj_Registros.first();
            while (Conj_Registros.next()) {
                mostrarFilaActual();
            }
        } catch (SQLException ex) {
        }
    }

    //----------------------------------------------------------
    public int modificarDato(String tabla, String DNI, String Nuevo_Nombre) {
        int cod = 0;
        String Sentencia = "UPDATE " + tabla + " SET Nombre = '" + Nuevo_Nombre + "' WHERE DNI = '" + DNI + "'";
        try {
            Sentencia_SQL.executeUpdate(Sentencia);
        } catch (SQLException ex) {
            cod = ex.getErrorCode();
        }
        return cod;
    }

    //----------------------------------------------------------
    public int insertarDato(String tabla, String DNI, String Nombre, String apell, int Tfno, int avi) {
        String Sentencia = "INSERT INTO " + tabla + " VALUES ('" + DNI + "'," + "'" + Nombre + "','" + apell + "','" + Tfno + "','" + avi + "')";
        int cod = 0;
        try {
            Sentencia_SQL.executeUpdate(Sentencia);
        } catch (SQLException sq) {
            cod = sq.getErrorCode();
        }
        return cod;
    }

    //----------------------------------------------------------
    public int borrarDato(String tabla, String DNI) {
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
    public String obtenerPrimero(String Campo) {
        String valor = "";
        try {
            Conj_Registros.first();
            valor = Conj_Registros.getString(Campo);

        } catch (SQLException ex) {
        }
        return valor;
    }

    //------------------------------------------------------
    public String obtenerUltimo(String Campo) {
        String valor = "";
        try {
            Conj_Registros.last();
            valor = Conj_Registros.getString(Campo);
        } catch (SQLException ex) {
        }
        return valor;
    }

    //------------------------------------------------------
    public String obtenerActual(String Campo) {
        String valor = "";
        try {
            valor = Conj_Registros.getString(Campo);
        } catch (SQLException ex) {
        }
        return valor;
    }

    //------------------------------------------------------
    public boolean irSiguiente() {
        boolean conseguido = false;
        try {
            conseguido = Conj_Registros.next();
        } catch (SQLException ex) {
        }
        return conseguido;
    }

    //------------------------------------------------------
    public boolean irAnterior() {
        boolean conseguido = false;
        try {
            conseguido = Conj_Registros.previous();
        } catch (SQLException ex) {
        }
        return conseguido;
    }

    //------------------------------------------------------
    public int vaciarTabla(String tabla) {
        String sentencia = "TRUNCATE " + tabla;
        int cod = 0;
        try {
            Sentencia_SQL.executeUpdate(sentencia);
        } catch (SQLException ex) {
        }
        return cod;
    }

    //------------------------------------------------------
    public int insertarDato(String tab, String d, String nom, int tfn) {
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
    public String obtenerPrimer(String Campo) {
        String valor = "";
        try {
            Conj_Registros.first();
            valor = Conj_Registros.getString(Campo);
        } catch (SQLException ex) {
        }
        return valor;
    }

    //----------------------------------------------------------
    public ArrayList obtenerDatosTablaArrayList(String nom_tabla) {
        ArrayList lp = new ArrayList();
        try {
            String Sentencia = "SELECT * FROM " + nom_tabla;
            Conj_Registros = Sentencia_SQL.executeQuery(Sentencia);
            while (Conj_Registros.next()) {
                lp.add(new Persona(Conj_Registros.getString("DNI"), Conj_Registros.getString("Nombre"), Conj_Registros.getString("Tfno")));
            }
        } catch (SQLException ex) {
        }
        return lp;
    }

    //---------------------------------------------------------
    public void cerrarConexion() {
        try {
            // resultado.close();
            this.Conex.close();
            System.out.println("Desconectado de la Base de Datos"); // Opcional para seguridad
        } catch (SQLException ex) {
            JOptionPane.showMessageDialog(null, ex.getMessage(), "Error de Desconexion", JOptionPane.ERROR_MESSAGE);
        }
    }

}
