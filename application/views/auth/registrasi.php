<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Create Account</h3>
                            </div>
                            <div class="card-body">
                                <form class="user" method="POST" action="<?= base_url('auth/registrasi'); ?>">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nama" value="<?= set_value('nama'); ?>" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <label for="inputNama">Nama</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?= set_value('email'); ?>" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <label for="inputEmail">Email address</label>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                                                <label for="inputPasswordConfirm">Confirm Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><button>Create Account</button></div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"> <a class="small" href="<?= base_url(); ?>auth">Sudah ada akun? Login!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>