<?php
session_start();
include 'conectar.php';
$rolUsuario = "Sin rol";

if (isset($_SESSION['user'])) {
    $nombreUsuario = $_SESSION['user'];
    if ($_SESSION['rol'] == 0) {
        $rolUsuario = 'profesor de ingeniería';
    } elseif ($_SESSION['rol'] == 1) {
        $rolUsuario = 'profesor de arquitectura';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Encuadre</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .rectangulo {
            border: 1px solid #dddddd;
            padding: 10px;
            background-color: #f9f9f9;
            display: inline-block;
        }

        .division-table {
            border-collapse: collapse;
        }

        .division-table td {
            border: 1px solid #dddddd;
            padding: 8px;
        }

        .division-table tr:first-child td {
            background-color: #ddd;
            border-bottom: 1px solid #dddddd;
        }

        .yellow-row td {
            background-color: yellow;
        }

        .rectangulo-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .boton-container {
            text-align: center;
            margin-top: 20px;
        }

        .special-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .special-table td {
            padding: 8px;
            text-align: center;
        }

        .special-table tr:first-child td,
        .special-table tr:last-child td {
            border: none;
        }

        .special-table tr:not(:first-child):not(:last-child) td {
            border: 1px solid #dddddd;
        }

        .special-table .no-border td {
            text-align: center;
        }

        .extra-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .extra-table th,
        .extra-table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
        }

        .extra-rectangulo {
            border: 1px solid #dddddd;
            padding: 10px;
            background-color: #f9f9f9;
            margin: 10px 0;
            display: inline-block;
            width: 100%;
        }

        .firma-container {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .firma-box {
            border-top: 1px solid #000;
            width: 30%;
            text-align: center;
            padding-top: 10px;
        }
        .highlight {
    background-color: white;
    }
    .highlight2{
        background-color: lightgray;
    }
    </style>
</head>
<body>
    <!-- sidebar -->
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">Encuadres</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="users.html">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Usuario</span>
                </a>
                <span class="tooltip">Usuario</span>
            </li>
            <li>
                <a href="crearencuadre.php">
                    <i class='bx bx-plus'></i>
                    <span class="links_name">Crear encuadre</span>
                </a>
                <span class="tooltip">Nuevo encuadre</span>
            </li>
            <li>
                <a href="encuadres.html">
                    <i class='bx bx-folder'></i>
                    <span class="links_name">Encuadres</span>
                </a>
                <span class="tooltip">Encuadres</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <div class="name_job">
                        <div class="name"><?php echo $nombreUsuario; ?></div>
                        <div class="job"><?php echo $rolUsuario; ?></div>
                    </div>
                </div>
                <i class='bx bx-user-detail' id="log_out"></i>
            </li>
            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out' id="log_out"></i>
                    <span class="links_name">Salir</span>
                </a>
                <span class="tooltip">Salir</span>
            </li>
        </ul>
    </div>
    <!-- Fin Sidebar -->
    <section class="home-section">
        <div class="highlight">
        <div class="text">Encuadres</div>
        <div class="encuadre">
        <h2>Universidad Autónoma de Baja California</h2>
        <h3>Facultad de Ingeniería, Arquitectura y Diseño</h3>
    </div>
    <form method="post" action="pdfgen.php">
        <table>
            <tr>
                <td colspan="2">DOCENTE(S):</td>
                <td colspan="3"><input type="text" name="docentes"></td>
            </tr>
            <tr>
                <td colspan="2">ASIGNATURA:</td>
                <td colspan="3"><input type="text" name="asignatura"></td>
            </tr>
            <tr>
                <td colspan="2">SEMESTRE EN EL QUE SE IMPARTE:</td>
                <td colspan="3"><input type="text" name="semestre"></td>
            </tr>
            <tr>
                <td>Carrera:</td>
                <td><input type="text" name="carrera"></td>
                <td>Grupo:</td>
                <td colspan="2"><input type="text" name="grupo"></td>
                <td>TIPO DE CURSO:</td>
                <td><input type="text" name="tipo_curso"></td>
            </tr>
        </table>
        <table>
            <thead>
                <tr>
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
                    <th>Prácticas</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Febrero</td>
                    <td>28</td>
                    <td>29</td>
                    <td>30</td>
                    <td>31</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td><input type="text" name="tema_1"></td>
                    <td><input type="text" name="practicas_1"></td>
                    <td><input type="text" name="observaciones_1"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Febrero</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td><input type="text" name="tema_2"></td>
                    <td><input type="text" name="practicas_2"></td>
                    <td><input type="text" name="observaciones_2"></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Febrero</td>
                    <td>11</td>
                    <td>12</td>
                    <td>13</td>
                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                    <td>17</td>
                    <td><input type="text" name="tema_3"></td>
                    <td><input type="text" name="practicas_3"></td>
                    <td><input type="text" name="observaciones_3"></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Febrero</td>
                    <td>18</td>
                    <td>19</td>
                    <td>20</td>
                    <td>21</td>
                    <td>22</td>
                    <td>23</td>
                    <td>24</td>
                    <td><input type="text" name="tema_4"></td>
                    <td><input type="text" name="practicas_4"></td>
                    <td><input type="text" name="observaciones_4"></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Marzo</td>
                    <td>25</td>
                    <td>26</td>
                    <td>27</td>
                    <td>28</td>
                    <td>29</td>
                    <td>1</td>
                    <td>2</td>
                    <td><input type="text" name="tema_5"></td>
                    <td><input type="text" name="practicas_5"></td>
                    <td><input type="text" name="observaciones_5"></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Marzo</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td><input type="text" name="tema_6"></td>
                    <td><input type="text" name="practicas_6"></td>
                    <td><input type="text" name="observaciones_6"></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Marzo</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                    <td>13</td>
                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                    <td><input type="text" name="tema_7"></td>
                    <td><input type="text" name="practicas_7"></td>
                    <td><input type="text" name="observaciones_7"></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Marzo</td>
                    <td>17</td>
                    <td>18</td>
                    <td>19</td>
                    <td>20</td>
                    <td>21</td>
                    <td>22</td>
                    <td>23</td>
                    <td><input type="text" name="tema_8"></td>
                    <td><input type="text" name="practicas_8"></td>
                    <td><input type="text" name="observaciones_8"></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Abril</td>
                    <td>24</td>
                    <td>25</td>
                    <td>26</td>
                    <td>27</td>
                    <td>28</td>
                    <td>29</td>
                    <td>30</td>
                    <td>Vacaciones Semana Santa</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Abril</td>
                    <td>31</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td><input type="text" name="tema_10"></td>
                    <td><input type="text" name="practicas_10"></td>
                    <td><input type="text" name="observaciones_10"></td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Abril</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                    <td>13</td>
                    <td><input type="text" name="tema_11"></td>
                    <td><input type="text" name="practicas_11"></td>
                    <td><input type="text" name="observaciones_11"></td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Abril</td>
                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                    <td>17</td>
                    <td>18</td>
                    <td>19</td>
                    <td>20</td>
                    <td>FIAD</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Mayo</td>
                    <td>21</td>
                    <td>22</td>
                    <td>23</td>
                    <td>24</td>
                    <td>25</td>
                    <td>26</td>
                    <td>27</td>
                    <td><input type="text" name="tema_13"></td>
                    <td><input type="text" name="practicas_13"></td>
                    <td><input type="text" name="observaciones_13"></td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Mayo</td>
                    <td>28</td>
                    <td>29</td>
                    <td>30</td>
                    <td>31</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td><input type="text" name="tema_14"></td>
                    <td><input type="text" name="practicas_14"></td>
                    <td><input type="text" name="observaciones_14"></td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Mayo</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td><input type="text" name="tema_15"></td>
                    <td><input type="text" name="practicas_15"></td>
                    <td><input type="text" name="observaciones_15"></td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>Mayo</td>
                    <td>12</td>
                    <td>13</td>
                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                    <td>17</td>
                    <td>18</td>
                    <td><input type="text" name="tema_16"></td>
                    <td><input type="text" name="practicas_16"></td>
                    <td><input type="text" name="observaciones_16"></td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>Junio</td>
                    <td>26</td>
                    <td>27</td>
                    <td>28</td>
                    <td>29</td>
                    <td>30</td>
                    <td>31</td>
                    <td>1</td>
                    <td><input type="text" name="tema_17"></td>
                    <td><input type="text" name="practicas_17"></td>
                    <td><input type="text" name="observaciones_17"></td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>Junio</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td><input type="text" name="tema_18"></td>
                    <td><input type="text" name="practicas_18"></td>
                    <td><input type="text" name="observaciones_18"></td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>Julio</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>Examenes Ordinarios</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
         <div class="rectangulo-container">
            <div class="rectangulo">
                <table class="division-table">
                    <tr>
                        <td>CRITERIO DE EVALUACIÓN (Incluir la manera de cómo se evaluará la aportación al atributo de egreso):</td>
                        <td>ATRIBUTO QUE EVALUA:</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="criterio_1"></td>
                        <td><input type="text" name="atributo_1"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="criterio_2"></td>
                        <td><input type="text" name="atributo_2"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="criterio_3"></td>
                        <td><input type="text" name="atributo_3"></td>
                    </tr>
                </table>
            </div>
            <div class="rectangulo">
                <table class="division-table">
                    <tr>
                        <td>CRITERIOS DE ACREDITACIÓN (Incluir la manera de cómo se acreditará el curso):</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="acreditacion"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <table class="extra-table">
        <tr>
            <td colspan="4">APORTACIÓN DE LA ASIGNATURA A LOS ATRIBUTOS DEL EGRESADO</td>
        </tr>
        <tr>
            <td class="highlight2"></td>
            <td class="highlight2">DESCRIPCIÓN:</td>
            <td class="highlight2">NIVEL DE APORTACION</td>
            <td class="highlight2">INSTRUMENTO DE EVALUACION</td>
        </tr>
        <tr>
            <td class="highlight2">Atributo de Egreso</td>
            <td><input type="text" name="descripcion_1"></td>
            <td><input type="text" name="nivel_1"></td>
            <td><input type="text" name="instrumento_1"></td>
        </tr>
        <tr>
            <td class="highlight2">Atributo de Egreso</td>
            <td><input type="text" name="descripcion_2"></td>
            <td><input type="text" name="nivel_2"></td>
            <td><input type="text" name="instrumento_2"></td>
        </tr>
        <tr>
            <td class="highlight2">Atributo de Egreso</td>
            <td><input type="text" name="descripcion_3"></td>
            <td><input type="text" name="nivel_3"></td>
            <td><input type="text" name="instrumento_3"></td>
        </tr>
        <tr>
            <td colspan="4">Nota: El profesor explicó al grupo como se relacionan los contenidos de esta unidad de aprendizaje con los atributos de egreso</td>
        </tr>
    </table>
    <div class="firma-container">
        <div class="firma-box">Firma del docente</div>
        <div class="firma-box">Nombre y Firma del alumno representante</div>
    </div>
    <div class="boton-container">
        <a href="pdfgen.php">
        <button>Descargar</button>
         </a>
    </div>
    </form>
        </div>
    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //llamar la funcion (opcional)
        });

        searchBtn.addEventListener("click", () => { // se abre el sidebar cuando se hace clic
            sidebar.classList.toggle("open");
            menuBtnChange(); //llamar la funcion (opcional)
        });

        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //reemplazar las clases icon
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //reemplazar las clases icon
            }
        }
    </script>
</body>
</html>