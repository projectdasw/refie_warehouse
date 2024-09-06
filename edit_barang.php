<?php
    $id = '';
    $nm = '';
    $ft = '';
    $cat = '';
    $knd = '';
    $jml = '';
    $hrg = '';

    if(isset($_GET['ubah_barang'])){
        $id = $_GET['ubah_barang'];

        $query = "select * from barang where id_barang = '$id'";
        $sql = mysqli_query($conn, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        $nm = $view_edit['nama_barang'];
        $ft = $view_edit['foto'];
        $cat = $view_edit['kategori'];
        $knd = $view_edit['kondisi'];
        $jml = $view_edit['jumlah'];
        $hrg = $view_edit['harga'];
    }
?>
<form method="POST" class="row g-3 needs-validation" action="inc/process.php" enctype="multipart/form-data"
    autocomplete="off" novalidate>
    <input type="hidden" name="id_barang" id="id_barang" value="<?php echo $id; ?>">
    <div class="col-3">
        <img src="gambar-barang/<?php echo $ft; ?>" class="w-100" alt="image" loading="lazy">
        <input type="file" class="form-control mt-2" name="foto" id="foto" accept="image/*">
        <figcaption style=" display: flex; flex-direction: column; color: #A9A9A9;">
            <cite style="font-size: 14px;">
                <strong>--</strong>
                Klik <strong>Pilih File</strong> untuk merubah Gambar
            </cite>
            <cite style="font-size: 14px;">
                <strong>--</strong>
                Jika tidak abaikan saja
            </cite>
        </figcaption>
    </div>
    <div class="col-9">
        <div class="row g-3">
            <div class="col-6">
                <label for="id_barang" class="form-label">ID Barang</label>
                <input type="text" class="form-control" name="id_barang" id="id_barang"
                    value="<?php echo $id; ?>" disabled>
            </div>
            <div class="col-6">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?php echo $nm; ?>">
            </div>
            <div class="col-6">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" name="kategori" id="kategori" value="<?php echo $cat; ?>">
                    <?php
                        $query = "select * from kategori";
                        $sql = mysqli_query($conn, $query);
            
                        while($result = mysqli_fetch_assoc($sql)){
                            $id_cat = $result['id_kategori'];
                            $nm_cat = $result['nama_kategori'];
                    ?>
                    <?php
                        if(isset($_GET['ubah_barang']) && $cat == $nm_cat){
                    ?>
                        <option value="<?php echo $cat?>" selected>
                            <?php echo $cat?>
                        </option>
                    <?php
                        } else {
                    ?>
                        <option value="<?php echo $nm_cat?>">
                            <?php echo $nm_cat?>
                        </option>
                    <?php
                        }
                    ?>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="col-6">
                <label for="kondisi" class="form-label">Kondisi</label>
                <select class="form-select" name="kondisi" id="kondisi" value="<?php echo $knd; ?>">
                    <?php
                        $query = "select * from kondisi";
                        $sql = mysqli_query($conn, $query);
            
                        while($result = mysqli_fetch_assoc($sql)){
                            $id_knd = $result['id_kondisi'];
                            $nm_knd = $result['nama_kondisi'];
                    ?>
                    <?php
                        if(isset($_GET['ubah_barang']) && $knd == $nm_knd){
                    ?>
                        <option value="<?php echo $knd?>" selected>
                            <?php echo $knd?>
                        </option>
                    <?php
                        } else {
                    ?>
                        <option value="<?php echo $nm_knd?>">
                            <?php echo $nm_knd?>
                        </option>
                    <?php
                        }
                    ?>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="col-6">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control bg-secondary-subtle" name="jumlah" id="jumlah" value="<?php echo $jml; ?>" readonly>
            </div>
            <div class="col-6">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control bg-secondary-subtle" name="harga" id="harga" value="<?php echo $hrg; ?>" oninput="formatUang(this)">
            </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-success" name="form_process" value="update_barang">
                <i class="fa-solid fa-pencil"></i>
                <span>Edit Data</span>
            </button>
        </div>
    </div>
</form>