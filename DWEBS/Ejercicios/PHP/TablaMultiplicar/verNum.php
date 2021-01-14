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
    <body style="text-align: center">
        <h1>Haz la tabla de multiplicar</h1>
        <form name="form1" action="verNum.php">
        <?php
        session_start();
          
        if(isset($_REQUEST['aceptar'])) {
        //Entra si es la primera vez
        $_SESSION['acierta'] = false;
        $n = $_REQUEST['num1']; 
        $_SESSION['intentos'] = 5;
        
        $_SESSION['num1'] = $n;
            for($i=0; $i<10; $i++) {       
            ?>
            <p><?=($i+1)?> 
            x
            <?=$n?>
            =
            <input type="number" name="respuesta[]" value="">
            </p>
        <?php
        //header('Location: exito.php');
            }
        } else {
            
            $_SESSION['acierta'] = true;         

            $n = $_SESSION['num1'];

            $resultado = []; 

            for($i=0; $i<10; $i++) {
                $resultado[$i] = $n*($i+1);
            }

            $respuesta = $_REQUEST['respuesta'];



            for($i=0; $i<10; $i++) {
                ?>
                <p>
                <?=($i+1)?> 
                x
                <?=$n?>
                =
                <?php
                    if($respuesta[$i]==$resultado[$i]) {
                ?>
                <input type="number" name="respuesta[]" value="<?=$respuesta[$i]?>" style="background-color: green">

                </p>                
                <?php
                } else {
                   $_SESSION['acierta'] = false;                   
                ?>

                <input type="number" name="respuesta[]" value="<?=$respuesta[$i]?>" style="background-color: red">
                </p>                
                <?php
                }
            }
            
            if($_SESSION['intentos']==1) {
                header('Location: derrota.php');
            }
            
            if($_SESSION['acierta']) {
                header('Location: victoria.php');
            } else {
                $_SESSION['intentos']--; 
            }                                   

        }
        ?>
            <input type="submit" value="Prueba">
        </form>
        <p>Te quedan <?=$_SESSION['intentos']?> intentos</p>
    </body>
</html>
