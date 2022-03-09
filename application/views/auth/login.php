<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>
                            <div class="card-body">
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="POST" action="<?= base_url('Auth'); ?>">
                                    <div class="form-floating mb-3">


                                        <input type="text" class="form-control form-control-user" value="<?= set_value('email'); ?>" id="email" name="email" placeholder="Masukkan Alamat Email..." </div>
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <label for="inputEmail">Email address</label>
                                    </div>
                                    <div class="form-floating mb-3">


                                        <input type="password" class="form-control form-control-user" value="<?= set_value('password'); ?>" name="password" id="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <label for="inputPassword">Password</label>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                        <button class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"> <a class="small" href="<?= base_url(); ?>auth/registrasi">Need an account? Sign up!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>