<?php

/**
 * Sistema de Acceso Unificado -> SAU_API
 *
 * @author Adan Nahir Abad Mora [Soluciones Informáticas NubezarTech]
 * @author http://www.nubezar.tech
 *
 */
require_once __DIR__ . "/../Models/Clients.php";
class ClientsController
{
    private $clientModel;
    public function __construct()
    {
        $this->clientModel = new Client();
    }
    public function getAll()
    {
        return $this->clientModel->getAll();
    }
    public function getById($client_id)
    {
        return $this->clientModel->getById($client_id);
    }
    public function updateOneById($client_id, $property, $value)
    {
        switch ($property) {
            case "name":
                $contr = $this->clientModel->updateNameById($client_id, $value);
                break;
            case "surname":
                $contr = $this->clientModel->updateSurnameById($client_id, $value);
                break;
            case "phone":
                $contr = $this->clientModel->updatePhoneById($client_id, $value);
                break;
            case "email":
                $contr = $this->clientModel->updateEmailById($client_id, $value);
                break;
            default:
                $contr = false;
                break;
            
        }
        if ($contr) {
            return array(
                "resource" => "clients",
                "action" => "update",
                "result" => "ok"
            );
        }
        return array(
            "resource" => "clients",
            "action" => "update",
            "result" => "error"
        );
    }
}
