<?php
session_start();
if(!isset($_SESSION["user_id"])) {
  header("location:./index.php");
}
include "./db/db_config.php";
include('includes/header.php');
$_SESSION['score']=0;

$get_score=mysqli_query($con,"SELECT qc.catg_name as type, SUM(score) as scores ,SUM(tot_ques) as tot_ques ,count(id) as tot_count FROM quizzScore as qs left join `quizz_categories` as qc on qs.type=qc.catg_id where userId='".$_SESSION['user_id']."' GROUP BY qs.type");
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
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-primary">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title ">Profile
                    </h4>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <th>ID</th>
                          <th>Category</th>
                          <th>Score</th>
                        </thead>
                        <tbody>
                        <?php
                         $i=1;
while($row=mysqli_fetch_assoc($get_score)){
    ?>
            <tr>
                  <td><?php echo $i;?></td>
                <td><?php echo ucfirst($row['type']);?></td>
                <td><?php echo round(($row['scores']/$row['tot_ques'])*100) .' %'?></td>
                <td>
            </tr>

       <?php
        $i=$i+1;
}?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
              </div>

            </div>

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