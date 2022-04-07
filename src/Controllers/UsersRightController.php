<?php
/**
* Sistema de Acceso Unificado -> SAU_API
*
* @author Adan Nahir Abad Mora [Soluciones Informáticas NubezarTech]
* @author http://www.nubezar.tech
*
*/
require __DIR__."/../Models/UserRight.php";
class UsersRightsController{
    private $userRightModel;
    public function __construct()
    {
        $this->userRightModel=new UserRight();
    }

    public function getAllByUserId($user_id){
        $user_right_sau=$this->userRightModel->getAccessAppRightsByUserId($user_id);
        $rights_data=array();
        //return $rights_data;
        return $user_right_sau;
    }
}