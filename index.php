<?php

    require_once "lib/nusoap.php";

    $cliente = new nusoap_client("http://localhost/soap/webservice_soap.php?wsdl&debug=0" ,'wsdl');

    $planetas = $cliente->call("muestraplanetas");
    $imagen = $cliente->call("muestraimagen" , array("categoria" => "espacio"));

    echo "<h2>planetas</h2>";
    echo "<p>". $planetas ."</p>";
    echo $imagen;  


?>