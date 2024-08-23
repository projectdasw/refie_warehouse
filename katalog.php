<div class="container kanit-regular">
    <div class="row mt-3 mb-3">
        <div class="col-3 mt-2">
            <h5 class="kanit-medium">Katalog Produk</h5>
            <nav class="nav flex-column">
                <?php
                    $query = "select count(*) as total_barang, kategori from barang group by kategori";
                    $sql = mysqli_query($conn, $query);
                    
                    while($result = mysqli_fetch_assoc($sql)){
                        $cat = $result['kategori'];
                ?>
                    <a class="nav-link text-dark d-flex flex-row justify-content-between">
                        <span><?php echo $cat; ?></span>
                        <span class="badge text-bg-primary">
                            <?php echo $result['total_barang'] ?>
                        </span>
                    </a>
                <?php } ?>
            </nav>
        </div>
        <div class="col-9 mt-2">
            <h5 class="kanit-medium">Pencarian Barang</h5>
            <form method="post" class="d-flex flex-row justify-content-between">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" id="cari-produk"
                        name="cari-produk" placeholder="Cari Produk/Kategori Anda disini">
                    <button class="btn btn-primary" name="temukan-produk">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span>Temukan Produk</span>
                    </button>
                </div>
            </form>
            <?php
                if(isset($_POST['temukan-produk'])){    
                    $cari = $_POST['cari-produk'];
                    $_SESSION['hasil-cari-produk'] = $cari;
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span>
                        Hasil Pencarian Produk : <?php echo $cari; ?>
                    </span>
                    <button type="button" class="btn-close"
                    onclick="location.href='index.php?katalog=katalog.php'"></button>
                </div>
            <?php
                }
                session_destroy();
            ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
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
                    <div class="col">
                        <div class="card h-100">
                            <img src="gambar-barang/<?php echo $ft; ?>" class="card-img-top"
                                alt="image" lazy="true">
                            <div class="card-body">
                                <h5 class="card-title fs-6">
                                    <?php echo $nm; ?>
                                </h5>
                                <p class="card-text">
                                    Kategori : <?php echo $cat; ?>
                                    <br />
                                    Harga : Rp. <?php echo $hrg; ?>
                                </p>
                            </div>
                            <?php
                                if($jml < 10){
                            ?>
                                <div class="card-footer bg-warning">
                                    <small class="text-body-secondary">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        Segera Habis Tersisa <?php echo $jml; ?>
                                    </small>
                                </div>
                            <?php
                                }
                                else if($jml == 0){
                            ?>
                                <div class="card-footer bg-danger">
                                    <small class="text-white">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        Stok Telah Habis
                                    </small>
                                </div>
                            <?php
                                }
                                else{
                            ?>
                                <div class="card-footer bg-success">
                                    <small class="text-white">
                                        <i class="fa-solid fa-circle-check"></i>
                                        Stok Tersedia
                                    </small>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- <div class="product-cat kanit-regular">
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
</div> -->