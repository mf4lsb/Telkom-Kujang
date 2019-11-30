        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg">
            <?= form_error('sto', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('kode', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('datel', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <!-- success -->
            <?= $this->session->flashdata('message');?>
            <?php if($user['role_id'] == 1) : ?>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah STO</a>
            <?php endif ?>                
                <div class="table-responsive">
                    <table class="table table-hover" id="sto_table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">STO</th>
                        <th scope="col">Kode STO</th>
                        <!-- <th scope="col">Datel</th> -->
                        <?php if($user['role_id'] == 1) : ?>
                            <th scope="col">Action</th>
                        <?php endif ?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($getDatel as $gd) : ?>
                        <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td class="table_sto" data-row_id="<?= $gd['id']?>" data-column_name="nama_sto" contenteditable><?= $gd['nama_sto']; ?></td>
                        <td class="table_sto" data-row_id="<?= $gd['id']?>" data-column_name="kode_sto" contenteditable><?= $gd['kode_sto']; ?></td>
                        <!-- <td><?php //echo $gd['nama_datel']; ?></td> -->
                        <?php if($user['role_id'] == 1) : ?>
                            <td>
                                <!-- <a href="" class="badge badge-success">Edit</a> -->
                                <a href="" class="badge badge-danger delete_sto" data-row_id="<?= $gd['id']?>" data-toggle="modal" data-target="#deleteModal">Delete</a>
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
    <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newSubMenuModalLabel">Tambah STO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url('asman/sto'); ?>" method="post"> 
        <div class="modal-body">
           <div class="form-group">
                <input type="text" class="form-control" id="sto" name="sto" placeholder="Nama STO">
            </div> 
           <div class="form-group">
                <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode STO">
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