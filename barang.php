<?php
    if(isset($_SESSION['sukses-ubah-barang'])){
?>
    <div id="alert-animation" class="alert-form">
        <h3><?php echo $_SESSION['sukses-ubah-barang']; ?></h3>
    </div>
<?php
    unset($_SESSION['sukses-ubah-barang']);
    } elseif(isset($_SESSION['sukses-hapus-barang'])){
?>
    <div id="alert-animation" class="alert-form">
        <h3><?php echo $_SESSION['sukses-hapus-barang']; ?></h3>
    </div>
<?php
    unset($_SESSION['sukses-hapus-barang']);
    }
?>
<div class="d-flex justify-content-end mb-3">
    <form method="post" class="needs-validation w-100" novalidate>
        <div class="input-group">
            <span class="input-group-text">Pencarian Barang</span>
            <input type="search" class="form-control" name="cari-barang"
                id="cari-barang" placeholder="Cari Barang/Kategori"
                aria-label="Cari Barang/Kategori"
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
    <div class="alert alert-success alert-dismissible fade show justify-content-between"
        role="alert">
        <span>
            Hasil Pencarian : <?php echo $cari; ?>
        </span>
        <button type="button" class="btn-close"
            onclick="location.href='dashboard.php?barang=barang.php'">
        </button>
    </div>
<?php
    }
?>
<div class="row row-cols-1 row-cols-md-2 g-4">
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
            $knd = $result['kondisi'];
            $jml = $result['jumlah'];
            $hrg = $result['harga'];
    ?>
        <div class="col">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="gambar-barang/<?php echo $ft; ?>" class="img-fluid rounded-start" alt="image"
                            loading="lazy">
                    </div>
                    <div class="col-md-8">
                        <?php
                            if($jml < 10){
                        ?>
                            <div class="card-footer bg-warning">
                                <small class="text-body-secondary">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    Segera Habis tersisa <?php echo $jml; ?>
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
                                    Stok Tersedia : <?php echo $jml; ?>
                                </small>
                            </div>
                        <?php } ?>
                        <div class="card-body py-2 px-4">
                            <h5 class="card-title">
                                <?php echo $nm; ?>
                            </h5>
                            <p class="card-text">
                                Kategori : <?php echo $cat; ?>
                                <br />
                                Kondisi : <?php echo $knd; ?>
                                <br />
                                Harga Jual : Rp. <?php echo $hrg; ?>
                            </p>
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="dashboard.php?edit-barang=edit_barang.php&ubah_barang=<?php echo $id; ?>"
                                    class="btn btn-success">
                                    <i class="fa-solid fa-pencil"></i>
                                    <span>Edit Data</span>
                                </a>
                                <a href="inc/process.php?hapus_barang=<?php echo $id; ?>" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin menghapus data dengan ID <?php echo $id; ?>?')">
                                    <i class="fa-solid fa-trash-can"></i>
                                    <span>Hapus</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
        mysqli_free_result($sql);
        mysqli_close($conn);
    ?>
</div>