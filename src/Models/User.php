<?php
/**
* Sistema de Acceso Unificado -> SAU_API
*
* @author Adan Nahir Abad Mora [Soluciones Informáticas NubezarTech]
* @author http://www.nubezar.tech
*
*/
require_once "Model.php";
class User extends Model {
    private $table = "users";

    public function getById($id) {
        $sql = "SELECT * FROM  $this->table ".
        "INNER JOIN user_statuses ON $this->table.user_status=user_statuses.us_id ".
        "WHERE user_id = '" . $id . "'";
        if ($result = $this->newsql($sql)) {
            $row = mysqli_fetch_array($result);
            return array("user_id" => $row['user_id'],
                         "user_username" => $row['user_username'],
                         "user_type_id" => $row['user_type'],
                         "user_type_name" => $row['us_name'],
                         "user_parent" => $row['user_parent'],
                         "user_phone" => $row['user_phone'],
                         "user_email" => $row['user_email'],
                         "user_creation_date" => $row['user_creation_date']);
        } else {
            return false;
        }
        $this->close();
    }
    public function getByUsername($username) {
        $sql = "SELECT * FROM  $this->table ".
        "INNER JOIN user_statuses ON $this->table.user_status=user_statuses.us_id ".
                "WHERE user_username = '" . $username . "'";
        if ($result = $this->newsql($sql)) {
            $row = mysqli_fetch_array($result);
            return array("user_id" => $row['user_id'],
                         "user_username" => $row['user_username'],
                         "user_type_id" => $row['user_type'],
                         "user_type_name" => $row['us_name'],
                         "user_parent" => $row['user_parent'],
                         "user_phone" => $row['user_phone'],
                         "user_email" => $row['user_email'],
                         "user_creation_date" => $row['user_creation_date']);
        } else {
            return false;
        }
        $this->close();
    }
    public function getAll() {
        $sql = "SELECT * FROM  $this->table ".
        "INNER JOIN user_statuses ON $this->table.user_status=user_statuses.us_id ";
        if ($result = $this->newsql($sql)) {
            while ($row = mysqli_fetch_array($result)) {

                $item_data[] = array("user_id" => $row['user_id'],
                "user_username" => $row['user_username'],
                "user_type_id" => $row['user_type'],
                "user_type_name" => $row['us_name'],
                "user_parent" => $row['user_parent'],
                "user_phone" => $row['user_phone'],
                "user_email" => $row['user_email'],
                "user_creation_date" => $row['user_creation_date']);
            }
            return $item_data;
        } else {
            return false;
        }
        $this->close();
    }
    public function getAllPublic() {
        $sql = "SELECT * FROM  $this->table ".
        "INNER JOIN user_statuses ON $this->table.user_status=user_statuses.us_id ".
        "WHERE user_type<>99";
        if ($result = $this->newsql($sql)) {
            while ($row = mysqli_fetch_array($result)) {

                $item_data[] = array("user_id" => $row['user_id'],
                "user_username" => $row['user_username'],
                "user_type_id" => $row['user_type'],
                "user_type_name" => $row['us_name'],
                "user_parent" => $row['user_parent'],
                "user_phone" => $row['user_phone'],
                "user_email" => $row['user_email'],
                "user_creation_date" => $row['user_creation_date']);
            }
            return $item_data;
        } else {
            return false;
        }
        $this->close();
    }
    public function getAllByClientId($client_id) {
        $sql = "SELECT * FROM  $this->table ".
        "INNER JOIN user_statuses ON $this->table.user_status=user_statuses.us_id ".
        " WHERE user_type=11 AND user_parent=".$client_id;
        if ($result = $this->newsql($sql)) {
            while ($row = mysqli_fetch_array($result)) {

                $item_data[] = array("user_id" => $row['user_id'],
                "user_username" => $row['user_username'],
                "user_type_id" => $row['user_type'],
                "user_type_name" => $row['us_name'],
                "user_client" => $row['user_parent'],
                "user_phone" => $row['user_phone'],
                "user_email" => $row['user_email'],
                "user_creation_date" => $row['user_creation_date']);
            }
            return $item_data;
        } else {
            return false;
        }
        $this->close();
    }
}