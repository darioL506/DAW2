<%-- 
    Document   : controlador
    Created on : 07-oct-2020, 13:13:25
    Author     : dario
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.util.LinkedList" %>
<%@page import="Datos.Usuario"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            if(request.getParameter("registrar")!=null) {
                response.sendRedirect("vistas/registro.jsp");
            }
            
            if(request.getParameter("back")!=null) {
                response.sendRedirect("index.jsp");
            }
            
            //Registro
            if(request.getParameter("registOk")!=null) {
                
                if(session.getAttribute("usuarios")==null) {
                
                    LinkedList<String> asignatura = new LinkedList<>();

                    if(request.getParameter("dwc")==null) {
                        asignatura.addLast("0");
                    } else {
                        asignatura.addLast(request.getParameter("dwc"));
                    }
                    if(request.getParameter("dws")==null) {
                        asignatura.addLast("0");
                    } else {
                        asignatura.addLast(request.getParameter("dws"));
                    }
                    if(request.getParameter("di")==null) {
                        asignatura.addLast("0");
                    } else {
                        asignatura.addLast(request.getParameter("di"));
                    }                    

                    //Usuario newUser = new Usuario(request.getParameter("name"),request.getParameter("lastName"),request.getParameter("password"),Integer.parseInt(request.getParameter("edad")),request.getParameter("gender"),request.getParameter("fecha"),asignatura,request.getParameter("curso"));
                    
                    Usuario newUser = new Usuario(request.getParameter("name"),request.getParameter("lastName"),request.getParameter("password"),request.getParameter("gender"),request.getParameter("fecha"),asignatura,request.getParameter("curso"));

                    LinkedList<Usuario> usuarios = new LinkedList<>();

                    usuarios.addLast(newUser);

                    session.setAttribute("usuarios", usuarios);                                

                    response.sendRedirect("index.jsp");

                }
                else {

                    LinkedList<String> asignatura = new LinkedList<>();

                    if(request.getParameter("dwc")==null) {
                        asignatura.addLast("0");
                    } else {
                        asignatura.addLast(request.getParameter("dwc"));
                    }
                    if(request.getParameter("dws")==null) {
                        asignatura.addLast("0");
                    } else {
                        asignatura.addLast(request.getParameter("dws"));
                    }
                    if(request.getParameter("di")==null) {
                        asignatura.addLast("0");
                    } else {
                        asignatura.addLast(request.getParameter("di"));
                    }                                

                    Usuario newUser = new Usuario(request.getParameter("name"),request.getParameter("lastName"),request.getParameter("password"),Integer.parseInt(request.getParameter("edad")),request.getParameter("gender"),request.getParameter("fecha"),asignatura,request.getParameter("curso"));                                               

                    LinkedList<Usuario> usuarios = (LinkedList<Usuario>)session.getAttribute("usuarios");

                    usuarios.addLast(newUser);

                    session.setAttribute("usuarios", usuarios);               

                    response.sendRedirect("index.jsp");
                }                
            }
            
            if(request.getParameter("inicio")!=null) {
                
                if(session.getAttribute("usuarios")==null) {
                    response.sendRedirect("vistas/error.jsp");
                } else {

                    LinkedList<Usuario> usuarios = (LinkedList<Usuario>)session.getAttribute("usuarios");

                    boolean encontrado = false;

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
                    }            
                }
                
            }
        %>
    </body>
</html>
