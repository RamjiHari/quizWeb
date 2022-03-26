<?php
session_start();
include "./db/db_config.php";
$get_users=mysqli_query($con,"SELECT * FROM `quizz_admin`");
$get_topics=mysqli_query($con,"SELECT * FROM `quizz_topics` left join `quizz_admin` on qt_id=id");
?>
<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-primary">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title ">Topics</h4>
                    <button class="btn btn-white float-right topicModal">Create</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <th>ID</th>
                          <th>TopicName</th>
                          <th>TopicAdmin</th>
                          <th>edit</th>
                         <th>delete</th>
                        </thead>
                        <tbody>
                        <?php
                         $i=1;
while($row=mysqli_fetch_assoc($get_topics)){
    ?>
            <tr>
                  <td><?php echo $i;?></td>
                <td><?php echo $row['qt_name'];?></td>
                <td><?php echo $row['username'];?></td>
                <td>
                 <a class="edit_topics topicModal"  id="<?php echo $row['qt_id']?>">Edit</a>
                </td>
                <td>
                <a class="delete_topics" id="<?php echo $row['qt_id']?>">Delete</a>
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
             <div class="modal fade" id="topicModal" tabindex="-1" role="dialog" aria-labelledby="topicModalLabel" aria-hidden="true" style="display: none;">
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
                                <form method="#" action="#" autocomplete="off" id="saveTopicForm">
                                <input type="hidden" class="form-control" name="topid" id="topid">
                                    <select class="form-control" id="user" name="user" data-style="select-with-transition">
                                        <option value="">Select User</option>
                                        <?php
                                        while($row=mysqli_fetch_assoc($get_users)){
                                        ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['username'];?></option>
                                        <?php
                                        }?>
                                        </select>

                                      <div class="form-group">
                                        <label for="topic" class="md-label">Topic</label>
                                        <input type="text" class="form-control" name="topic"  id="topic">
                                    </div>
                                </form>
                                </div>
                                <div class="card-footer ">

                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                      <button type="button" name="save" value="Save" class="btn btn-fill btn-primary" id="add_topic">Submit</button>
                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
