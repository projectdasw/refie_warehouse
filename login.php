<?php
    session_start();
    require_once "inc/connect.php";
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
    {
        echo "<script type='text/javascript'>
        alert('SILAKAN LOGOUT TERLEBIH DAHULU!')
        window.location='dashboard.php';
        </script>";
    }
    else{
?>
<?php include_once("templates/header_login.php")?>
    <div class="container-fluid d-flex justify-content-center align-items-center"
        style="height: 100vh; background-color: var(--colorbase)">
        <form method="POST" action="inc/process.php"
            class="card w-50 bg-dark text-white p-3 shadow-lg rounded kanit-regular" autocomplete="off">
            <div class="row g-0">
                <div class="col-md-4 m-auto">
                    <img src="assets/img/logo/refie_logo.png" class="img-fluid rounded-start m-auto" alt="image" loading="lazy">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <?php
                            if(isset($_SESSION['login-message'])){
                        ?>
                            <div class="login-message">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <?php echo $_SESSION['login-message']; ?>
                            </div>
                        <?php
                            }
                            session_destroy();
                        ?>
                        <h5 class="card-title">LOGIN</h5>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="username">
                                <i class="fa-solid fa-id-card-clip"></i>
                            </span>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Masukkan Username Anda" aria-label="Username" aria-describedby="username">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-key"></i>
                            </span>
                            <input type="password" class="form-control" id="password" name="password"
                                aria-label="Password" placeholder="Masukkan Password Anda">
                            <span class="input-group-text">
                                <i class="fa-solid fa-eye" id="show-pass"></i>
                            </span>
                        </div>
                        <button type="submit" name="form_process" value="login"
                            class="btn btn-success">
                            <i class="fa-solid fa-right-to-bracket me-1"></i>
                            Masuk
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php } ?>
<?php include_once("templates/footer_login.php")?>