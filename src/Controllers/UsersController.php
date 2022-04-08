<?php
/**
* Sistema de Acceso Unificado -> SAU_API
*
* @author Adan Nahir Abad Mora [Soluciones Informáticas NubezarTech]
* @author http://www.nubezar.tech
*
*/
require __DIR__."/../Models/User.php";
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
    public function getAccessAppRightsByUserId($user_id){
        $this->userModel->getAccessAppRightsByUserId($user_id);
        $rights_data=array();
        return $rights_data;
    }
}