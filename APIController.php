<?php
abstract class APIController {
    protected $model; //lo instancio en los hijos
    protected $view;
    private $data;

    public function __construct() {
        $this->$view = new APIView;
        $this->$data = file_get_contents("php://input");
    }

    function getData() {
        return json_decode($this->data);
    }
}