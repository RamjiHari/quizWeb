<?php
session_start();
include "./db/db_config.php";
$get_users=mysqli_query($con,"SELECT * FROM `quizz_admin`");
?>
<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-primary">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title ">Persons</h4>
                    <button class="btn btn-white float-right userModal">Create</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <th>ID</th>
                          <th>UserName</th>
                          <th>Password</th>
                          <th>edit</th>
                          <th>delete</th>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
while($row=mysqli_fetch_assoc($get_users)){

    ?>
            <tr>
                  <td><?php echo $i;?></td>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['password'];?></td>
                <td>
                 <a class="edit_user userModal" id="<?php echo $row['id']?>">Edit</a>
                </td>
                <td>
                <a class="delete_user" id="<?php echo $row['id']?>">Delete</a>
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
             <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Create User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          <i class="material-icons">clear</i>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="col-md-12">
                            <div class="card ">

                                <div class="card-body ">
                                <form method="#" action="#" autocomplete="off"  id="saveUserForm">
                                    <div class="form-group">
                                    <label for="username" class="md-label">Username</label>
                                    <input type="hidden" class="form-control" name="userid" id="userid">
                                    <input type="text" class="form-control" name="username"  id="username">
                                    </div>
                                    <div class="form-group">
                                    <label for="password" class="md-label">Password</label>
                                    <input type="text" class="form-control" name="password"  id="password">
                                    </div>
                                </form>
                                </div>
                                <div class="card-footer ">

                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                      <button type="button" name="save" value="Save" class="btn btn-fill btn-primary" id="add_user">Submit</button>
                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
