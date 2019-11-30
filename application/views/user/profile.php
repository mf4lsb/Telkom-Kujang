        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-md">
              <?= $this->session->flashdata('message'); ?>
            </div>
          </div>

          <div class="card" style="width: 18rem;">
            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= $profile['name'];?></h5>
                <p class="card-text"><?= $profile['role']; ?></p>
                <p class="card-text"><small class="text-muted">Dibuat akun pada <?= date('d F Y G:i', $profile['date_created']);?></small></p>
                <div class="row justify-content-around">
                <a href="<?= base_url('user/editprofile'); ?>" class="btn btn-primary btn-sm col-sm-5">Edit Profile</a>
                <a href="<?= base_url('user/changepassword'); ?>" class="btn btn-info btn-sm col-sm-6">Change Password</a>
                </div>
            </div>
        </div>     

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
