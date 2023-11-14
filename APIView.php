<?php
class APIView {
    //respuesta al require
    public function response($data, $status) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        echo json_encode($data);
    }

    //devuelve el status de la respuesta según el código solicitado
    public function _requestStatus($code) {
        $status = array(
            200=>"OK",
            201=>"CREATED",
            400=>"BAD REQUEST, INVALID URL",
            404=>"NOT FOUND",
            500=>"INTERNAL SERVER ERROR"
        );

        return (isset($status[$code]))? $status[$code] : $stauts[500];
    }
}   