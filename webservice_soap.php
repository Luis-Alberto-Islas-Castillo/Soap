<?php

    require_once "lib/nusoap.php";

    function muestraplanetas() {

        $planetas = "Mercurio,Venus,Tierra,Marte";

        return $planetas;
    }

    function muestraimagen($categoria) {

        if($categoria == 'espacio'){

            $imagen = 'imagen.png';
    }else{

            $imagen = 'imagen1.jpg';
        }
            $resultado = '<img src="img/'.$imagen.'" >';

            return $resultado;
    }

    if ( !isset( $HTTP_RAW_POST_DATA ) ){

        $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
    }

    $server = new soap_server();

    $server->configureWSDL("Info Blog", "urn:infoBlog");


    $server->register("muestraplanetas",
    array(),
    array('return' => 'xsd:string'),
    'urn:infoBlog',
    'urn:infoBlog#muestraplanetas',
    'rpc',
    'encoded',
    'Muestra el contenido para el blog');

    $server->register("muestraimagen",
    array('categoria' => 'xsd:string'),
    array('return' => 'xsd:string'),
    'urn:infoBlog',
    'urn:infoBlog#muestraimagen',
    'rpc',
    'encoded',
    'Muestra la imagen variable');

    $server->service($HTTP_RAW_POST_DATA);
?>