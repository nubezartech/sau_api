<?php
/**
* Sistema de Acceso Unificado -> SAU_API
*
* @author Adan Nahir Abad Mora [Soluciones Informáticas NubezarTech]
* @author http://www.nubezar.tech
*
*/
require __DIR__."/../Models/CPItem.php";
class CPItemsController{
    private $userModel;
    public function __construct()
    {
        $this->cpitemModel=new CPItem();
    }
    public function getById($cpi_id){
        return $this->cpitemModel->getById($cpi_id);
    }
    public function getAllByClientId($client_id){
        return $this->cpitemModel->getAllByClientId($client_id);
    }
    public function getActivesByClientId($client_id){
        return $this->cpitemModel->getActivesByClientId($client_id);
    }

}