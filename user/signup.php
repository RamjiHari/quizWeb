<?php
session_start();
$link = $_SERVER['REQUEST_URI'];
$link_array = explode('/',$link);
$page = end($link_array);
$str = strpos("$page", '.');
if($str){
  $_SESSION["page"]=strstr($page, '.', true);
}else{
  $_SESSION["page"]=$page;
}

 if(isset($_SESSION["user_id"])) {
    header("Location:home.php");
    }
include('includes/header.php');
?>
<body class="dark-edition off-canvas-sidebar ">

  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('../../assets/img/login.jpg'); background-size: cover; background-position: top center;">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form class="form" action="./cms/log_check.php">
              <div class="card card-login">
                <div class="card-header card-header-primary text-center">
                  <h4 class="card-title">Register</h4>
                  <div class="social-line">
                    <a href="javascript:;" class="btn btn-just-icon btn-link text-white">
                      <i class="fa fa-facebook-square"></i>
                    </a>
                    <a href="javascript:;" class="btn btn-just-icon btn-link text-white">
                      <i class="fa fa-twitter"></i>
                    </a>
                    <a href="javascript:;" class="btn btn-just-icon btn-link text-white">
                      <i class="fa fa-google-plus"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body ">
                  <p class="card-description text-center">Or Be Classical</p>
                  <span class="md-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">email</i>
                        </span>
                      </div>
                      <input type="email" name="email"  class="form-control" placeholder="Email...">
                    </div>
                  </span>
                  <span class="md-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">email</i>
                        </span>
                      </div>
                      <input type="username" name="username"  class="form-control" placeholder="UserName...">
                    </div>
                  </span>
                  <span class="md-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input type="password" name="password"  class="form-control" placeholder="Password...">
                    </div>
                  </span>
                </div>
                <div class="card-footer justify-content-center">
                <input type="submit" class="btn btn-primary" value="Register" name="signup" />

                </div>
                <div class="card-footer justify-content-center">
                <a href='./'  >Login</a>
  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">

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