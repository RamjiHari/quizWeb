<?php
session_start();
include "./db/db_config.php";
$userId=$_SESSION['user_id'];
$get_topic=mysqli_query($con,"SELECT * FROM `quizz_topics` where qt_createdby='$userId'");
$get_catgeory=mysqli_query($con,"SELECT * FROM `quizz_categories` where catg_createdby='$userId'");
$get_questions=mysqli_query($con,"SELECT * FROM `quizz_qustions` left join `quizz_topics` on topic=qt_id  left join `quizz_categories` on type=catg_id where createdBy='$userId'  ORDER BY `qu_id`");
?>
<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-primary">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title ">Questions</h4>
                    <button class="btn btn-white float-right questionModal">Create</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <th>ID</th>
                          <th>Topic</th>
                          <th>Category</th>
                          <th>Question</th>
                          <th>Edit</th>
                         <th>Delete</th>
                        </thead>
                        <tbody>
                        <?php
                         $i=1;
while($row=mysqli_fetch_assoc($get_questions)){
    ?>
            <tr>
                  <td><?php echo $i;?></td>
                <td><?php echo $row['qt_name'];?></td>
                <td><?php echo $row['catg_name'];?></td>
                <td><?php echo $row['question'];?></td>
                <td>
                 <a class="edit_questions questionModal"  id="<?php echo $row['qu_id']?>">Edit</a>
                </td>
                <td>
                <a class="delete_question" id="<?php echo $row['qu_id']?>">Delete</a>
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
             <!-- Classic Modal -->
             <div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="questionModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Create Topic</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          <i class="material-icons">clear</i>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="col-md-12">
                            <div class="card ">

                                <div class="card-body ">
                                <form method="#" action="#" autocomplete="off" id="saveQuestionForm">
                                <input type="hidden" class="form-control" name="queid" id="queid">
                                    <select class="form-control" id="que_category" name="que_category" data-style="select-with-transition">
                                        <option value="">Select Category</option>
                                        <?php
                                        while($row=mysqli_fetch_assoc($get_catgeory)){
                                        ?>
                                        <option value="<?php echo $row['catg_id'];?>"><?php echo $row['catg_name'];?></option>
                                        <?php
                                        }?>
                                        </select>

                                      <div class="form-group">
                                        <label for="topic" class="md-label">Question</label>
                                        <input type="text" class="form-control" name="question"  id="question">
                                    </div>
                                    <div class="form-group">
                                        <label for="topic" class="md-label">Option One</label>
                                        <input type="text" class="form-control" name="option_one"  id="option_one">
                                    </div>
                                    <div class="form-group">
                                        <label for="topic" class="md-label">Option Two</label>
                                        <input type="text" class="form-control" name="option_two"  id="option_two">
                                    </div>
                                    <div class="form-group">
                                        <label for="topic" class="md-label">Option Three</label>
                                        <input type="text" class="form-control" name="option_three"  id="option_three">
                                    </div>
                                    <div class="form-group">
                                        <label for="topic" class="md-label">Option One</label>
                                        <input type="text" class="form-control" name="option_four"  id="option_four">
                                    </div>
                                    <div class="form-group">
                                        <label for="topic" class="md-label">Correct Answer</label>
                                        <input type="text" class="form-control" name="answer"  id="answer">
                                    </div>


                                </form>
                                </div>
                                <div class="card-footer ">

                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                      <button type="button" name="save" value="Save" class="btn btn-fill btn-primary" id="add_question">Submit</button>
                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
