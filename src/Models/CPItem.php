<?php

/**
 * Sistema de Acceso Unificado -> SAU_API
 *
 * @author Adan Nahir Abad Mora 
 * @author Soluciones Informáticas NubezarTech [http://www.nubezar.tech]
 *
 */
require_once "Model.php";
class CPItem extends Model
{
    private $table = "comercial_park_items";

    public function getById($cpi_id)
    {
        $sql = "SELECT * FROM  $this->table " .
            "INNER JOIN services ON $this->table.cpi_service=services.service_id " .
            "WHERE cpi_id = '" . $cpi_id . "'";
        if ($result = $this->newsql($sql)) {
            $row = mysqli_fetch_array($result);
            return $item_data[] = array(
                "cpi_id" => $row['cpi_id'],
                "cpi_service_id" => $row['cpi_service'],
                "cpi_service_name" => $row['service_name'],
                "cpi_client_id" => $row['cpi_client'],
                "cpi_status" => $row['cpi_status'],
                "cpi_creation_date" => $row['cpi_created_date']
            );
        } else {
            return false;
        }
        $this->close();
    }
    public function getAllByClientId($client_id)
    {
        $sql = "SELECT * FROM  $this->table " .
            "INNER JOIN services ON $this->table.cpi_service=services.service_id " .
            "WHERE cpi_client = '" . $client_id . "'";
        if ($result = $this->newsql($sql)) {
            $row = mysqli_fetch_array($result);
            return $item_data[] = array(
                "cpi_id" => $row['cpi_id'],
                "cpi_service_id" => $row['cpi_service'],
                "cpi_service_name" => $row['service_name'],
                "cpi_client_id" => $row['cpi_client'],
                "cpi_status" => $row['cpi_status'],
                "cpi_creation_date" => $row['cpi_created_date']
            );
        } else {
            return false;
        }
        $this->close();
    }
    public function getActivesByClintId($client_id)
    {
        $sql = "SELECT * FROM  $this->table " .
            "INNER JOIN services ON $this->table.cpi_service=services.service_id " .
            "WHERE cpi_client = '" . $client_id . "' AND cpi_status";
        if ($result = $this->newsql($sql)) {
            $row = mysqli_fetch_array($result);
            return $item_data[] = array(
                "cpi_id" => $row['cpi_id'],
                "cpi_service_id" => $row['cpi_service'],
                "cpi_service_name" => $row['service_name'],
                "cpi_client_id" => $row['cpi_client'],
                "cpi_status" => $row['cpi_status'],
                "cpi_creation_date" => $row['cpi_created_date']
            );
        } else {
            return false;
        }
        $this->close();
    }
}
