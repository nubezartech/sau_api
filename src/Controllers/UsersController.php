<?php
/**
* Sistema de Acceso Unificado -> SAU_API
*
* @author Adan Nahir Abad Mora [Soluciones Informáticas NubezarTech]
* @author http://www.nubezar.tech
*
*/
require_once __DIR__."/../Models/User.php";
class UsersController{
    private $userModel;
    public function __construct()
    {
        $this->userModel=new User();
    }
    public function getAll(){
        return $this->userModel->getAll();
    }
    public function getByUserId($user_id){
        return $this->userModel->getById($user_id);
    }
    public function getAllByClientId($client_id){
        return $this->userModel->getAllByClientId($client_id);
    }
    public function getActivesByClientId($client_id){
        return $this->userModel->getActivesByClientId($client_id);
    }
    public function getAllClients(){
        return $this->userModel->getAllByTypeId("11");
    }
    public function getAllSystem(){
        return $this->userModel->getAllByTypeId("99");
    }
}