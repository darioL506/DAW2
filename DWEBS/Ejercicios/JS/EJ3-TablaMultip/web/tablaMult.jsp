<%-- 
    Document   : tablaMult
    Created on : 02-oct-2020, 11:13:36
    Author     : dario
--%>

<%@page import="java.util.Enumeration"%>
<%@page import="java.util.List"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    
        <h1>Tabla de multiplicar</h1>
        
        <form name="form1" action="tablaMult.jsp">
        <%
            //Compruebo si es la primera vez que se entra
            if(session.getAttribute("num")==null){

                //Si es la primera vez qu entra
                int n = Integer.parseInt(request.getParameter("num"));

                //Para la sesion actual, estblezco la variable que se guarda
                session.setAttribute("num", n);

                //Construyo el formulario por primera vez
                for(int i=0; i<10; i++) {       
                    %>
                    <input type="text" readonly="readonly" value="<%=(i+1)%>">
                    *
                    <input type="text" readonly="readonly" value="<%=n%>">
                    =
                    <input type="text" name="respuesta" value="">

                    <br>
                    <%
                }                   
            } else {

                int n = (int) session.getAttribute("num");

                int resultado[] = new int[10]; 

                for(int i=0; i<10; i++) {
                    resultado [i] = n*(i+1);
                }

                String[] respuesta = request.getParameterValues("respuesta");



                for(int i=0; i<10; i++) {
                    %>
                    <input type="text" readonly="readonly" value="<%=(i+1)%>">
                    *
                    <input type="text" readonly="readonly" value="<%=n%>">
                    =
                    <%
                        if(Integer.parseInt(respuesta[i])==resultado[i]) {
                    %>
                    <input type="text" name="respuesta" value="<%=respuesta[i]%>" style="background-color: green">

                    <br>
                    <%
                        } else {
                    %>

                    <input type="text" name="respuesta" value="<%=respuesta[i]%>" style="background-color: red">
                    <br>
                    <%
                    }

                }
            }

            %>

            <input type="submit" value="Prueba">
        </form>
        
</html>
