<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<!-- Todavia no le pongo los caracteres especiales profe, es que andaba experimentando con cosas jaja -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Encuadre</title>
    <style>
        .encuadre {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .alto {
            text-align: justify;
            margin: auto;
        }

        h3 {
            font-size: 1rem;
            max-width: 70%;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        h3:after {
            content: "";
            display: inline-block;
            height: 0.5em;
            vertical-align: bottom;
            /* Ajusta esta propiedad según tus necesidades */
            width: 100%;
            margin-right: -100%;
            margin-left: 10px;
            border-top: 1px solid black;
        }
        th,
        td {
            border: 1px solid #dddddd;
            padding: 8px;
        }

        .estilo,td:nth-child(3),td:nth-child(9),tr:nth-child(9){
            background-color: rgb(196, 193, 193);
        }
        td:nth-child(1){
            background-color: rgb(225, 225, 225);
 
        }
        td:nth-child(3),td:nth-child(9){
            font-size: 0;
        }
        td:nth-child(2),td:nth-child(10),td:nth-child(11),td:nth-child(12){
            background-color: rgb(255, 255, 255);
        }
        
    </style>
</head>

<body>
    <div class="encuadre">
        <h1>Universidad Autonoma de Baja California</h1>
        <h2>Facultad de Ingenieria, Arquitectura y Disenio</h2>
        <h3><span>Carrera:</span></h3>
        <table class="alto">
            <thead>
                <tr>
                <tr>
                    <th colspan="">DOCENTE(S):</th>
                    <th colspan="5">nombre generico</th>
                </tr>
                <tr>
                    <th colspan="5"></th>
                </tr>
                <tr>
                    <th>ASIGNATURA:</th>
                    <th colspan="5">nombre generico</th>
                </tr>
                <tr>
                    <th>SEMESTRE EN EL QUE SE IMPARTE:</th>
                    <th></th>
                    <th>Grupo</th>
                    <th></th>
                    <th>TIPO DE CURSO</th>
                </tr>
            </thead>
        </table>
        <br>
        <br>
        <table>
            <thead>
                <tr class="estilo">
                    <th>Semana</th>
                    <th>Mes</th>
                    <th>D</th>
                    <th>L</th>
                    <th>M</th>
                    <th>M</th>
                    <th>J</th>
                    <th>V</th>
                    <th>S</th>
                    <th>Tema</th>
                    <th>Practicas</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody id="calendario-body">
            </tbody>
        </table>
        <br>
        <button>Descargar</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Definir el número total de semanas
            const totalSemanas = 19;
    
            // Definir las semanas asignadas a cada mes
            const semanasPorMes = [1, 5, 9, 14,  19];
    
            // Definir los nombres de los meses
            const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio"];
    
            // Obtener el elemento del cuerpo del calendario por su ID
            const calendarioBody = document.getElementById("calendario-body");
    
            // Limpiar el cuerpo de la tabla
            calendarioBody.innerHTML = '';
    
            // Inicializar variables
            let mesIndex = 0;
            let diaMes = 28;
    
            // Recorrer las semanas
            for (let semana = 0; semana <= totalSemanas; semana++) {
                // Crear una nueva fila para cada semana
                const row = document.createElement("tr");
    
                // Crear celda para la semana actual
                const semanaCell = document.createElement("td");
                semanaCell.textContent = `${semana+1}`;
                row.appendChild(semanaCell);
    
                // Actualizar el índice del mes cuando sea necesario
                if (semanasPorMes.includes(semana)) {
                    mesIndex++;
                    if (mesIndex >= meses.length) {
                        mesIndex = 0;
                    }
                }
    
                // Crear celda para el nombre del mes actual
                const mesCell = document.createElement("td");
                mesCell.textContent = meses[mesIndex];
                row.appendChild(mesCell);
    
                // Obtener la cantidad de días en el mes actual
                const diasEnMes = new Date(new Date().getFullYear(), mesIndex, 0).getDate();
    
                // Generar dinámicamente los números de los días del mes empezando por 29
                for (let i = 0; i < 7; i++) {
                    const diaCell = document.createElement("td");
                    diaCell.textContent = diaMes;
                    row.appendChild(diaCell);
    
                    // Reiniciar el contador al llegar al final del mes
                    if (diaMes === diasEnMes) {
                        diaMes = 1;
                    } else {
                        diaMes++;
                    }
                }
    
                // Crear tres celdas de texto o insertar el texto deseado
                for (let i = 0; i < 3; i++) {
                    const textCell = document.createElement("td");
                    if (semana === 9 && i === 0) {
                        textCell.textContent = "Vacaciones Semana Santa";
                    } else if (semana === 12 && i === 0) {
                        textCell.textContent = "FIAD";
                    } else if (semana === 19 && i === 0) {
                        textCell.textContent = "Examenes Ordinarios";
                    } else {
                        // Crear un input de texto si no se cumple ninguna condición especial
                        const input = document.createElement("input");
                        input.type = "text";
                        textCell.appendChild(input);
                    }
                    row.appendChild(textCell);
                }
    
                // Agregar la fila al cuerpo del calendario
                calendarioBody.appendChild(row);
            }
        });
    </script>
    
</body>
</html>