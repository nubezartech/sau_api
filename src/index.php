<?php
/**
* Sistema de Acceso Unificado -> SAU_API
*
* @author Adan Nahir Abad Mora [Soluciones Informáticas NubezarTech]
* @author http://www.nubezar.tech
*
*/
require('vendor/autoload.php');
require('Controllers/MainRequestController.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$enviroment=$_ENV["APP_ENV"];

$mainRequestController=new MainRequestController();
$mainRequestController->doResource();


