<?php

/**
 * Sistema de Acceso Unificado -> SAU_API
 *
 * @author Adan Nahir Abad Mora 
 * @author Soluciones Informáticas NubezarTech [http://www.nubezar.tech]
 *
 */
require __DIR__ . "/../Models/UserRight.php";
class UsersRightsController
{
    private $userRightModel;
    public function __construct()
    {
        $this->userRightModel = new UserRight();
    }

    public function getAllByUserId($user_id)
    {
        require_once "CPItemsController.php";
        $iter = 0;
        $user_right_sau = $this->userRightModel->getAccessAppRightsByUserId($user_id);
        $cpitemsController = new CPItemsController();


        while ($iter < count($user_right_sau)) {
            $service_data = $cpitemsController->getById($user_right_sau[$iter]["saus_cpitem"]);

            $user_rights_data[] = array(
                "saus_id" => $user_right_sau[$iter]["saus_id"],
                "saus_cpitem_id" => $user_right_sau[$iter]["saus_cpitem"],
                "saus_service_name" => $service_data['cpi_service_name'],
                "saus_status" => $user_right_sau[$iter]['saus_status'],
                "saus_rol_id" => $user_right_sau[$iter]['saus_rol_id'],
                "saus_rol_name" => $user_right_sau[$iter]['saus_rol_name']
            );
            $iter++;
        }

        return $user_rights_data;
    }
    public function addNewRightToUser($user_id, $cpitem_id)
    {

        if ($this->userRightModel->addNewRightToUser($user_id, $cpitem_id)) {
            return array(
                "resource" => "user_rights",
                "action" => "create",
                "result" => "ok"
            );
        }
        return array(
            "resource" => "user_rights",
            "action" => "create",
            "result" => "error"
        );
    }
    public function updateStatusById($user_right_id, $new_status)
    {
        if ($this->userRightModel->updateStatusById($user_right_id, $new_status)) {
            return array(
                "resource" => "user_rights",
                "action" => "update",
                "result" => "ok"
            );
        }
        return array(
            "resource" => "user_rights",
            "action" => "update",
            "result" => "error"
        );
    }
}
