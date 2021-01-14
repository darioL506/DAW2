<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php            
        session_start();
            //Genero número aleatorio si es la primera vez
            if ( empty($_SESSION['numAl'])) {
                $random= 1 + rand(1,100);
                 
                $_SESSION['numAl'] = $random;
                $_SESSION['intentos']=5;
            }                    
            
            echo $_SESSION['numAl'].'<br>';
            
            //Compruebo si la caja esta vacía
            if(!empty($_REQUEST['caja'])) {
                $valor = $_REQUEST['caja']; 
                $aux = $_SESSION['intentos'];
                
                //Se acaba si el contador es igual 1
                if($aux == 1) {                    
                    header('Location: derrota.php');
                }
                
                //Se muestra un mensaje si el numero es menor que el correcto
                if($valor < $_SESSION['numAl']) {                    
                    $aux--;
                    $_SESSION['intentos'] = $aux;
                    echo "El número es mayor que ".$valor;
                    ?><br><?php
                    echo "Quedan ".$aux." intentos";
                    ?>
                    <form name="form1" action="index.php">                                    
                        <input type="submit" name="submi" value="Volver a intentar">
                    </form>
                    <form name="form1" action="derrota.php">                                    
                        <input type="submit" name="submi" value="Rendirse">
                    </form>
                    <?php
                }
                
                //Se muestra un mensaje si el numero es mayor que el correcto
                if($valor > $_SESSION['numAl']) {                    
                    $aux--;
                    $_SESSION['intentos'] = $aux;
                    echo "El número es menor que ".$valor;
                    ?><br><?php
                    echo "Quedan ".$aux." intentos";
                    ?>
                    <form name="form1" action="index.php">                                    
                        <input type="submit" name="submi" value="Volver a intentar">
                    </form>
                    <form name="form1" action="derrota.php">                                    
                        <input type="submit" name="submi" value="Rendirse">
                    </form>
                    <?php
                }
                
                //Se redirecciona a la pagina victoria si se acierta
                if($valor == $_SESSION['numAl']){
                    unset($_SESSION['numAl']);                 
                    header('Location: victoria.php');
                }
            }
            else {
                
                
        ?>
        <form name="form1" action="index.php">
            <input type="text" name="caja" value="">
            
            <input type="submit" name="submi" value="Probar">
        </form>
        <?php } ?>
    </body>
</html>
