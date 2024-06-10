<?php
include 'libs/conectar.php';

function informa(){
    global $conn;
    $sql = "SELECT nombre, apellidos, direccion, carrera FROM profesores LIMIT 1";
    $res = $conn->query($sql);

    if($res->rowCount()>0)
    {
        return $res->fetch(PDO::FETCH_ASSOC);
    }else{ 
        return false; 
    }
}

function obtenerInformacionUsuario($id_prof) {
    global $conn;

    $sql = "SELECT p.nombre, p.apellidos, p.direccion, p.cedula, p.carrera, u.usuario
            FROM profesores p
            INNER JOIN usuarios u ON p.id_prof = u.id_prof
            WHERE p.id_prof = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_prof]);

    if ($stmt->rowCount() > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function obtenerMaterias(){
    global $conn;
    $sql = "SELECT nombre_mat, tipo, semestre FROM materias LIMIT 1";
    $res1 = $conn->query($sql);
    if($res1->rowCount() > 0) { 
        return $res1->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function cantidadMateriasPorProfesor($id_prof) {
    global $conn;

    $sql2 = "SELECT m.nombre_mat, m.semestre
             FROM asignaturas AS a
             JOIN profesores AS p ON a.id_prof = p.id_prof
             JOIN materias AS m ON a.id_mat = m.id_mat
             WHERE p.id_prof = ?"; 
             
    $stmt = $conn->prepare($sql2);
    $stmt->execute([$id_prof]); 
    
    if (!$stmt) {
        // Manejo de errores si la consulta SQL falla
        echo "Error en la consulta SQL: " . $conn->error;
        return false;
    }

    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

?>
