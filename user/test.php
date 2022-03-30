<?php
session_start();
if(!isset($_SESSION["user_id"])) {
  header("location:./index.php");
}
include "./db/db_config.php";
include('includes/header.php');
$_SESSION['score']=0;
$_SESSION['topic']=$_GET['topic'];
$_SESSION['categ']=$_GET['id'];
$get_question=mysqli_query($con,"SELECT * FROM `quizz_qustions` where type='".$_SESSION['categ']."'");
$_SESSION['totques']=mysqli_num_rows($get_question);
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
                    <h4 class="card-title ">Quizz Questions</h4>
                  </div>
                  <div class="card-body">
                  <?php
                   $i=1;
                   while($row=mysqli_fetch_assoc($get_question)){
                  ?>
                        <div style="display:none;" id=<?php echo  'qu_'.$i ?>>
                        <p><?php echo $i.' . '. $row['question']; ?></p>

<div class="form-group pl-4">
    <input name="answer_<?php echo $row['qu_id'] ?>" onClick="check(1,<?php echo $row['correctIndex'] ?>,<?php echo $i; ?>,<?php echo $_SESSION['totques']?>)"  class="form-check-input" type="radio">
    <label class="form-check-label">
    <?php echo $row['option_one']; ?>
    </label>
    </div>

    <div class="form-group pl-4">
    <input name="answer_<?php echo $row['qu_id'] ?>" onClick="check(2,<?php echo $row['correctIndex'] ?>,<?php echo $i; ?>,<?php echo $_SESSION['totques']?>)"  class="form-check-input" type="radio">
    <label class="form-check-label">
    <?php echo $row['option_two']; ?>
    </label>
    </div>

    <div class="form-group pl-4">
    <input name="answer_<?php echo $row['qu_id'] ?>" onClick="check(3,<?php echo $row['correctIndex'] ?>,<?php echo $i; ?>,<?php echo $_SESSION['totques']?>)"  class="form-check-input" type="radio">
    <label class="form-check-label">
    <?php echo $row['option_three']; ?>
    </label>
    </div>

    <div class="form-group pl-4">
    <input name="answer_<?php echo $row['qu_id'] ?>" onClick="check(4,<?php echo $row['correctIndex'] ?>,<?php echo $i; ?>,<?php echo $_SESSION['totques']?>)"  class="form-check-input" type="radio">
    <label class="form-check-label">
    <?php echo $row['option_four']; ?>
    </label>
    </div>
                        </div>


                        <?php $i=$i+1; } ?>
                  </div>

                </div>
              </div>
              <!-- <button onClick="submit()" style="display:none;"  class="btn btn-white float-right categoryModal subbtn">Submit</button> -->
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
<script>
  $(document).ready(function() {
    $("#qu_1").show();
  })
</script>