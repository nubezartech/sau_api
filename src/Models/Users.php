<?php
/**
* Sistema de Acceso Unificado -> SAU_API
*
* @author Adan Nahir Abad Mora [Soluciones Informáticas NubezarTech]
* @author http://www.nubezar.tech
*
*/
require "Model.php";
class Users extends Model {
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

}