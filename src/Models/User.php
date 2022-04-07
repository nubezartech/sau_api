<?php
/**
* Sistema de Acceso Unificado -> SAU_API
*
* @author Adan Nahir Abad Mora [Soluciones Informáticas NubezarTech]
* @author http://www.nubezar.tech
*
*/
require "Model.php";
class User extends Model {
    private $table = "users";

    public function getById($id) {
        $sql = "SELECT * FROM  $this->table WHERE user_id = '" . $id . "'";
        if ($result = $this->newsql($sql)) {
            $row = mysqli_fetch_array($result);
            return array("user_id" => $row['user_id'],
                        "user_username" => $row['user_username']);
        } else {
            return false;
        }
        $this->close();
    }
    public function getByUsername($username) {
        $sql = "SELECT * FROM  $this->table
                WHERE user_username = '" . $username . "'";
        if ($result = $this->newsql($sql)) {
            $row = mysqli_fetch_array($result);
            return array("user_id" => $row['user_id'],
                         "user_username" => $row['user_username']);
        } else {
            return false;
        }
        $this->close();
    }
    public function getAll() {
        $sql = "SELECT * FROM $this->table";
        if ($result = $this->newsql($sql)) {
            while ($row = mysqli_fetch_array($result)) {

                $item_data[] = array("user_id" => $row['user_id'],
                                     "user_username" => $row['user_username']);
            }
            return $item_data;
        } else {
            return false;
        }
        $this->close();
    }
    public function getAccessAppRightsByUserId($user_id){
        $sql = "SELECT * FROM sau_service ".
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