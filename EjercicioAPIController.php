<?php
class EjercicioAPIController extends APIController {

    function __construct() {
        parent::__construct();
        $this->$model = new EjercicioModel();
    }


    //GET general e individual - ordenamiento en caso de requerirlo
    public function get($params = []) {
        if(isset($_GET['sort']) && isset($_GET['order'])) {
            $sort = $_GET['sort'];
            $order = $_GET['order'];

            $validSortOptions = ['ejercicio_id', 'nombre', 'zona', 'requerimiento', 'lugar'];
            $validOrderOptions = ['asc', 'desc'];

            if(in_array($sort, $validSortOptions) && in_array($order, $validOrderOptions)) {
                $ordenados = $this->model->getEjerciciosOrderBy();
                return $this->view->response($ordenados, 200);
            } else {
                return $this->view->response("Not valid params", 400);
            }

        } else if (empty($params)) {
            $ejercicios = $this->model->getEjerciciosConZonas();
            return $this->view->response($ejercicios, 200);
            
        } else {
            $ejercicio_id = $params[":ID"];
            $ejercicio = $this->model->getEjercicio($ejercicio_id);
            if(!empty($ejercicio)) {
                return $this->view->response($ejercicio, 200);
            } else {
                return $this->view->response("Ejercicio id: $ejercicio_id not found", 404);
            }
        }
    }


    //POST ejercicio
    public function addEjercicio($params = []) {
        $body = $this->getData();

        $id = $body->id;
        $nombre = $body->nombre;
        $zona = $body->zona;
        $requerimiento = $body->requerimiento;
        $lugar = $body->lugar;
        
        $ejercicio = $this->model->addEjercicio($id, $nombre, $zona, $requerimiento, $lugar);
        
        $agregado = $this->model->getEjercicio($id);    
        $this->view->response($agregado, 201);
    }


    //PUT ejercicio
    public function updateEjercicio($params = []) {
        $ejercicio_id = $params[":ID"];
        $ejercicio = $this->model->getEjercicio($ejercicio_id);

        if($ejercicio) {
            $body = $this->getData();

            $nombre = $body->nombre;
            $zona = $body->zona;
            $requerimiento = $body->requerimiento;
            $lugar = $body->lugar;

            $ejerc = $this->model->updateEjercicio($ejercicio_id, $nombre, $zona, $requerimiento, $lugar);
            $this->view->response("Ejercicio id: $ejercicio_id updated successfully.", 200);
        } else {
            $this->view->response("Ejercicio id: $ejercicio_id not found.", 404);
        }
    }


    //DELETE ejercicio
    public function deleteEjercicio($params = []) {
        $ejercicio_id = $params[":ID"];
        $ejercicio = $this->model->getEjercicio($ejercicio_id);

        if($ejercicio) {
            $this->model->deleteEjercicio($ejercicio_id);
            $this->view->response("Ejercicio id: $ejercicio_id deleted successfully.", 200);
        } else {
            $this->view->response("Ejercicio id: $ejercicio_id not found.", 404);
        }
    }
}