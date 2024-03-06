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
<div class="dashboard-form">
    <form method="POST" action="inc/process.php" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="id_barang" id="id_barang" value="<?php echo $id; ?>">
        <div class="dashboard-form-list">
            <label for="id_barang">ID Barang</label>
            <?php
                $word = "REF-";
                $number = random_int(100, 999);
                $auto_no = $word . sprintf("%03s", $number);
                if(isset($_GET['ubah_barang'])){
            ?>
                <input type="text" name="id_barang" id="id_barang" value="<?php echo $id; ?>" disabled>
            <?php
                } else {
            ?>
                <input type="text" name="id_barang" id="id_barang" value="<?php echo $auto_no; ?>" readonly>
            <?php
                }
            ?>
        </div>
        <div class="dashboard-form-list">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" value="<?php echo $nm; ?>">
        </div>
        <div class="dashboard-form-list">
            <label for="foto">Foto Barang</label>
            <?php
                if(isset($_GET['ubah_barang'])){
            ?>
                <figcaption style="color: #A9A9A9;">
                    <cite style="font-size: 14px;">
                        <strong>--</strong>
                        Data Gambar Barang
                        <strong><?php echo $id; ?></strong>
                        saat ini
                    </cite>
                </figcaption>
                <img src="gambar-barang/<?php echo $ft; ?>" style="margin: 0 0 0.6em 0; width: 30%;">
                <input type="file" name="foto" id="foto" accept="image/*">
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
            <?php } else { ?>
                <input type="file" name="foto" id="foto" accept="image/*">
            <?php } ?>
        </div>
        <div class="dashboard-form-list">
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" value="<?php echo $cat; ?>">
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
        <div class="dashboard-form-list">
            <label for="kondisi">Kondisi</label>
            <select name="kondisi" id="kondisi" value="<?php echo $knd; ?>">
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
        <div class="dashboard-form-list">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" value="<?php echo $jml; ?>" readonly>
        </div>
        <div class="dashboard-form-list">
            <label for="harga">Harga</label>
            <input type="text" name="harga" id="harga" value="<?php echo $hrg; ?>" oninput="formatUang(this)">
        </div>
        <div class="dashboard-button-group">
            <?php
                if(isset($_GET['ubah_barang'])){
            ?>
                <button class="btn btn-success" name="form_process" value="update_barang">
                    <i class="fa-solid fa-pencil"></i>
                    <span>Edit Data</span>
                </button>
            <?php
                } else {
            ?>
            <button class="btn btn-primary" name="form_process" value="tambah_barang">
                <i class="fa-solid fa-plus"></i>
                <span>Simpan Data</span>
            </button>
            <?php
                }
                mysqli_free_result($sql);
                mysqli_close($conn);
            ?>
            <a href="dashboard.php?barang=barang.php" class="btn btn-danger">
                <i class="fa-solid fa-reply"></i>
                <span>Batal</span>
            </a>
        </div>
    </form>
</div>