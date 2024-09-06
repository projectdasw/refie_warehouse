<?php
    if(isset($_SESSION['sukses-tambah-barang-masuk'])){
?>
    <div id="alert-animation" class="alert-form">
        <h3><?php echo $_SESSION['sukses-tambah-barang-masuk']; ?></h3>
    </div>
<?php
    unset($_SESSION['sukses-tambah-barang-masuk']);
    } elseif(isset($_SESSION['sukses-tambah-barang-masuk-sudah-ada'])){
?>
    <div id="alert-animation" class="alert-form">
        <h3><?php echo $_SESSION['sukses-tambah-barang-masuk-sudah-ada']; ?></h3>
    </div>
<?php
    unset($_SESSION['sukses-tambah-barang-masuk-sudah-ada']);
    }
?>
<div class="table-responsive">
    <table id="datamaster_barangmasuk" class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal Masuk</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Kondisi</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Jumlah</th>
            </tr>
        </thead>
    </table>
</div>