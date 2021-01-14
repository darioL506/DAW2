<%-- 
    Document   : index
    Created on : 30-sep-2020, 10:40:46
    Author     : dario
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        
        <%            
            //Genero número aleatorio si es la primera vez
            if ( session.getAttribute("numAl") == null) {
                double aux = 1 + Math.random()*100;
                int random = (int)aux;   
                session.setAttribute("numAl" ,random);
                session.setAttribute("intentos", 5);
            }                    
            
            out.println(session.getAttribute("numAl"));
            
            //Compruebo si la caja esta vacía
            if(request.getParameter("caja") != null) {
                int valor = Integer.parseInt(request.getParameter("caja")); 
                int aux = Integer.parseInt(session.getAttribute("intentos").toString());
                
                //Se acaba si el contador es igual 1
                if(aux == 1) {
                    response.sendRedirect("derrota.jsp");
                }
                
                //Se muestra un mensaje si el numero es menor que el correcto
                if(valor < Integer.parseInt(session.getAttribute("numAl").toString())) {                    
                    aux--;
                    session.setAttribute("intentos", aux);
                    out.println("El número es mayor que "+ valor);
                    %><br><%
                    out.println("Quedan "+ aux + " intentos");
                    %>
                    <form name="form1" action="index.jsp">                                    
                        <input type="submit" name="submi" value="Volver a intentar">
                    </form>
                    <form name="form1" action="derrota.jsp">                                    
                        <input type="submit" name="submi" value="Rendirse">
                    </form>
                    <%
                }
                
                //Se muestra un mensaje si el numero es mayor que el correcto
                if(valor > Integer.parseInt(session.getAttribute("numAl").toString())) {                    
                    aux--;
                    session.setAttribute("intentos", aux);
                    out.println("El número es menor que "+ valor);
                    %><br><%
                    out.println("Quedan "+ aux + " intentos");
                    %>
                    <form name="form1" action="index.jsp">                                    
                        <input type="submit" name="submi" value="Volver a intentar">
                    </form>
                    <form name="form1" action="derrota.jsp">                                    
                        <input type="submit" name="submi" value="Rendirse">
                    </form>
                    <%
                }
                
                //Se redirecciona a la pagina victoria si se acierta
                if(valor == Integer.parseInt(session.getAttribute("numAl").toString())){
                    session.removeAttribute("numAl");
                    response.sendRedirect("victoria.jsp");
                }
            }
            else {
                
                
        %>
        <form name="form1" action="index.jsp">
            <input type="text" name="caja" value="">
            
            <input type="submit" name="submi" value="Probar">
        </form>
        <% } %>
    </body>
</html>
