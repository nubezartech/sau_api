<?php
require_once "Controllers/UsersController.php";
require_once "Views/Json.php";

class MainRequestController{
    private $usersController;
    public function __construct()
    {
        $this->usersController = new UsersController();


        if (isset($_GET["resource"]) & !empty($_GET["resource"])) {
            $this->resource = $_GET["resource"];
        } else {
            $this->error = array("Error","Resource is not defined or is not valid.");
            Json::view($this->error);
            die();
        }
        if (isset($_GET["action"]) & !empty($_GET["action"])) {
            $this->action = $_GET["action"];
        } else {
            $this->error = array("Error"," Action is not defined or is not valid.");
            Json::view($this->error);
            die();
        }
    }

    public function doResource()
    {
        if ($_GET["resource"] == "users") {
            $to_print =$this->usersFunctions($_GET["action"]);
        }else {
            $to_print = array("Error" => "Resource not valid.");
        }
        Json::view($to_print);
    }
    private function usersFunctions($action)
    {
        if ($this->action == "getAll") {
            return $this->usersController->getAll();
        } else {
            return array("Error" => "Action not valid.");
        }
    }

}