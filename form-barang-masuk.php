<form method="POST" class="row g-3 needs-validation" action="inc/process.php" enctype="multipart/form-data"
    autocomplete="off" novalidate>
    <div class="col-4">
        <label for="tanggal_masuk" class="form-label">
            Hari/Tanggal Barang Masuk
        </label>
        <input type="text" class="form-control bg-secondary-subtle" name="tanggal_masuk" id="tanggal_masuk"
            value="<?php echo strftime("%A, %d %B %Y"); ?>" readonly>
    </div>
    <div class="col-4">
        <label for="no_faktur" class="form-label">
            No. Faktur
        </label>
        <?php
            $word = "RFAM-";
            $number = random_int(00000, 99999);
            $auto_no = $word . sprintf("%03s", $number);
        ?>
            <input type="text" class="form-control bg-secondary-subtle" name="no_faktur" id="no_faktur"
                value="<?php echo $auto_no; ?>" readonly>
    </div>
    <div class="col-4">
        <label for="id_barang" class="form-label">
            ID Barang
        </label>
        <?php
            $word = "REF-";
            $number = random_int(000, 999);
            $auto_no = $word . sprintf("%03s", $number);
        ?>
            <input type="text" class="form-control bg-secondary-subtle" name="id_barang" id="id_barang"
                value="<?php echo $auto_no; ?>" readonly>
    </div>
    <div class="col-3">
        <label for="nama_barang" class="form-label">
            Nama Barang
        </label>
        <input type="text" class="form-control" name="nama_barang" id="nama_barang" required>
        <div class="invalid-feedback">
            Nama Barang tidak boleh kosong
        </div>
    </div>
    <div class="col-3">
        <label for="foto" class="form-label">Foto Barang</label>
        <div class="photoCheck">
            <input type="file" class="form-control" name="foto" id="foto" accept="image/*" onchange="checkFileSelection()">
        </div>
        <button style="display: none;" id="showhideFoto" class="btn btn-danger align-items-center mt-2" type="button"
            onclick="hapusFoto()">
            <i class="fa-solid fa-xmark me-2"></i>
            <span>Hapus Pilihan Foto</span>
        </button>
        <div class="alert alert-success d-flex align-items-center mt-2 p-2"
            id="statusFoto" role="alert">
            <i class="fa-solid fa-hand-pointer me-2"></i>
            <span>Silahkan Upload Foto Barang Anda</span>
        </div>
    </div>
    <div class="col-3">
        <label for="kategori" class="form-label">
            Kategori
        </label>
        <select class="form-select" name="kategori"
            id="kategori_select" data-placeholder="Pilih Kategori" required>
            <option></option>
            <?php
                $query = "select * from kategori";
                $sql = mysqli_query($conn, $query);
    
                while($result = mysqli_fetch_assoc($sql)){
                    $id_cat = $result['id_kategori'];
                    $nm_cat = $result['nama_kategori'];
            ?>
                <option value="<?php echo $nm_cat?>">
                    <?php echo $nm_cat?>
                </option>
            <?php
                }
            ?>
        </select>
        <div class="invalid-feedback">
            Harap pilih Kategori barang
        </div>
    </div>
    <div class="col-3">
        <label for="kondisi" class="form-label">
            Kondisi
        </label>
        <select class="form-select" name="kondisi" id="kondisi_select"
            data-placeholder="Pilih Kondisi" required>
            <option></option>
            <?php
                $query = "select * from kondisi order by nama_kondisi asc";
                $sql = mysqli_query($conn, $query);
    
                while($result = mysqli_fetch_assoc($sql)){
                    $id_knd = $result['id_kondisi'];
                    $nm_knd = $result['nama_kondisi'];
            ?>
                <option value="<?php echo $nm_knd?>">
                    <?php echo $nm_knd?>
                </option>
            <?php
                }
            ?>
        </select>
        <div class="invalid-feedback">
            Harap pilih Kondisi barang
        </div>
    </div>
    <div class="col-3">
        <label for="harga_beli" class="form-label">Harga Beli</label>
        <input type="text" class="form-control" name="harga_beli" id="harga_beli" oninput="formatUang(this)" required>
        <div class="invalid-feedback">
            Harap masukkan harga pembelian awal barang
        </div>
    </div>
    <div class="col-3">
        <label for="harga_jual" class="form-label">Harga Jual</label>
        <input type="text" class="form-control" name="harga_jual" id="harga_jual" oninput="formatUang(this)" required>
        <div class="invalid-feedback">
            Harap masukkan harga jual barang
        </div>
    </div>
    <div class="col-3">
        <label for="jumlah_masuk" class="form-label">Jumlah Barang Masuk</label>
        <input type="number" class="form-control" name="jumlah_masuk" id="jumlah_masuk" required>
        <div class="invalid-feedback">
            Harap masukkan jumlah barang yang masuk
        </div>
    </div>
    <div>
        <button class="btn btn-primary" name="form_process" value="tambah_barang_masuk">
            <i class="fa-solid fa-plus"></i>
            <span>Simpan Data</span>
        </button>
    </div>
</form>