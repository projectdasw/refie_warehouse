<div class="pop-up-brands" id="pop-up">
    <button class="pop-up-close" onclick="close_pop_up()">
        <i class="fa-solid fa-circle-xmark"></i>
        <span>Tutup</span>
    </button>
    <div class="pop-up-content swiper">
        <div class="pop-up-card-container swiper-wrapper">
            <?php
                $query = "select * from barang order by RAND() limit 8";
                $sql = mysqli_query($conn, $query);

                while($result = mysqli_fetch_assoc($sql)){
                    $id = $result['id_barang'];
                    $nm = $result['nama_barang'];
                    $ft = $result['foto'];
                    $cat = $result['kategori'];
                    $knd = $result['kondisi'];
                    $jml = $result['jumlah'];
                    $hrg = $result['harga'];
            ?>
                <div class="pop-up-card swiper-slide" lazy="true">
                    <div class="pop-up-card-img">
                        <img src="gambar-barang/<?php echo $ft; ?>" alt="image" loading="lazy" />
                    </div>
                    <div class="pop-up-card-content">
                        <h1 class="title">
                            <?php echo $nm; ?>
                        </h1>
                        <h2 class="price">
                            <?php echo "Rp. ".$hrg; ?>
                        </h2>
                        <div class="offer">
                            <h3>Dapatkan Sekarang Juga!</h3>
                            <span>atau</span>
                            <a href="index.php?katalog=katalog.php">
                                <span>Lihat Katalog Kami</span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="container-fluid p-5 main-slide swiper">
    <div class="cover-bg" style="
        background-image: url(assets/img/athlete-urban-environment.jpg);">
    </div>
    <div class="container swiper-wrapper">
        <?php
            $query = "select * from barang order by RAND() limit 8";
            $sql = mysqli_query($conn, $query);

            while($result = mysqli_fetch_assoc($sql)){
                $nm = $result['nama_barang'];
                $ft = $result['foto'];
                $cat = $result['kategori'];
                $hrg = $result['harga'];
        ?>
            <img src="gambar-barang/<?php echo $ft; ?>"
                class="img-fluid swiper-slide" alt="image"
                lazy="true" style="width: 40%;">
        <?php } ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<div class="container-fluid p-0">
    <div class="card new-product border border-0 py-3 swiper">
        <div class="card-header">
            <h3 class="kanit-semibold">
                REFIE Sport & Fashion - Barang Terbaru
            </h3>
        </div>
        <div class="card-body swiper-wrapper">
            <?php
                $query = "select * from barang order by RAND() limit 8";
                $sql = mysqli_query($conn, $query);

                while($result = mysqli_fetch_assoc($sql)){
                    $nm = $result['nama_barang'];
                    $ft = $result['foto'];
                    $cat = $result['kategori'];
                    $hrg = $result['harga'];
            ?>
                <div class="card swiper-slide">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="gambar-barang/<?php echo $ft; ?>"
                            class="img-fluid rounded-start" alt="image" lazy="true">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title kanit-medium">
                                    <?php echo $nm; ?>
                                </h5>
                                <p class="kanit-regular">
                                    Kategori : <?php echo $cat; ?>
                                    <br />
                                    Harga : <?php echo $hrg; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<div class="container-fluid category-slide p-0 mt-3 mb-3 swiper">
    <div class="container-fluid swiper-wrapper">
        <?php
            $query = "select * from kategori";
            $sql = mysqli_query($conn, $query);

            while($result = mysqli_fetch_assoc($sql)){
                $id = $result['id_kategori'];
                $nm = $result['nama_kategori'];
        ?>
            <div class="card text-bg-dark w-25 border-0 swiper-slide">
                <img src="assets/img/card-cat-bg.jpg" class="card-img" alt="image" lazy="true">
                <div class="card-img-overlay text-dark">
                    <img src="assets/img/logo/refie_logo.png"
                    class="img-fluid rounded-start w-25
                        shadow-lg bg-body-tertiary rounded-circle" alt="image" lazy="true">
                    <h1 class="card-title text-center kanit-semibold">
                        <?php echo $nm; ?>
                    </h1>
                    <p class="card-text text-center">
                        <button class="btn btn-primary" onclick="location.href='index.php?katalog=katalog.php'">
                            <i class="fa-solid fa-boxes-stacked"></i>
                            Lihat Katalog
                        </button>
                    </p>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-pagination"></div>
</div>
<!-- <div class="view-category">
    <div class="view-category-bg">
        <img src="assets/img/young-man-is-jumping-parkour-urban-space-sporting-activity.jpg" alt="image">
    </div>
    <div class="view-category-container swiper"
        style="--swiper-pagination-color: #fff;">
        <div class="view-category-list swiper-wrapper">
            <?php
                $query = "select * from kategori";
                $sql = mysqli_query($conn, $query);

                while($result = mysqli_fetch_assoc($sql)){
                    $id = $result['id_kategori'];
                    $nm = $result['nama_kategori'];
            ?>
            <div class="card-cat swiper-slide">
                <div class="card-cat-img">
                    <img src="assets/img/logo/refie_logo.png" alt="image">
                </div>
                <div class="card-cat-desc">
                    <h2><?php echo $nm; ?></h2>
                    <button class="btn" onclick="location.href='index.php?katalog=katalog.php'">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        Lihat Katalog
                    </button>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
    </div>
</div> -->