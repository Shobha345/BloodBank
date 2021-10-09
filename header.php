<nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="image/icon.png" width="60" height="35" class="rounded-circle"> 
            Blood Bank Management System</a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><i class="fas fa-align-left"></i></span>
          </button>

          <div class="collapse navbar-collapse" id="collapsibleNavbar">

        <?php if (isset($_SESSION['hid'])) { ?>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link btn btn-light" href="hospitalpage.html">HOME</a>
            </li>
           

        </ul>
        <?php } elseif (isset($_SESSION['rid'])) { ?>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link btn btn-light" href="Userpage.html">HOME</a>
            </li>
           

        </ul>
        <?php }  else { ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link btn btn-light" href="/login.php" data-toggle="modal" data-target="#loginModal">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-light" href="/register.php">Register</a>
            </li>
        </ul>

        <?php } ?>
       </div>
    </div>
</nav>