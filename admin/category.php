<?php
session_start();
include "./db/db_config.php";
$userId=$_SESSION['user_id'];
$get_catg=mysqli_query($con,"SELECT * FROM `quizz_categories` where catg_createdby='$userId'");
?>
<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-primary">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title ">Category</h4>
                    <button class="btn btn-white float-right categoryModal">Create</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <th>ID</th>
                          <th>Category</th>
                          <th>Edit</th>
                         <th>Delete</th>
                        </thead>
                        <tbody>
                        <?php
                         $i=1;
while($row=mysqli_fetch_assoc($get_catg)){
    ?>
            <tr>
                  <td><?php echo $i;?></td>
                <td><?php echo $row['catg_name'];?></td>
                <td>
                 <a class="edit_category categoryModal" data-toggle="modal" data-target="#categoryModal" id="<?php echo $row['catg_id']?>">Edit</a>
                </td>
                <td>
                <a class="delete_category" id="<?php echo $row['catg_id']?>">Delete</a>
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
             <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Create Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          <i class="material-icons">clear</i>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="col-md-12">
                            <div class="card ">

                                <div class="card-body ">
                                <form method="#" action="#" autocomplete="off" id="saveCategoryForm">
                                <input type="hidden" class="form-control" name="catgid" id="catgid">
                                      <div class="form-group">
                                        <label for="category" class="md-label">Category</label>
                                        <input type="text" class="form-control" name="category"  id="category">
                                    </div>
                                </form>
                                </div>
                                <div class="card-footer ">

                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                      <button type="button" name="save" value="Save" class="btn btn-fill btn-primary" id="add_category">Submit</button>
                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
