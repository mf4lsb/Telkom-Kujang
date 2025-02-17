        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg">
            <?php if(validation_errors()) : ?>
                <div class="alert alert-danger pb-0" role="alert">
                <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
        
            <!-- success -->
            <?= $this->session->flashdata('message');?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Sub Menu</a>
                <div class="table-responsive">
                    <table class="table table-hover" id="submenu_table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title Sub Menu</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td class="table_sub_menu" data-row_id="<?= $sm['id']?>" data-column_name="title" contenteditable><?= $sm['title']; ?></td>
                        <td><?= $sm['menu']; ?></td>
                        <td><?= $sm['url']; ?></td>
                        <td class="table_sub_menu" data-row_id="<?= $sm['id']?>" data-column_name="icon" contenteditable><?= $sm['icon']; ?></td>
                        <td class="table_sub_menu" data-row_id="<?= $sm['id']?>" data-column_name="is_active" contenteditable><?= $sm['is_active']; ?></td>
                        <td>
                            <!-- <a href="" class="badge badge-success">Edit</a> -->
                            <a href="" class="badge badge-danger delete_sub_menu" data-row_id="<?= $sm['id']?>" data-toggle="modal" data-target="#deleteModal">Delete</a>
                        </td>
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
            <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url('menu/submenu'); ?>" method="post"> 
        <div class="modal-body">
           <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu Name">
            </div> 
            <div class="form-group">
                <select name="menu_id" id="menu_id" class="form-control">
                    <option value="">Select Menu</option>
                    <?php foreach($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="url" name="url" placeholder="Sub Menu URL">
            </div> 
            <div class="form-group">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Sub Menu Icon">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                    <label for="is_active" class="form-check-label">
                        Active?
                    </label>
                </div>
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