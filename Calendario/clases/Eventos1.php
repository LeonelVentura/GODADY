<?php
 /* $conexion = mysqli_connect("localhost", "cures_dev", "yZJSUpXg4tnu", "arsocial_db"); */
$conexion = mysqli_connect("localhost", "root", "", "proyecto"); 
    class Eventos {
        private $conexion;
    
        public function __construct() {
            // Inicializa la conexión dentro del constructor
             /* $this->conexion = new mysqli("localhost", "cures_dev", "yZJSUpXg4tnu", "arsocial_db"); */
            $this->conexion = new mysqli("localhost", "root", "", "proyecto");
            if ($this->conexion->connect_error) { 
                die("Conexión fallida: " . $this->conexion->connect_error);
            }
        }
        public function mostrarEventos($fecha) {
            
            if ($fecha != "") {
                $sql = "SELECT id_evento,
                            evento,
                            DATE_FORMAT(hora_inicio, '%H:%i:%s') AS hora_inicio, 
                            DATE_FORMAT(hora_fin, '%H:%i:%s') AS hora_fin,
                            DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha
                    FROM 
                        eventos 
                    WHERE fecha LIKE '%". $fecha ."%'";
            } else {
                $sql = "SELECT id_evento,
                            evento,
                            DATE_FORMAT(hora_inicio, '%H:%i:%s') AS hora_inicio, 
                            DATE_FORMAT(hora_fin, '%H:%i:%s') AS hora_fin,
                            DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha
                    FROM 
                        eventos";
                    
            }
            

            $respuesta = mysqli_query($this->conexion, $sql);
            return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        }

        public function editarEvento($id_evento) {
            
            $sql = "SELECT id_evento,
                            evento,
                            DATE_FORMAT(hora_inicio, '%H:%i:%s') AS hora_inicio, 
                            DATE_FORMAT(hora_fin, '%H:%i:%s') AS hora_fin,
                            fecha
                    FROM 
                        eventos 
                    WHERE id_evento = '$id_evento'";
            $respuesta = mysqli_query($this->conexion, $sql);
            return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        }

        public function agregar($data) {
            $sql = "INSERT INTO eventos (
                                            evento,
                                            hora_inicio,
                                            hora_fin,
                                            fecha) 
                            VALUES (?, ?, ?, ?)";
            $query = $this->conexion->prepare($sql);
            $query->bind_param('ssss',
                                        $data['evento'],
                                        $data['hora_inicio'],
                                        $data['hora_fin'],
                                        $data['fecha']);
                                        
            return $query->execute();
        }
        public function eliminarEvento($id_evento) {
            
            $sql = "DELETE FROM eventos WHERE id_evento = ?";
            $query = $this->conexion->prepare($sql);
            $query->bind_param('i', $id_evento);
            return $query->execute();
        }

        public function actualizarEvento($data) {
            
            $sql = "UPDATE eventos SET evento = ?,
                                        hora_inicio = ?,
                                        hora_fin = ?, 
                                        fecha = ? 
                    WHERE id_evento = ?";
            $query = $this->conexion->prepare($sql);
            $query->bind_param('ssss', $data['evento'],
                                            $data['hora_inicio'],
                                            $data['hora_fin'],
                                            $data['fecha'],
                                            $data['id_evento']);
                                            
            return $query->execute();
        }

        public function fullCalendar() {
            
            $sql = "SELECT 
                        id_evento AS id,
                        evento AS title,
                        hora_inicio AS start,
                        hora_fin AS end
                    FROM
                        eventos";
                       

            $respuesta = mysqli_query($this->conexion, $sql);
            $eventos = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);

            return json_encode($eventos);
        }
    }
