<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<!-- Pagina para hacer logout -->
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
    <!-- sidebar -->
  <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Encuadres</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
       <a href="users.html">
         <i class='bx bx-user' ></i>
         <span class="links_name">Usuario</span>
       </a>
       <span class="tooltip">Usuario</span>
     </li>
     <li>
      <a href="crearencuadre.php">
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
     <li class="profile">
         <div class="profile-details">
           <div class="name_job">
             <div class="name">Nombre Usuario</div>
             <div class="job">Rol</div>
           </div>
         </div>
         <i class='bx bx-user-detail' id="log_out" ></i>
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
      <div class="text">Saliendo de la app</div>
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