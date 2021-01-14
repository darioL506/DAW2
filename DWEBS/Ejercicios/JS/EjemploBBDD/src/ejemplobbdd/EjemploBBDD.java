package ejemplobbdd;

import Auxiliar.Constantes;
import java.sql.SQLException;
import java.util.ArrayList;

/**
 *
 * @author faranzabe
 */
public class EjemploBBDD {

    public static void main(String[] args) throws SQLException, ClassNotFoundException, InstantiationException, IllegalAccessException {

        //------------------------------------------------------------------------------------------------------
        //Ejemplo 1) --> Manejo de la BD desde un programa de consola sin entorno gráfico.
//        Conexion co = new Conexion(Constantes.bbdd, Constantes.usuario, Constantes.passwd);
//        co.insertarDato("personas", "300C", "Pedro",8999);
//        co.mostrarTabla("personas");
//        System.out.println("----------");
//        co.modificarDato("personas", "300C", "Marta");
//        co.mostrarTabla("personas");
//        System.out.println("----------");
//        co.borrarDato("personas", "300C");
//        co.mostrarTabla("personas");


        //------------------------------------------------------------------------------------------------------
        //Ejemplo 2) --> Acceso a la BD desde una aplicación de ventanas. La conexión se crea aquí y se le pasa
        //               a la ventana que tendrá un atributo de tipo conexión.
        Conexion co = new Conexion();
        Formulario form = new Formulario(co);
        form.setVisible(true);


        //------------------------------------------------------------------------------------------------------
        //Ejemplo 3) --> Igual que el 2 salvo que en esta ocasión no se le pasa la conexión. Se usa otra clase
        //               conexión con los métodos estáticos para poder ser accesible desde todas las partes de la aplicación.
//        FormularioConexEstatica form2 = new FormularioConexEstatica();
//        form2.setVisible(true);

        
        
        //OTRAS CONSIDERACIONES: No es incorrecto que los métodos de la clase conexión devuelvan los datos 
        //en formato: ArrayList, LinkedList, List, Map, .... Porque son clases incorporadas en la API de Java
        //y disponibles, por lo tanto, en cualquier aplicación JAVA. NO es correcto devolver el ResultSet ya que
        //eso compromete la encapsulación, es decir: si cambiamos el motor de la BD o incluso la quitamos el ResultSet
        //no tiene sentido por lo que tendríamos que corregir las clases afectadas. Por la misma razón todas las sentencias SQL
        //deben existir SOLO y EXCLUSIVAMENTE en la clase conexión.
        //Ejemplo: toda esta información va a la consola.
        Conexion co2 = new Conexion();
        co2.abrirConexion();
        ArrayList<Persona> lista = co2.obtenerDatosTablaArrayList(Constantes.TablaPersonas);
        for (Persona p : lista) {
            System.out.println(p);
            System.out.println(p.getDNI());
        }
        co2.cerrarConexion();
        //En este ejemplo hemos abierto la conexión, hemos sacado los datos y luego hemos cerrado.
    }

}
