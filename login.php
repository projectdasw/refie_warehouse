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
    <form method="POST" action="inc/process.php" class="login-form" autocomplete="off">
        <fieldset>
            <img src="assets/img/logo/refie_logo.png" alt="REFIE Logo">
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
            <div class="form-content">
                <h2>LOGIN</h2>
                <div class="form-group">
                    <div class="icon-form">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="form-list">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Masukkan Username Anda" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="icon-form">
                        <i class="fa-solid fa-key"></i>
                    </div>
                    <div class="form-list">
                        <label for="password">Password</label>
                        <div class="showPass">
                            <input type="password" name="password" id="password" placeholder="Masukkan Password Anda" required>
                            <i class="fa-solid fa-eye" id="show-pass"></i>
                        </div>
                    </div>
                </div>
                <div class="button-group">
                    <button type="submit" name="form_process" value="login"
                        class="btn btn-success">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Masuk
                    </button>
                </div>
            </div>
        </fieldset>
    </form>
    <?php } ?>
<?php include_once("templates/footer_login.php")?>