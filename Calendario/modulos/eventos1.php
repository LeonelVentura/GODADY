<?php 
  include "header1.php";
  
?>
    <nav>
        <div class="nav-container">
            <ul>
                <li><a href="../modulos/inicio.php">Calendario</a></li>
                
            </ul>
        </div>
    </nav>
<style>

        nav {
    background-color: #333;
}

        nav .nav-container {
    display: flex;
    justify-content: flex-end; /* Mueve los elementos a la derecha */
}

nav ul {
    list-style: none;
    padding: 0;
    display: flex;
    margin: 0;
}

nav ul li {
    margin: 0;
    padding: 0;
}

nav ul li a {
    color: white;
    padding: 14px 20px;
    display: flex;
    align-items: center;
    text-decoration: none;
    position: relative;
}

nav ul li a:hover {
    background-color: #575757;
}
    </style>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-3">
        <div class="card-body">
          <h2>Eventos</h2>
          

          <div class="row">
            <div class="col">
              <span class="btn btn-purple" data-bs-toggle="modal" data-bs-target="#modal_agregar_evento">
                <i class="fa-regular fa-calendar-plus"></i> Nuevo evento
              </span>
            </div>
            <div class="col"></div>
            <div class="col">
              <div class="input-group mb-3">
                <input type="date" class="form-control" id="fechaBuscar">
                <span class="btn btn-purple" onclick="buscarPorFecha()">
                  <i class="fa-solid fa-magnifying-glass"></i> Buscar
                </span>
              </div>
            </div>
          </div>

          <hr>
          <div id="tablaEventos"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
  include "eventos/modal_agregar1.php";
  include "eventos/modal_editar1.php";
  include "footer1.php";
?>

<script src="../public/js/eventos.js"></script>
    