<?php
/**
* Sistema de Acceso Unificado -> SAU_API
*
* @author Adan Nahir Abad Mora [Soluciones Informáticas NubezarTech]
* @author http://www.nubezar.tech
*
*/
class Json {
    public static function view($json) {
        header('Content-Type: application/json');
        echo json_encode($json);
    }
}
