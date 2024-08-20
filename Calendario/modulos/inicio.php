<?php 
  include "header1.php";
 
?>
    <nav>
        <div class="nav-container">
            <ul>
                <li><a href="../../index.php">Home</a></li>
                <li><a href="../modulos/eventos1.php">Agendar Evento</a></li>
            </ul>
        </div>
    </nav>
<style>
        #calendario {
            width: 600px;
            height: 400px;
        }

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
        <div id='calendar'></div>
          
        </div>
      </div>
    </div>
  </div>
</div>


<?php 
  include "footer1.php";
?>
<script src="../public/js/fullCalendar.js"></script>
    
   