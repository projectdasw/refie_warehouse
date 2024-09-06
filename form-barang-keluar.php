<form method="POST" class="row g-3 needs-validation" action="inc/process.php" enctype="multipart/form-data"
    autocomplete="off" novalidate>
    <div class="col-4">
        <label for="tanggal_keluar" class="form-label">
            Hari/Tanggal Barang Keluar
        </label>
        <input type="text" class="form-control bg-secondary-subtle" name="tanggal_keluar" id="tanggal_keluar"
            value="<?php echo strftime("%A, %d %B %Y"); ?>" readonly>
    </div>
    <div class="col-4">
        <label for="no_faktur" class="form-label">
            No. Faktur
        </label>
        <?php
            $word = "RFKL-";
            $number = random_int(00000, 99999);
            $auto_no = $word . sprintf("%03s", $number);
        ?>
        <input type="text" class="form-control bg-secondary-subtle" name="no_faktur" id="no_faktur"
            value="<?php echo $auto_no; ?>" readonly>
    </div>
    <div class="col-4">
        <label for="nama_barang" class="form-label">
            Nama Barang
        </label>
        <select class="form-select" name="nama_barang" id="nama_barang" data-placeholder="Pilih Barang"
            onchange="ambil_detail()" required>
            <option></option>
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
        <div class="invalid-feedback">
            Harap pilih barang yang akan keluar
        </div>
    </div>
    <div class="col-3">
        <label for="id_barang" class="form-label">ID Barang</label>
        <input type="text" class="form-control bg-secondary-subtle" name="id_barang" id="id_barang" readonly>
    </div>
    <div class="col-3">
        <label for="kategori" class="form-label">Kategori</label>
        <input type="text" class="form-control bg-secondary-subtle" name="kategori" id="kategori" readonly>
    </div>
    <div class="col-3">
        <label for="harga" class="form-label">Harga Jual</label>
        <input type="text" class="form-control bg-secondary-subtle" name="harga" id="harga" readonly>
    </div>
    <div class="col-3">
        <label for="jumlah_keluar" class="form-label">Jumlah Barang Keluar</label>
        <input type="number" class="form-control" name="jumlah_keluar" id="jumlah_keluar" required>
        <div class="invalid-feedback">
            Harap masukkan jumlah barang yang keluar
        </div>
    </div>
    <div>
        <button class="btn btn-primary" name="form_process" value="tambah_barang_keluar">
            <i class="fa-solid fa-plus"></i>
            <span>Simpan Data</span>
        </button>
    </div>
</form>