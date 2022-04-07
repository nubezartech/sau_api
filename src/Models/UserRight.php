<?php
/**
* Sistema de Acceso Unificado -> SAU_API
*
* @author Adan Nahir Abad Mora [Soluciones Informáticas NubezarTech]
* @author http://www.nubezar.tech
*
*/
require "Model.php";
class UserRight extends Model {
    private $table = "sau_service";

    public function getAccessAppRightsByUserId($user_id){
        $sql = "SELECT * FROM $this->table ".
        "INNER JOIN comercial_park_items ON sau_service.saus_cpitem=comercial_park_items.cpi_id ".
        "INNER JOIN sau_roles ON sau_service.saus_rol=sau_roles.saur_id ".
        "WHERE saus_user='".$user_id."'";
        if ($result = $this->newsql($sql)) {
            while ($row = mysqli_fetch_array($result)) {

                $item_data[] = array("sau_service" => $row['cpi_service'],
                                     "saus_status" => $row['saus_status'],
                                     "saus_rol" => $row['saur_name']);
            }
            return $item_data;
        } else {
            return false;
        }
        $this->close();
    }
}