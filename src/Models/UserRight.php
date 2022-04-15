<?php

/**
 * Sistema de Acceso Unificado -> SAU_API
 *
 * @author Adan Nahir Abad Mora [Soluciones Informáticas NubezarTech]
 * @author http://www.nubezar.tech
 *
 */
require_once "Model.php";
class UserRight extends Model
{
    private $table = "sau_services";

    public function getAccessAppRightsByUserId($user_id)
    {
        $sql = "SELECT * FROM $this->table " .
            "INNER JOIN comercial_park_items ON $this->table.saus_cpitem=comercial_park_items.cpi_id " .
            "INNER JOIN sau_roles ON $this->table.saus_rol=sau_roles.saur_id " .
            "WHERE saus_user='" . $user_id . "'";
        if ($result = $this->newsql($sql)) {
            while ($row = mysqli_fetch_array($result)) {
                $item_data[] = array(
                    "saus_id" => $row['saus_id'],
                    "saus_cpitem" => $row['saus_cpitem'],
                    "saus_status" => $row['saus_status'],
                    "saus_rol_id" => $row['saus_rol'],
                    "saus_rol_name" => $row['saur_name']
                );
            }
            return $item_data;
        } else {
            return false;
        }
        $this->close();
    }

    public function addNewRightToUser($user_id, $cpitem_id)
    {
        $sql = "INSERT INTO $this->table (saus_user, saus_cpitem) VALUES ('" . $user_id . "','" . $cpitem_id . "')";
        if ($this->newsql($sql)) {

            return $this->last_id();
        } else {
            return false;
        }
        $this->close();
    }
}
