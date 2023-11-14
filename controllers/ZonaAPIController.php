<?php
class ZonaAPIController extends APIController {

    function __construct() {
        parent::__construct();
        $this->$model = new ZonaModel();
    }

    
    //GET general e individual
    public function get($params = []) {
        if(empty($params)) {
            $zonas = $this->model->getZonas();
            return $zonas;
        } else {
            $zona_id = $params[":ID"];
            $zona = $this->model->getZona($zona_id);
            if(!empty($zona)) {
                return $this->view->response($zona, 200);
            } else {
                return $this->view->response("Zona id: $zona_id not found", 404);
            }
        }
    }


    //POST zona
    public function addZona($params = []) {
        $body = $this->getData();

        $id = $body->id;
        $nombre = $body->nombre;
        $ubicacion = $body->ubicacion;
        $descripcion = $body->descripcion;
        $huesosInvolucrados = $body->huesosInvolucrados;
        
        $zona = $this->model->addZona($id, $nombre, $ubicacion, $descripcion, $huesosInvolucrados);
    }


    //PUT zona
    public function updateZona($params = []) {
        $zona_id = $params[":ID"];
        $zona = $this->model->getZona($zona_id);

        if($zona) {
            $body = $this->getData();

            $nombre = $body->nombre;
            $ubicacion = $body->ubicacion;
            $descripcion = $body->descripcion;
            $huesosInvolucrados = $body->huesosInvolucrados;

            $zon = $this->model->updateZona($zona_id, $nombre, $ubicacion, $descripcion, $huesosInvolucrados);
            $this->view->response("Zona id: $zona_id updated successfully.", 200);
        } else {
            $this->view->response("Zona id: $zona_id not found.", 404);
        }
    }


    //DELETE zona
    public function deleteEjercicio($params = []) {
        $zona_id = $params[":ID"];
        $zona = $this->model->getZona($zona_id);

        if($zona) {
            $this->model->deleteZona($zona_id);
            $this->view->response("Zona id: $zona_id deleted successfully.", 200);
        } else {
            $this->view->response("Zona id: $zona_id not found.", 404);
        }
    }
}