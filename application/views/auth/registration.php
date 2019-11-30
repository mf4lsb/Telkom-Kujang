  <div class="container">
    <div class="col-sm-10 col-lg-6 mx-auto">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="pl-4 pr-4 pt-3 pb-4">
              <div class="text-center">
                <img src="<?= base_url('assets/'); ?>img/telkomindo.png" alt="" class="col-md-8 offset-sm-1 mb-2">
              </div>
              <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="fullname" name="fullname"
                    placeholder="Full Name" value="<?= set_value('fullname'); ?>">
                    <?= form_error('fullname', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="username" class="form-control form-control-user" id="username" name="username"
                    placeholder="Username" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1"
                      placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2"
                      placeholder="Repeat Password">
                  </div>
                  <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>