<?php
session_start();
include 'conectar.php';
$rolUsuario = "profesor";

if (isset($_SESSION['user'])) {
    $nombreUsuario = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Encuadres</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <style>
    .home-section {
  position: relative;
  background: #E4E9F7;
  min-height: 100vh;
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
  z-index: 2;
  display: flex;
  flex-direction: column;
  align-items: center; /* Centra horizontalmente */
  justify-content: center; /* Centra verticalmente */
}
  </style>
      <!-- sidebar -->
      <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">Encuadres</div>
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list">
          <li>
            <a href="index.php">
              <i class='bx bx-file'></i>
                <span class="links_name">Inicio</span>
            </a>
              <span class="tooltip">Inicio</span>
            </li>
          <li>
           <a href="users.php">
             <i class='bx bx-user' ></i>
             <span class="links_name">Usuario</span>
           </a>
           <span class="tooltip">Usuario</span>
         </li>
         <li>
          <a href="template_ingenieria.php">
            <i class='bx bx-plus' ></i>
            <span class="links_name">Crear encuadre</span>
          </a>
          <span class="tooltip">Nuevo encuadre</span>
        </li>
         <li>
           <a href="encuadres.php">
             <i class='bx bx-folder' ></i>
             <span class="links_name">Encuadres</span>
           </a>
           <span class="tooltip">Encuadres</span>
         </li>
         <<li class="profile">
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
            <i class='bx bx-log-out' id="log_out" ></i>
            <span class="links_name">Salir</span>
          </a>
          <span class="tooltip">Salir</span>
        </li>
        </ul>
      </div>
      <!-- Fin Sidebar -->
  <section class="home-section">
      <div class="text">Lista de Encuadres</div>
      <!-- Tabla para ver los encuadres creados -->
      <table class="tabla" width="50%" cellspacing="0">
        <thead>
          <th>#</th>
          <th>Materia</th>
          <th>Semestre</th>
          <th>Archivo</th>
          <th>Editar</th>
          <th>Descargar</th>
        </thead>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><button>Editar</button></td>
          <td><i class='bx bx-download'>Archivo</td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><button>Editar</button></td>
          <td><i class='bx bx-download'><a href="pdfgen2.php">Archivo</td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><button>Editar</button></td>
          <td><i class='bx bx-download'>Archivo</td>
        </tr>
      </table>
  </section>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//llamar la funcion (opcional)
  });

  searchBtn.addEventListener("click", ()=>{ // se abre el sidebar cuando se hace clic
    sidebar.classList.toggle("open");
    menuBtnChange(); //llamar la funcion (opcional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//reemplazar las clases icon
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//reemplazar las clases icon
   }
  }
  </script>
</body>
</html>
