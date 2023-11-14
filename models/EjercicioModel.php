<?php
require_once './config.php';

class EjercicioModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host='. MYSQL_HOST .';' . 'dbname=' . MYSQL_DB . ';' . 'charset=utf8' , MYSQL_USER, MYSQL_PASS);
    }

    function connect() {
        return new PDO('mysql:host='. MYSQL_HOST .';' . 'dbname=' . MYSQL_DB . ';' . 'charset=utf8' , MYSQL_USER, MYSQL_PASS);
    }


    //get de todos los ejercicios
    function getEjercicios() {
        $query = $this->db->prepare('SELECT * FROM ejercicios');
        $query->execute();

        $ejercicios = $query->fetchAll(PDO::FETCH_OBJ);
        return $ejercicios;
    }
    
    
    //GET de ejercicios con zonas
    function getEjerciciosConZonas() {
        $query = $this->db->prepare('SELECT zonas.nombre AS nombre_zona, ejercicios.ejercicio_id, ejercicios.nombre, ejercicios.requerimientos, ejercicios.lugar, zonas.zona_id
        FROM ejercicios INNER JOIN zonas ON ejercicios.zona = zonas.zona_id');
        $query->execute([]);

        $cont = $query->fetchAll(PDO::FETCH_OBJ);
        return $cont;
    } 


    //GET de ejercicios order by
    function getEjerciciosOrderBy($sort, $order) {
        $query = $this->db->prepare('SELECT * FROM ejercicios ORDER BY (?,?)')
        $query->execute([$sort, $order]);

        $ordenados = $query->fetchAll(PDO::FETCH_OBJ);
        return $ordenados;
    }
    
    
    //GET de un ejercicio por id
    function getEjercicio($id) {
        $query = $this->db->prepare('SELECT * FROM ejercicios WHERE ejercicio_id = ?');
        $query->execute([$id]);

        $query2 = $this->db->prepare('SELECT * FROM zonas WHERE zona_id=?');
        $query2->execute([$ejercicio[0]->nombre]);
        
        $ejercicio = $query->fetchAll(PDO::FETCH_OBJ);
        $zona = $query2->fetchAll(PDO::FETCH_OBJ);
        return $ejercicio;
    }


    //POST de ejercicio
    function addEjercicio($nombre, $zona, $requerimientos, $lugar) {
        $query = $this->db->prepare('INSERT INTO ejercicios (nombre, zona, requerimientos, lugar) VALUES (?, ?, ?, ?)');
        $query->execute([$nombre, $zona, $requerimientos, $lugar]);
    }


    //PUT de ejercicio
    function updateEjercicio($id, $nombre, $zona, $requerimientos, $lugar) {
        $db = $this->connect();
        $query = $this->db->prepare('UPDATE ejercicios SET nombre = ?, zona = ?, requerimientos = ?, lugar=? WHERE ejercicio_id=?');
        $query->execute([$nombre, $zona, $requerimientos, $lugar, $id]);
    }

    
    //DELETE de ejercicio
    function deleteEjercicio($ejercicio_id) {
        $db = $this->connect();
        $query = $this->db->prepare('DELETE FROM ejercicios WHERE ejercicio_id = ?');
        $query->execute([$ejercicio_id]);
    }
}