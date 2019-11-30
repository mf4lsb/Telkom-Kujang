        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg">
            <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
        
            <!-- success -->
            <?= $this->session->flashdata('message');?>
            <div class="table-responsive">
              <table class="table table-hover" id="user_table">
              <thead>
                  <tr>
                  <th scope="col">#</th>
                  <th scope="col"></th>
                  <th scope="col">Nama</th>
                  <th scope="col">Role</th>
                  <th scope="col"></th>
                  <th scope="col">Active</th>
                  <th scope="col">Date Created</th>
                  <th scope="col"></th>
                  </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach ($gr as $g) : ?>
              <?php if($g['role'] != 'Admin') : ?>
                  <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td>
                    <img src="<?= base_url('assets/img/profile/') . $g['image']; ?>" alt="" class="img-thumbnail" width="50px" height="50px">
                  </td>
                  <td><?= $g['name']; ?></td>
                  <td><?= $g['role']; ?></td>
                  <!-- <td><a href="<?php //echo base_url('admin/edituser/') . $g['id']; ?>" class="badge badge-success" data-toggle="modal" data-target="#editModal">Edit Role</a></td> -->
                  <td><a href="" class="badge badge-success update_role" id="<?=$g['id'];?>" data-toggle="modal" data-target="#editModal">Edit Role</a></td>
                  <td>
                      <input class="form-check-input" type="checkbox" <?= check_access_role($g['username']); ?> data-username="<?= $g['username']; ?>" data-active="<?= $g['is_active']; ?>" id="roleuser">
                  </td>
                  <td>
                      <?= date('d F Y', $g['date_created']);?>
                  </td>
                  <td>
                  <?php if($g['is_active'] != 0 && $g['role_id'] != 4) :?>
                      <a href="<?= base_url('admin/useraccess/') . $g['id']; ?>" class="badge badge-warning">Access</a>
                  <?php endif; ?>
                      <!-- <a href="" class="badge badge-danger">Delete</a> -->
                      <a href="" class="badge badge-danger delete_user" data-row_id="<?= $g['id']?>" data-toggle="modal" data-target="#deleteModal">Delete</a>
                  </td>
                  </tr>
              <?php $i++; ?>
              <?php endif; ?>
              <?php endforeach; ?>
              </tbody>
              </table>
            </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Role</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- <form action="<?php //echo base_url('admin/edituser/') . $g['id']; ?>" method="post"> -->
            <form method="method" id="role_form">
            <div class="modal-body">
            <div class="form-group">
              <select name="role_id" id="role_id" class="form-control">
                      <?php foreach($user_role as $ur) : ?>
                      <option value="<?= $ur['id']; ?>"><?= $ur['role']; ?></option>
                      <?php endforeach ?>
              </select>
            </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="user_id" id="user_id"/>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>