<div class="data-list">
    <div class="data-card">
        <div class="data-card-body">
            <div class="count-item">
                <?php
                    $query = "select count(*) as total from barang";
                    $sql = mysqli_query($conn, $query);
                    $countdata = mysqli_fetch_assoc($sql);
                    echo "<span class='number'>$countdata[total]</span>";
                ?>
                <span class="classify">Barang</span>
            </div>
            <i class="fa-solid fa-shirt"></i>
        </div>
        <div class="data-card-footer">
            <button class="data-lookup" onclick="location.href='dashboard.php?barang=barang.php'">
                <span>Lihat Data Barang</span>
                <i class="fa-solid fa-circle-arrow-right"></i>
            </button>
        </div>
    </div>
    <div class="data-card">
        <div class="data-card-body">
            <div class="count-item">
                <?php
                    $query = "select count(*) as total from kategori";
                    $sql = mysqli_query($conn, $query);
                    $countdata = mysqli_fetch_assoc($sql);
                    echo "<span class='number'>$countdata[total]</span>";
                ?>
                <span class="classify">Kategori</span>
            </div>
            <i class="fa-solid fa-list"></i>
        </div>
        <div class="data-card-footer">
            <button class="data-lookup" onclick="location.href='dashboard.php?kategori=kategori.php'">
                <span>Lihat Data Kategori</span>
                <i class="fa-solid fa-circle-arrow-right"></i>
            </button>
        </div>
    </div>
    <div class="data-card">
        <div class="data-card-body">
            <div class="count-item">
                <?php
                    $query = "select count(*) as total from barang_masuk";
                    $sql = mysqli_query($conn, $query);
                    $countdata = mysqli_fetch_assoc($sql);
                    echo "<span class='number'>$countdata[total]</span>";
                ?>
                <span class="classify">Barang Masuk</span>
            </div>
            <i class="fa-solid fa-boxes-stacked"></i>
        </div>
        <div class="data-card-footer">
            <button class="data-lookup" onclick="location.href='dashboard.php?barang_masuk=barang_masuk.php'">
                <span>Lihat Data Barang Masuk</span>
                <i class="fa-solid fa-circle-arrow-right"></i>
            </button>
        </div>
    </div>
    <div class="data-card">
        <div class="data-card-body">
            <div class="count-item">
                <?php
                    $query = "select count(*) as total from barang_keluar";
                    $sql = mysqli_query($conn, $query);
                    $countdata = mysqli_fetch_assoc($sql);
                    echo "<span class='number'>$countdata[total]</span>";
                ?>
                <span class="classify">Barang Keluar</span>
            </div>
            <i class="fa-solid fa-truck-fast"></i>
        </div>
        <div class="data-card-footer">
            <button class="data-lookup" onclick="location.href='dashboard.php?barang_keluar=barang_keluar.php'">
                <span>Lihat Data Barang Keluar</span>
                <i class="fa-solid fa-circle-arrow-right"></i>
            </button>
        </div>
    </div>
</div>
<div class="display-product">
    <div class="product-header">
        <figcaption>
            <h4>Daftar Produk</h4>
            <cite>
                REFIE SPORT & FASHION
            </cite>
        </figcaption>
            <form method="post" class="search-box">
                <input type="search" name="cari-barang"
                    id="cari-barang" placeholder="Cari Produk/Cari Kategori"
                    autocomplete="off" required>
                <button class="btn btn-primary" name="cari"
                    style="width: 35%; font-size: 0.8em; margin: 0 0 0 0.5em;">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span>Cari</span>
                </button>
            </form>
        </div>
    </div>
    <div class="product-body">
        <?php
            if(isset($_POST['cari'])){    
                $cari = $_POST['cari-barang'];
                $_SESSION['hasil-cari-barang'] = $cari;
        ?>
        <div class="search-result">
            <span>
                Hasil Pencarian : <?php echo $cari; ?>
            </span>
            <button class="btn btn-danger"
                onclick="location.href='dashboard.php'">
                <i class="fa-solid fa-circle-xmark"></i>
            </button>
        </div>
        <?php
            }
        ?>
        <div class="product-list">
            <?php
                if(isset($_POST['cari'])){
                    $cari = $_POST['cari-barang'];
                    $query = "select * from barang where nama_barang like '%$cari%' or kategori like '%$cari%'";
                }
                else{
                    $query = "select * from barang";
                }

                $sql = mysqli_query($conn, $query);

                while($result = mysqli_fetch_assoc($sql)){
                    $id = $result['id_barang'];
                    $nm = $result['nama_barang'];
                    $ft = $result['foto'];
                    $cat = $result['kategori'];
                    $jml = $result['jumlah'];
                    $hrg = $result['harga'];
            ?>
            <div class="product-card">
                <div class="product-title">
                    <h5><?php echo $nm; ?></h5>
                    <cite>Kategori : <?php echo $cat; ?></cite>
                </div>
                <div class="product-img">
                    <img src="gambar-barang/<?php echo $ft; ?>">
                </div>
                <div class="product-price">
                <div class="product-price">
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
                    <h3>Harga : Rp. <?php echo $hrg; ?></h3>
                </div>
            </div>
        </div>
        <?php
            }
            mysqli_free_result($sql);
            mysqli_close($conn);
        ?>
    </div>
</div>