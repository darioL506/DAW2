<%-- 
    Document   : controlador
    Created on : 07-oct-2020, 13:13:25
    Author     : dario
--%>

<%@page import="Modelo.Conexion"%>
<%@page import="Modelo.ConexionEstatica"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.util.LinkedList" %>
<%@page import="Modelo.Usuario"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            //Redirección a página de registro
            if(request.getParameter("registrar")!=null) {
                response.sendRedirect("vistas/registro.jsp");
            }
            
            //Redirección al index
            if(request.getParameter("back")!=null) {
                response.sendRedirect("index.jsp");
            }
            
            //Registro
            if(request.getParameter("registOk")!=null) {
                                               
                boolean dwc = false;

                boolean dws = false;

                boolean di = false;

                if(request.getParameter("dwc")!=null) {
                    dwc = true;
                }
                if(request.getParameter("dws")!=null) {
                    dws = true;
                }
                if(request.getParameter("di")!=null) {
                    di = true;
                }                                       
                                                      
                
                ConexionEstatica.nueva();

                //con.Insertar_Dato("Usuarios",request.getParameter("name"),request.getParameter("lastName"),request.getParameter("password"),request.getParameter("gender"),request.getParameter("fecha"),dwc,dws,di,request.getParameter("curso"));
                
                ConexionEstatica.Insertar_Dato("Usuarios",request.getParameter("name"),request.getParameter("lastName"),request.getParameter("password"),request.getParameter("gender"),request.getParameter("fecha"),dwc,dws,di,request.getParameter("curso"));
                
                ConexionEstatica.cerrarBD();
                
                response.sendRedirect("index.jsp");
                                
            }
            
            if(request.getParameter("idexSubmit")!=null) {
                
                String nom = request.getParameter("name");
                ConexionEstatica.nueva();
                Usuario user = ConexionEstatica.existeUsuario(nom);
                
                if(user==null) {
                    response.sendRedirect("vistas/error.jsp");
                } else {

                    LinkedList<Usuario> usuarios = ConexionEstatica.obtenerUsuarios();
                    
                    session.setAttribute("usuarios", usuarios);
                    
                    ConexionEstatica.cerrarBD();
                    
                    response.sendRedirect("vistas/valido.jsp");

                    /*boolean encontrado = false;

                    String nombre = request.getParameter("name");
                    String password = request.getParameter("password");            

                    int i = 0;

                    while( i < usuarios.size() && !encontrado ) {
                        Usuario aux = usuarios.get(i);
                        if (aux.getNombre().equals(nombre) && aux.getPassword().equals(password)) {
                            encontrado = true;
                        }
                        i++;
                    }

                    if(encontrado) {
                        response.sendRedirect("vistas/valido.jsp");
                    } else {
                        response.sendRedirect("vistas/error.jsp");
                    }*/            
                }
                
            }
        %>
    </body>
</html>
