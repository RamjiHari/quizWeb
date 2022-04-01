<?php
session_start();
if(!isset($_SESSION["user_id"])) {
  header("location:./login.php");
}
include "./db/db_config.php";
include('includes/header.php')
 ?>


<body class="dark-edition ">
  <div class="wrapper ">
  <?php include('includes/side-menu.php')?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include('includes/admin-menu.php')?>
      <!-- End Navbar -->
      <div class="content">
        <div class="content">
          <div class="container-fluid">

          <?php include('quizzCategory.php')?>



          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.allskills.in" target="_blank">Allskills</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>

</body>


<?php include('includes/footer.php')?>
<script src="./js/ajax.js"></script>