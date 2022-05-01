<?php

/**
 * Sistema de Acceso Unificado -> SAU_API
 *
 * @author Adan Nahir Abad Mora 
 * @author Soluciones Informáticas NubezarTech [http://www.nubezar.tech]
 *
 */
require_once "Controllers/UsersController.php";
require_once "Controllers/UsersRightsController.php";
require_once "Controllers/CPItemsController.php";
require_once "Controllers/ClientsController.php";
require_once "Views/Json.php";

class MainRequestController
{
    private $usersController;
    private $usersRightsController;
    private $cpitemsRightsController;
    private $clientsController;
    private $error;
    public function __construct()
    {
        $this->usersController = new UsersController();
        $this->usersRightsController = new UsersRightsController();
        $this->cpitemsRightsController = new CPItemsController();
        $this->clientsController=new ClientsController();


        if (isset($_GET["resource"]) & !empty($_GET["resource"])) {
            $this->resource = $_GET["resource"];
        } else {
            $this->error = array("Error", "Resource is not defined or it's not valid.");
            Json::view($this->error);
            die();
        }
        if (isset($_GET["action"]) & !empty($_GET["action"])) {
            $this->action = $_GET["action"];
        } else {
            $this->error = array("Error", " Action is not defined or it's not valid.");
            Json::view($this->error);
            die();
        }
    }

    public function doResource()
    {
        if ($_GET["resource"] == "users") {
            $to_print = $this->usersFunctions($_GET["action"]);
        } elseif ($_GET["resource"] == "usersRights") {
            $to_print = $this->usersRightsFunctions($_GET["action"]);
        } elseif ($_GET["resource"] == "cpItems") {
            $to_print = $this->cpitemsFunctions($_GET["action"]);
        } elseif ($_GET["resource"] == "clients") {
            $to_print = $this->clientsFunctions($_GET["action"]);
        } else {
            $to_print = array("Error" => "Resource not valid.");
        }
        Json::view($to_print);
    }
    private function usersFunctions($action)
    {
        if ($this->action == "getAll") {
            return $this->usersController->getAll();
        } else if ($this->action == "getById") {
            return $this->usersController->getByUserId($_GET["user_id"]);
        } else if ($this->action == "getAllByClientId") {
            return $this->usersController->getAllByClientId($_GET["client_id"]);
        } else if ($this->action == "getActivesByClientId") {
            return $this->usersController->getActivesByClientId($_GET["client_id"]);
        } else {
            return array("Error" => "Action not valid.");
        }
    }
    private function usersRightsFunctions($action)
    {
        if ($this->action == "getAllByUserId") {
            return $this->usersRightsController->getAllByUserId($_GET["user_id"]);
        } elseif ($this->action == "addToUser") {
            return $this->usersRightsController->addNewRightToUser($_GET["user_id"], $_GET["cpitem_id"]);
        } else {
            return array("Error" => "Action not valid.");
        }
    }
    private function cpitemsFunctions($action)
    {
        if ($this->action == "getById") {
            return $this->cpitemsRightsController->GetById($_GET["cpi_id"]);
        } elseif ($this->action == "getAllByClientId") {
            return $this->cpitemsRightsController->getAllByClientId($_GET["client_id"]);
        } elseif ($this->action == "getActivesByClientId") {
            return $this->cpitemsRightsController->getActivesByClientId($_GET["client_id"]);
        } else {
            return array("Error" => "Action not valid.");
        }
    }

    private function clientsFunctions($action)
    {
        if ($this->action == "getById") {
            return $this->clientsController->GetById($_GET["client_id"]);
        } else if ($this->action == "getAll") {
            return $this->clientsController->getAll();
        } else if ($this->action == "update") {
            //return $this->clientsController->getAll();




        } else {
            return array("Error" => "Action not valid.");
        }
    }
}
