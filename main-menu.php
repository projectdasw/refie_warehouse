<div class="row row-cols-1 row-cols-md-2 g-4 mb-4">
    <div class="col w-25">
        <div class="card text-light" style="background-color: var(--colorcard1);">
            <div class="card-body d-flex flex-row justify-content-between">
                <div>
                    <h3 class="mb-2">
                        <?php
                            $query = "select count(*) as total from barang";
                            $sql = mysqli_query($conn, $query);
                            $countdata = mysqli_fetch_assoc($sql);
                            echo "<span class='number'>$countdata[total]</span>";
                        ?>
                    </h3>
                    <h5 class="card-title">Barang</h5>
                    <p class="card-text">
                        Data Master Barang
                    </p>
                    <a class="btn btn-sm btn-primary" href="dashboard.php?barang=barang.php">
                        <span>Lihat Data</span>
                        <i class="fa-solid fa-circle-arrow-right ms-2"></i>
                    </a>
                </div>
                <div>
                    <i class="fa-solid fa-shirt" style="font-size: 3em;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col w-25">
        <div class="card text-light" style="background-color: var(--colorcard2);">
            <div class="card-body d-flex flex-row justify-content-between">
                <div>
                    <h3 class="mb-2">
                    <?php
                        $query = "select count(*) as total from kategori";
                        $sql = mysqli_query($conn, $query);
                        $countdata = mysqli_fetch_assoc($sql);
                        echo "<span class='number'>$countdata[total]</span>";
                    ?>
                    </h3>
                    <h5 class="card-title">Kategori</h5>
                    <p class="card-text">
                        Data Kategori Barang
                    </p>
                    <a class="btn btn-sm btn-primary" href="dashboard.php?kategori=kategori.php">
                        <span>Lihat Data</span>
                        <i class="fa-solid fa-circle-arrow-right ms-2"></i>
                    </a>
                </div>
                <div>
                    <i class="fa-solid fa-list" style="font-size: 3em;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col w-25">
        <div class="card text-light" style="background-color: var(--colorcard1);">
            <div class="card-body d-flex flex-row justify-content-between">
                <div>
                    <h3 class="mb-2">
                    <?php
                        $query = "select count(*) as total from barang_masuk";
                        $sql = mysqli_query($conn, $query);
                        $countdata = mysqli_fetch_assoc($sql);
                        echo "<span class='number'>$countdata[total]</span>";
                    ?>
                    </h3>
                    <h5 class="card-title">Barang Masuk</h5>
                    <p class="card-text">
                        Data Barang Masuk
                    </p>
                    <a class="btn btn-sm btn-primary" href="dashboard.php?barang_masuk=barang_masuk.php">
                        <span>Lihat Data</span>
                        <i class="fa-solid fa-circle-arrow-right ms-2"></i>
                    </a>
                </div>
                <div>
                    <i class="fa-solid fa-boxes-stacked" style="font-size: 3em;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col w-25">
        <div class="card text-light" style="background-color: var(--colorcard2);">
            <div class="card-body d-flex flex-row justify-content-between">
                <div>
                    <h3 class="mb-2">
                    <?php
                        $query = "select count(*) as total from barang_keluar";
                        $sql = mysqli_query($conn, $query);
                        $countdata = mysqli_fetch_assoc($sql);
                        echo "<span class='number'>$countdata[total]</span>";
                    ?>
                    </h3>
                    <h5 class="card-title">Barang Keluar</h5>
                    <p class="card-text">
                        Data Barang Keluar
                    </p>
                    <a class="btn btn-sm btn-primary" href="dashboard.php?barang_keluar=barang_keluar.php">
                        <span>Lihat Data</span>
                        <i class="fa-solid fa-circle-arrow-right ms-2"></i>
                    </a>
                </div>
                <div>
                    <i class="fa-solid fa-truck-fast" style="font-size: 3em;"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex flex-row justify-content-between align-items-center p-3 rounded-3"
    style="background-color: #f7f7f7;">
    <div>
        <h4 class="m-0">Daftar Produk</h4>
        <span class="fs-5 fst-italic">
            REFIE Sport & Fashion
        </span>
    </div>
    <form method="post" class="needs-validation" novalidate>
        <div class="input-group">
            <input type="search" class="form-control" name="cari-barang"
                    id="cari-barang" placeholder="Cari Produk/Cari Kategori"
                    aria-label="Cari Produk/Cari Kategori"
                    autocomplete="off" required>
            <button class="btn btn-outline-primary" name="cari">
                <i class="fa-solid fa-magnifying-glass"></i>
                <span>Cari</span>
            </button>
            <div class="invalid-feedback">
                Harap isi kotak pencarian ini
            </div>
        </div>
    </form>
</div>
<?php
    if(isset($_POST['cari'])){    
        $cari = $_POST['cari-barang'];
        $_SESSION['hasil-cari-barang'] = $cari;
?>
    <div class="alert alert-success alert-dismissible fade show justify-content-between mt-3 mb-0"
        role="alert">
        <strong>
            Hasil Pencarian : <?php echo $cari; ?>
        </strong>
        <button type="button" class="btn-close"
            onclick="location.href='dashboard.php'">
        </button>
    </div>
<?php
    }
?>
<div class="row row-cols-1 row-cols-md-5 g-4 py-3">
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
            $nm = $result['nama_barang'];
            $ft = $result['foto'];
            $cat = $result['kategori'];
            $jml = $result['jumlah'];
            $hrg = $result['harga'];
    ?>
    <div class="col">
        <div class="card h-100">
            <img src="gambar-barang/<?php echo $ft; ?>" class="card-img-top" alt="image" loading="lazy">
            <div class="card-body">
                <h6 class="card-title">
                    <?php echo $nm; ?>
                </h6>
                <p class="card-text">
                    Kategori : <?php echo $cat; ?>
                    <br />
                    Rp. <?php echo $hrg; ?>
                </p>
            </div>
            <?php
                if($jml < 10){
            ?>
                <div class="card-footer text-bg-warning">
                    <small>
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Segera Habis Tersisa <?php echo $jml; ?>
                    </small>
                </div>
            <?php
                }
                else if($jml == 0){
            ?>
                <div class="card-footer text-bg-danger">
                    <small>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        Stok Telah Habis
                    </small>
                </div>
            <?php
                }
                else{
            ?>
                <div class="card-footer text-bg-success">
                    <small>
                        <i class="fa-solid fa-circle-check"></i>
                        Stok Tersedia
                    </small>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</div>