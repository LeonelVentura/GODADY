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
                            estado,
                            DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha
                    FROM 
                        eventos 
                    WHERE fecha LIKE '%". $fecha ."%'";
            } else {
                $sql = "SELECT id_evento,
                            evento,
                            DATE_FORMAT(hora_inicio, '%H:%i:%s') AS hora_inicio, 
                            DATE_FORMAT(hora_fin, '%H:%i:%s') AS hora_fin,
                            DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha,
                            est
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
                            estado,
                            fecha
                    FROM 
                        eventos 
                    WHERE id_evento = '$id_evento'";
            $respuesta = mysqli_query($this->conexion, $sql);
            return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        }

        
        public function agregar($data) {
            // Obtener la fecha actual
            $fechaActual = date('Y-m-d'); 
        
            // Determinar el estado basado en la fecha
            if ($data['fecha'] < $fechaActual) {
                $estado = 'Realizado';
            } elseif ($data['fecha'] == $fechaActual) {
                $estado = 'En_Curso';
            } else {
                $estado = 'Organizando';
            }
        
            $sql = "INSERT INTO eventos (
                                        evento,
                                        hora_inicio,
                                        hora_fin,
                                        fecha,
                                        estado) 
                            VALUES (?, ?, ?, ?, ?)";
            $query = $this->conexion->prepare($sql);
            $query->bind_param('sssss',
                                $data['evento'],
                                $data['hora_inicio'],
                                $data['hora_fin'],
                                $data['fecha'],
                                $estado);
                                
            return $query->execute();
        }
        public function eliminarEvento($id_evento) {
            
            $sql = "DELETE FROM eventos WHERE id_evento = ?";
            $query = $this->conexion->prepare($sql);
            $query->bind_param('i', $id_evento);
            return $query->execute();
        }

        public function actualizarEvento($data) {
            // Obtener la fecha actual
            $fechaActual = date('Y-m-d'); 
        
            // Determinar el estado basado en la fecha
            if ($data['fecha'] < $fechaActual) {
                $estado = 'Realizado';
            } elseif ($data['fecha'] == $fechaActual) {
                $estado = 'En_Curso';
            } else {
                $estado = 'Organizando';
            }
        
            $sql = "UPDATE eventos SET evento = ?,
                                        hora_inicio = ?,
                                        hora_fin = ?, 
                                        fecha = ?,
                                        estado = ?
                        WHERE id_evento = ?";
            $query = $this->conexion->prepare($sql);
            $query->bind_param('sssssi',
                                $data['evento'],
                                $data['hora_inicio'],
                                $data['hora_fin'],
                                $data['fecha'],
                                $estado,
                                $data['id_evento']);
                                
            return $query->execute();
        }


        public function fullCalendar() {
            
            $sql = "SELECT 
                        id_evento AS id,
                        evento AS title,
                        hora_inicio AS start,
                        hora_fin AS end,
                        estado AS estate
                    FROM
                        eventos";
                       

            $respuesta = mysqli_query($this->conexion, $sql);
            $eventos = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);

            return json_encode($eventos);
        }

    }
