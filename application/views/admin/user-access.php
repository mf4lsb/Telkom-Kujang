        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg-6">

        
            <!-- success -->
            <?= $this->session->flashdata('message');?>

            <h5>Role: <?= $name['name']; ?></h5>

            <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">STO</th>
                <th scope="col">Access</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach ($menu as $sto) : ?>
                <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $sto['nama_sto']; ?></td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" <?= user_access($name['id'], $sto['id']); ?> data-user="<?= $name['id']; ?>" data-sto="<?= $sto['id']; ?>" id="useraccess">
                    </div>
                </td>
                </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
            </tbody>
            </table>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->