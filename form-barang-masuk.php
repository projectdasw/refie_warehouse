<div class="dashboard-form">
    <form method="POST" action="inc/process.php" enctype="multipart/form-data" autocomplete="off">
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
            <label for="id_barang">ID Barang</label>
            <?php
                $word = "REF-";
                $number = random_int(000, 999);
                $auto_no = $word . sprintf("%03s", $number);
            ?>
                <input type="text" name="id_barang" id="id_barang"
                    value="<?php echo $auto_no; ?>" readonly>
        </div>
        <div class="dashboard-form-list">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" required>
        </div>
        <div class="dashboard-form-list">
            <label for="foto">Foto Barang</label>
            <div class="photoCheck">
                <input type="file" name="foto" id="foto" accept="image/*" onchange="checkFileSelection()" required>
                <button style="display: none;" id="showhideFoto" class="btn" type="button" onclick="hapusFoto()">
                    <i class="fa-solid fa-xmark"></i>
                    <span>Hapus Pilihan Foto</span>
                </button>
            </div>
            <span class="Checkstatus" id="statusFoto">
                <i class="fa-solid fa-hand-pointer"></i>
                Silahkan Upload Foto Barang Anda
            </span>
        </div>
        <div class="dashboard-form-list">
            <label for="kategori">Kategori</label>
            <?php
                $query2 = "select count(*) as total from kategori";
                $sql2 = mysqli_query($conn, $query2);
                $countdata = mysqli_fetch_assoc($sql2);

                if($countdata['total'] <= 0){
            ?>
                <select name="kategori" id="kategori" required></select>
                <figcaption style="color: #A9A9A9;">
                    <cite style="font-size: 14px;">
                        <strong>
                            -- Tidak ada Data Kategori.
                            Silahkan masukkan Data Kategori terlebih dahulu
                            di Menu Kategori.
                        </strong>
                    </cite>
                </figcaption>
            <?php } else{ ?>
                <select name="kategori" id="kategori" required>
                    <option value="" disabled selected>--- Pilih Kategori ---</option>
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
                <figcaption style="color: #A9A9A9;">
                    <cite style="font-size: 14px;">
                        <strong>
                            -- Kategori Baru?
                            Silahkan klik Menu Kategori untuk menambah
                            Kategori baru Anda
                        </strong>
                    </cite>
                </figcaption>
            <?php } ?>
        </div>
        <div class="dashboard-form-list">
            <label for="kondisi">Kondisi</label>
            <?php
                $query2 = "select count(*) as total from kondisi";
                $sql2 = mysqli_query($conn, $query2);
                $countdata = mysqli_fetch_assoc($sql2);

                if($countdata['total'] <= 0){
            ?>
                <select name="kondisi" id="kondisi" required></select>
                <figcaption style="color: #A9A9A9;">
                    <cite style="font-size: 14px;">
                        <strong>
                            -- Tidak ada Data Kondisi.
                            Silahkan masukkan Data Kondisi terlebih dahulu
                            di Menu Kondisi.
                        </strong>
                    </cite>
                </figcaption>
            <?php
                } else{
            ?>
                <select name="kondisi" id="kondisi" required>
                    <option value="" disabled selected>--- Pilih Kondisi ---</option>
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
                <figcaption style="color: #A9A9A9;">
                    <cite style="font-size: 14px;">
                        <strong>-- Kondisi Baru? Silahkan klik Menu Kondisi untuk menambah Kondisi baru Anda</strong>
                    </cite>
                </figcaption>
            <?php } ?>
        </div>
        <div class="dashboard-form-list">
            <label for="harga_beli">Harga Beli</label>
            <input type="text" name="harga_beli" id="harga_beli" oninput="formatUang(this)" required>
        </div>
        <div class="dashboard-form-list">
            <label for="harga_jual">Harga Jual</label>
            <input type="text" name="harga_jual" id="harga_jual" oninput="formatUang(this)" required>
        </div>
        <div class="dashboard-form-list">
            <label for="jumlah_masuk">Jumlah Barang Masuk</label>
            <input type="number" name="jumlah_masuk" id="jumlah_masuk" required>
        </div>
        <div class="dashboard-button-group">
            <button class="btn btn-primary" name="form_process" value="tambah_barang_masuk">
                <i class="fa-solid fa-plus"></i>
                <span>Simpan Data</span>
            </button>
            <a href="dashboard.php?barang_masuk=barang_masuk.php" class="btn btn-danger">
                <i class="fa-solid fa-reply"></i>
                <span>Batal</span>
            </a>
        </div>
    </form>
</div>