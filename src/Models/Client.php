<?php

/**
 * Sistema de Acceso Unificado -> SAU_API
 *
 * @author Adan Nahir Abad Mora 
 * @author Soluciones Informáticas NubezarTech [http://www.nubezar.tech]
 *
 */
require_once "Model.php";
class Client extends Model
{
    private $table = "clients";

    public function getById($id)
    {
        $sql = "SELECT * FROM  $this->table " .
            "INNER JOIN client_doc_type ON $this->table.client_doc_type=client_doc_type.us_id " .
            "WHERE user_id = '" . $id . "'";
        if ($result = $this->newsql($sql)) {
            $row = mysqli_fetch_array($result);
            return $item_data[] = array();
        } else {
            return false;
        }
        $this->close();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM  $this->table " .
            "INNER JOIN client_doc_type ON $this->table.user_status=user_statuses.us_id ";
        if ($result = $this->newsql($sql)) {
            while ($row = mysqli_fetch_array($result)) {
                $item_data[] = array();
            }
            return $item_data;
        } else {
            return false;
        }
        $this->close();
    }
/*
    public function updateDocTypeById($client_id, $client_doc_type_id)
    {
        $sql = "UPDATE $this->table SET client_doc_type='.$client_doc_type_id.' WHERE client_id=" . $client_id;
        if ($this->newsql($sql)) {
            return true;
        } else {
            return false;
        }
        $this->close();
    }
*/
    public function updateNameById($client_id, $client_name)
    {
        $sql = "UPDATE $this->table SET client_name='.$client_name.' WHERE client_id=" . $client_id;
        if ($this->newsql($sql)) {
            return true;
        } else {
            return false;
        }
        $this->close();
    }
    public function updateSurNameById($client_id, $client_surname)
    {
        $sql = "UPDATE $this->table SET client_surname='.$client_surname.' WHERE client_id=" . $client_id;
        if ($this->newsql($sql)) {
            return true;
        } else {
            return false;
        }
        $this->close();
    }
    public function updatePhoneById($client_id, $client_phone)
    {
        $sql = "UPDATE $this->table SET client_phone='.$client_phone.' WHERE client_id=" . $client_id;
        if ($this->newsql($sql)) {
            return true;
        } else {
            return false;
        }
        $this->close();
    }
    public function updateEmailById($client_id, $client_email)
    {
        $sql = "UPDATE $this->table SET client_phone='.$client_email.' WHERE client_id=" . $client_id;
        if ($this->newsql($sql)) {
            return true;
        } else {
            return false;
        }
        $this->close();
    }
    
}
