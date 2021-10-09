<div class="container-fluid pt-1 pb-2 bg-light">
    <div class="row">
        <div class="col-2 d-flex align-items-center">
            <h5 class="modal-title">Login</h5>
        </div>
        <div class="col">
            <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-hospitals-tab" data-toggle="pill" href="#pills-hospitals" role="tab"
                       aria-controls="pills-hospitals" aria-selected="true">Hospitals</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-receivers-tab" data-toggle="pill" href="#pills-receivers" role="tab"
                       aria-controls="pills-receivers" aria-selected="false">User</a>
                </li>
            </ul>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-end">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>

<div class="tab-content px-3">
    <div class="tab-pane fade show active" id="pills-hospitals" role="tabpanel">
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
                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                </div>
                <input type="password" class="form-control" id="hpassword" name="hpassword" placeholder="Hospital Password">
            </div>

            <input type="submit" name="hlogin" value="Login" class="btn btn-primary btn-block mb-3">
        </form>
    </div>

    <div class="tab-pane fade" id="pills-receivers" role="tabpanel">
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
                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                </div>
                <input type="password" class="form-control" id="rpassword" name="rpassword" placeholder="User Password">
            </div>

            <input type="submit" name="rlogin" value="Login" class="btn btn-primary btn-block mb-3">
        </form>
    </div>
</div>

<div class="text-center px-3">
    <a href="/register.php" class="btn btn-outline-secondary btn-sm mb-3" title="Click here">Don't have account?</a>
</div>
