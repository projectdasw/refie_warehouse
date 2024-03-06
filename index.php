<?php include_once("templates/header.php")?>
    <section class="landing-page">
        <nav class="nav-page" id="sticky-nav">
            <div class="logo">
                <img src="assets/img/logo/refie_logo.png" alt="REFIE Sport Fashion" />
                <p>
                    <strong style="font-size: 20px;">REFIE</strong>
                    <br>
                    <strong>SPORT FASHION</strong>
                </p>
            </div>
            <ul>
                <li>
                    <a href="../warehouse_apps/">
                        <i class="fa-solid fa-house"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?katalog=katalog.php">
                        <i class="fa-solid fa-layer-group"></i>
                        <span>Katalog</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="landing-page-content">
            <?php
                if(isset($_GET['katalog'])){
                    require_once "katalog.php";;
                }
                else{
                    require_once "home.php";    
                }
            ?>
        </div>
    </section>
<?php include_once("templates/footer.php")?>