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
        require_once "CPItemsController.php";
        $user_right_sau=$this->userRightModel->getAccessAppRightsByUserId($user_id);
        $cpitemsController=new CPItemsController();

        $service_data=$cpitemsController->getById($user_right_sau["saus_service"]);
        $rights_data=array("saus_id" => $user_right_sau["saus_id"],
                            "saus_service_id" => $user_right_sau['saus_service_id'],
                            "saus_service_name" => $service_data['cpi_service_name'],
                            "saus_status" => $user_right_sau['saus_service_id'],
                            "saus_rol" => $user_right_sau['saus_service_id']);
        //return $rights_data;
        return $user_right_sau;
    }
    public function addNewRightToUser($user_id, $cpitem_id){
        
    }
}