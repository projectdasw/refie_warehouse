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
<div style="--swiper-navigation-color: #5D3587;" class="view-product swiper">
    <div class="cover-bg" style="
        background-image: url(assets/img/athlete-urban-environment.jpg);">
    </div>
    <div class="view-product-container swiper-wrapper">
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
            <div class="view-product-slide swiper-slide" lazy="true">
                <div class="view-product-content">
                    <div class="view-img">
                        <img src="gambar-barang/<?php echo $ft; ?>" alt="image" loading="lazy" />
                    </div>
                    <div class="view-desc">
                        <h2 class="title">
                            <?php echo $nm; ?>
                        </h2>
                        <p class="text">
                            <?php echo "Rp. "." ".$hrg; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<div class="latest-product">
    <div class="latest-heading">
        <h3>REFIE Sport Fashion - Barang Terbaru</h3>
    </div>
    <div class="latest-container swiper">
        <div class="latest-list swiper-wrapper">
            <?php
                $query = "select * from barang";
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
            <div class="latest-card swiper-slide" lazy="true">
                <div class="latest-img">
                    <img src="gambar-barang/<?php echo $ft; ?>" alt="image" loading="lazy" />
                </div>
                <div class="latest-desc">
                    <h2 class="latest-name">
                        <?php echo $nm; ?>
                    </h2>
                    <strong class="latest-price">
                        <?php echo "Rp. "." ".$hrg; ?>
                    </strong>
                </div>
            </div>
            <?php }?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<div class="view-category">
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
</div>