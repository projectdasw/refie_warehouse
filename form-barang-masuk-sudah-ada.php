<div class="dashboard-form">
    <form method="POST" action="inc/process.php" enctype="multipart/form-data">
        <div class="dashboard-form-list">
            <label for="tanggal_masuk">Hari/Tanggal Barang Masuk</label>
            <input type="text" name="tanggal_masuk" id="tanggal_masuk"
                value="<?php echo strftime("%A, %d %B %Y"); ?>" readonly>
        </div>
        <div class="dashboard-form-list">
            <label for="no_faktur">No. Faktur</label>
            <?php
                $word = "RFAM-";
                $number = random_int(00000, 99999);
                $auto_no = $word . sprintf("%03s", $number);
            ?>
                <input type="text" name="no_faktur" id="no_faktur"
                    value="<?php echo $auto_no; ?>" readonly>
        </div>
        <div class="dashboard-form-list">
            <label for="nama_barang">Nama Barang</label>
            <select name="nama_barang" id="nama_barang" onchange="ambil_detail_masuk()">
                <option>-- Pilih Barang ---</option>
                <?php
                    $query = "select * from barang";
                    $sql = mysqli_query($conn, $query);
                    
                    while($result = mysqli_fetch_assoc($sql)){
                        $nm_brg = $result['nama_barang'];

                        if(isset($_POST['nama_barang'])){
                ?>
                    <option value="<?php echo $nm_brg?>" selected>
                        <?php echo $nm_brg?>
                    </option>
                <?php
                    } else {
                ?>
                    <option value="<?php echo $nm_brg?>">
                        <?php echo $nm_brg?>
                    </option>
                <?php
                        }
                    }
                ?>
            </select>
        </div>
        <div class="dashboard-form-list">
            <label for="id_barang">ID Barang</label>
            <input type="text" name="id_barang" id="id_barang" readonly>
        </div>
        <div class="dashboard-form-list">
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" id="kategori" readonly>
        </div>
        <div class="dashboard-form-list">
            <label for="kondisi">Kondisi</label>
            <input type="text" name="kondisi" id="kondisi" readonly>
        </div>
        <div class="dashboard-form-list">
            <label for="harga_beli">Harga Beli</label>
            <input type="text" name="harga_beli" id="harga_beli" oninput="formatUang(this)" required>
        </div>
        <div class="dashboard-form-list">
            <label for="harga_jual">Harga Jual</label>
            <input type="number" name="harga_jual" id="harga_jual" readonly>
        </div>
        <div class="dashboard-form-list">
            <label for="jumlah_masuk">Jumlah Barang Masuk</label>
            <input type="number" name="jumlah_masuk" id="jumlah_masuk" required>
        </div>
        <div class="dashboard-button-group">
            <button class="btn btn-primary" name="form_process" value="tambah_barang_masuk_sudah_ada">
                <i class="fa-solid fa-plus"></i>
                <span>Simpan Data</span>
            </button>
            <a href="dashboard.php?barang_masuk=form-barang_masuk.php" class="btn btn-danger">
                <i class="fa-solid fa-reply"></i>
                <span>Batal</span>
            </a>
        </div>
    </form>
</div>