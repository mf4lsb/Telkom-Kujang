  <div class="container card-auto-center animate">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6 col-sm-10 mx-auto">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="pl-4 pr-4 pt-3 pb-4">
                  <div class="text-center">
                  <img src="<?= base_url('assets/'); ?>img/telkomindo.png" alt="" class="col-md-8 offset-sm-1 mb-2 animate">
                  </div>

                  <?= $this->session->flashdata('message'); ?>

                  <form class="user" method="post" action="<?= base_url('auth'); ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
                      <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                      <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block animate">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a href="<?= base_url('auth/registration'); ?>" class="small">Create an Account</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>