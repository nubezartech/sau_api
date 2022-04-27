<?php

/**
 * Sistema de Acceso Unificado -> SAU_API
 *
 * @author Adan Nahir Abad Mora 
 * @author Soluciones Informáticas NubezarTech [http://www.nubezar.tech]
 *
 */
require_once "Model.php";
class Service extends Model
{
    private $table = "service";

    public function getById($id)
    {
        $sql = "SELECT * FROM  $this->table " .
            "INNER JOIN user_statuses ON $this->table.user_status=user_statuses.us_id " .
            "WHERE user_id = '" . $id . "'";
        if ($result = $this->newsql($sql)) {
            $row = mysqli_fetch_array($result);
            return $item_data[] = array(
                "user_id" => $row['user_id'],
                "user_username" => $row['user_username'],
                "user_type_id" => $row['user_type'],
                "user_status_id" => $row['user_status'],
                "user_status_name" => $row['us_name'],
                "user_client" => $row['user_parent'],
                "user_phone" => $row['user_phone'],
                "user_email" => $row['user_email'],
                "user_creation_date" => $row['user_creation_date']
            );
        } else {
            return false;
        }
        $this->close();
    }
}
