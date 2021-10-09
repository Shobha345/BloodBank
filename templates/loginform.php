<?php
$pills = (!empty($pills) ? $pills : 'modal');
?>
<div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-light border-0 p-1"></div>
        <div class="modal-body p-0">
            <div class="container-fluid pt-1 pb-2 bg-light">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                        <h5 class="modal-title">Login</h5>
                    </div>
                    <div class="col">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-<?php echo $pills; ?>-hospitals-tab" data-toggle="pill" href="#pills-<?php echo $pills; ?>-hospitals" role="tab"
                                   aria-controls="pills-<?php echo $pills; ?>-hospitals" aria-selected="true">Hospitals</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-<?php echo $pills; ?>-receivers-tab" data-toggle="pill" href="#pills-<?php echo $pills; ?>-receivers" role="tab"
                                   aria-controls="pills-<?php echo $pills; ?>-receivers" aria-selected="false">User</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2 d-flex align-items-center justify-content-end">
                        <?php if ($pills === 'modal') { ?>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="tab-content px-3">
                <div class="tab-pane fade show active" id="pills-<?php echo $pills; ?>-hospitals" role="tabpanel">
                    <form action="/hospitalpage.php" class="login-form" method="post">
                        <label class="sr-only" for="hemail">Hospital E-Mail</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control" id="hemail" name="hemail" placeholder="Hospital E-Mail">
                        </div>

                        <label class="sr-only" for="hpassword">Hospital Password</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class="form-control" id="hpassword" name="hpassword" placeholder="Hospital Password">
                        </div>

                        <input type="submit" name="hlogin" value="Login" class="btn btn-primary btn-block mb-3">
                    </form>
                </div>

                <div class="tab-pane fade" id="pills-<?php echo $pills; ?>-receivers" role="tabpanel">
                    <form action="/userpage.php" class="login-form" method="post">
                        <label class="sr-only" for="remail">User E-Mail</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control" id="remail" name="remail" placeholder="User E-Mail">
                        </div>

                        <label class="sr-only" for="rpassword">User Password</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class="form-control" id="rpassword" name="rpassword" placeholder="User Password">
                        </div>

                        <input type="submit" name="rlogin" value="Login" class="btn btn-primary btn-block mb-3">
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-start">
            <nav class="nav flex-column flex-fill" style="box-shadow: none;">
                <a href="/lost-password.php" class="nav-link text-dark px-2 py-1"><span class="fas fa-key"></span> Password lost</a>
                <a href="/register.php" class="nav-link text-dark px-2 py-1"><span class="fas fa-plus-square"></span> Register</a>
            </nav>
        </div>
    </div>
</div>
