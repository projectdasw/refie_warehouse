<?php include_once("templates/header.php")?>
    <section class="landing-page">
        <div class="landing-page-content">
            <?php
                if(isset($_GET['katalog'])){
                    require_once "katalog.php";;
                }
                else if(isset($_GET['detail-barang'])){
                    require_once "detail-barang.php";;
                }
                else{
                    require_once "home.php";    
                }
            ?>
        </div>
    </section>
<?php include_once("templates/footer.php")?>