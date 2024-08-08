<div class="product-cat kanit-regular">
    <div class="product-cat-container">
        <div class="product-cat-sidebar">
            <div class="product-cat-countlist">
                <strong class="cat-count-heading">Katalog Produk</strong>
                <ul class="cat-list">
                    <?php
                        $query = "select count(*) as total_barang, kategori from barang group by kategori";
                        $sql = mysqli_query($conn, $query);
                        
                        while($result = mysqli_fetch_assoc($sql)){
                            $cat = $result['kategori'];
                    ?>
                    <li>
                        <div class="cat-count">
                            <strong><?php echo $cat; ?></strong>
                            <strong><?php echo $result['total_barang'] ?></strong>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="product-cat-content">
            <h3>Pencarian Barang</h3>
            <form method="post" class="search-box-catProd">
                <input type="search" name="cari-produk"
                    id="cari-produk" placeholder="Cari Produk/Kategori Anda disini"
                    autocomplete="off" required>
                <button class="btn btn-primary" name="temukan-produk">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span>Temukan Produk</span>
                </button>
            </form>
            <?php
                if(isset($_POST['temukan-produk'])){    
                    $cari = $_POST['cari-produk'];
                    $_SESSION['hasil-cari-produk'] = $cari;
            ?>
                <div class="search-result" style="margin: 0 0 0.8em 0;">
                    <span>
                        Hasil Pencarian Produk : <?php echo $cari; ?>
                    </span>
                    <button class="btn btn-danger"
                        onclick="location.href='index.php?katalog=katalog.php'">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </button>
                </div>
            <?php
                }
                session_destroy();
            ?>
            <div class="product-cat-card-container">
                <?php
                    if(isset($_POST['temukan-produk'])){
                        $cari = $_POST['cari-produk'];
                        $query = "select * from barang where nama_barang like '%$cari%' or kategori like '%$cari%'";
                        $sql = mysqli_query($conn, $query);
                        $avail = mysqli_num_rows($sql);
                        if($avail == 0){
                            echo "<strong>Produk yang anda cari tidak ditemukan</strong>";
                        }
                    }
                    else{
                        $query = "select * from barang";
                        $sql = mysqli_query($conn, $query);
                    }
                    
                    while($result = mysqli_fetch_assoc($sql)){
                        $id = $result['id_barang'];
                        $nm = $result['nama_barang'];
                        $ft = $result['foto'];
                        $cat = $result['kategori'];
                        $knd = $result['kondisi'];
                        $jml = $result['jumlah'];
                        $hrg = $result['harga'];
                ?>
                <div class="product-cat-card">
                    <div class="product-cat-list" lazy="true">
                        <div class="latest-img">
                            <img src="gambar-barang/<?php echo $ft; ?>" alt="image" loading="lazy" />
                        </div>
                        <div class="product-cat-desc mt-3">
                            <h6 class="product-cat-name">
                                <?php echo $nm; ?>
                            </h6>
                            <strong class="product-cat-price">
                                <?php echo "Rp. ".$hrg; ?>
                            </strong>
                            <?php
                                if($jml < 10){
                            ?>
                                <span class="product-avail-items stock-warning">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    Segera Habis Tersisa <?php echo $jml; ?>
                                </span>
                            <?php
                                }
                                else if($jml == 0){
                            ?>
                                <span class="product-avail-items stock-danger">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    Stok Telah Habis
                                </span>
                            <?php
                                }
                                else{
                            ?>
                                <span class="product-avail-items stock-success">
                                    <i class="fa-solid fa-circle-check"></i>
                                    Stok Tersedia
                                </span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>