<?php
require_once './config.php';

class ZonaModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host='. MYSQL_HOST . ';' . 'dbname=' . MYSQL_DB . ';' . 'charset=utf8', MYSQL_USER, MYSQL_PASS);
    }



    //GET de una zona por id
    function getZona($id) {
        if ($id == 0) {
            return $this->getEjerciciosConZonas();
        }

        $query = $this->db->prepare('SELECT zonas.nombre AS nombre_zona, ejercicios.ejercicio_id, ejercicios.nombre, ejercicios.requerimientos, ejercicios.lugar, zonas.zona_id
        FROM ejercicios INNER JOIN zonas ON ejercicios.zona = zonas.zona_id WHERE ejercicios.zona = ?');
        $query->execute([$id]);
        
        $zona = $query->fetchAll(PDO::FETCH_OBJ);
        return $zona;
    }


    //GET de zonas
    function getZonas() {
        $query = $this->db->prepare('SELECT * FROM zonas');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    //POST de zona
    function addZona($nombre, $ubicacion, $descripcion, $huesosInvolucrados) {
        $query = $this->db->prepare('INSERT INTO zonas(nombre, ubicacion, descripcion, huesosInvolucrados) VALUES (?, ?, ?, ?)');
        $query->execute([$nombre, $ubicacion, $descripcion, $huesosInvolucrados]);
    }


    //PUT de zona
    function editZona($id, $nombre, $ubicacion, $descripcion, $huesosInvolucrados) {
        $query = $this->db->prepare('UPDATE zonas SET nombre = ?, ubicacion = ?, descripcion = ?, huesosInvolucrados = ? WHERE zona_id=?');
        $query->execute([$id, $nombre, $ubicacion, $descripcion, $huesosInvolucrados]);
    }


    //DELETE de zona
    function delZona($id) {
        $query = $this->db->prepare('DELETE FROM zonas WHERE zona_id=?');
        $query->execute([$id]);
    }
}