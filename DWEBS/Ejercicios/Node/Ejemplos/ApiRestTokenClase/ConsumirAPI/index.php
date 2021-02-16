<!DOCTYPE html>
<!-- 
Consumimos un servicio creado en Laravel. Para que funcione debemos entrar en la carpeta del proyecto de Laravel 'laravel-api' y
desde consola lanzar el comando: php artisan serve
Esto habilitará el servicio en el puerto 8000 en la ruta: http://localhost:8000/api/articles
Ver ejemplos de uso en esta página.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
 
        /*
         * PETICIONES CON LOGIN Y TOKEN DE ACCESO. SOLO PARA USO DE API REST.
         */
        //-------------------------------------------------------------------------------------------
        //Realizar un login y luego ya lo que sea: get, post, put, delete....
        
                
//        $data = [
//            'email' => 'faranzabe@gmail.com',
//            'password' => 1234
//        ];
//        $ch = curl_init("http://localhost:8090/api/auth/signin");
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
//        $response = curl_exec($ch);
//        var_dump($response);
//        curl_close($ch);
//        $respuesta = json_decode($response, true);
//        var_dump($respuesta['status']);
//        if ($respuesta['status'] != 200) {
//            echo $respuesta['message'];
//        } else {
//            echo 'Login realizado'.'<br>';
//            echo $respuesta['accessToken'];
//    
//            //Haciendo una petición GET: para obtener un artículo concreto.
//            $ch = curl_init("http://localhost:8090/api/test/user");
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
//            $header = array(
//                'Authorization: ' . $respuesta['accessToken']
//            );
//            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//            $result = curl_exec($ch);
//            curl_close($ch);
//            var_dump($result);
//            $respuesta = json_decode($result, true);
//            var_dump($respuesta);
//            if ($respuesta['status'] != 200) {
//                echo 'Algo ha salido mal: '.$respuesta['message'];
//            } else {
//                echo $respuesta['message'];
//            }
//        }
         
        
        
        
        //---------------- Realizar un registro a través de la API -------------------
        $data = [
            'username' => 'fernando',
            'email' => 'faranzabe@gmail.com',
            'password' => '1234'
        ];
        $ch = curl_init("http://localhost:8090/api/auth/signup");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($ch);
        var_dump($response);
        curl_close($ch);
        $respuesta = json_decode($response, true);
        if ($respuesta['status']!=201){
            echo 'Algo ha salido mal: '.$respuesta['message'];
        }
        else {
            echo $respuesta['message'];
        }
        ?>
    </body>
</html>
