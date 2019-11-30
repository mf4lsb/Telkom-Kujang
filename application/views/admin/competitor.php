        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg">
            <?= form_error('competitor', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        
            <!-- success -->
            <?= $this->session->flashdata('message');?>
            <?php if($user['role_id'] == 1) : ?>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Competitor</a>
            <?php endif ?>
            <div class="table-responsive">
                <table class="table table-hover" id="competitor_table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Competitor Name</th>
                    <?php if($user['role_id'] == 1) : ?>
                        <th scope="col">Action</th>
                    <?php endif ?>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach ($competitor as $comp) : ?>
                    <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td class="table_competitor" data-row_id="<?= $comp['id']?>" data-column_name="competitor" contenteditable><?= $comp['competitor']; ?></td>
                    <?php if($user['role_id'] == 1) : ?>
                        <td>
                            <!-- <a href="" class="badge badge-success">Edit</a> -->
                            <a href="" class="badge badge-danger delete_competitor" data-row_id="<?= $comp['id']?>" data-toggle="modal" data-target="#deleteModal">Delete</a>
                        </td>
                    <?php endif ?>
                    </tr>
                <?php $i++; ?>
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
    <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newMenuModalLabel">Add New Competitor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url('admin/competitor'); ?>" method="post"> 
        <div class="modal-body">
           <div class="form-group">
                <input type="text" class="form-control" id="competitor" name="competitor" placeholder="Competitor Name">
            </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </form>
        </div>
    </div>
    </div>