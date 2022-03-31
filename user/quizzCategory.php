<?php
session_start();

include "./db/db_config.php";
$userId=$_SESSION['user_id'];
$pagId=$_SESSION['page'];
$get_topic=mysqli_query($con,"SELECT * FROM `quizz_topics` where qt_name='$pagId'");
$get_topic_id=mysqli_fetch_assoc($get_topic);
if($pagId!='index' ){
 $wc= "where catg_qt_id='".$get_topic_id['qt_id']."'";
}else{
  $wc='';
}

$get_topics=mysqli_query($con,"SELECT * FROM `quizz_categories` left join `quizz_topics` on catg_qt_id=qt_id $wc");
?>
<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-primary">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title ">Quizz Topics </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <th>ID</th>
                          <th>Topic</th>
                          <th>Category</th>
                          <th>Action</th>
                        </thead>
                        <tbody>
                        <?php
                         $i=1;
while($row=mysqli_fetch_assoc($get_topics)){
    ?>
            <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['qt_name'];?></td>
                <td><?php echo $row['catg_name'];?></td>
                <td>
                <a  href="./test.php?topic=<?php echo $row['catg_qt_id'] ?>&&id=<?php echo $row['catg_id'] ?>" class="btn btn-white take_quizz">Take Quizzs</a>
                 <!-- <button class="edit_category categoryModal" data-toggle="modal" data-target="#categoryModal" id="<?php echo $row['catg_id']?>">Take Test</button> -->
                </td>



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
