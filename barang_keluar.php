<?php
    if(isset($_SESSION['sukses-tambah-barang-keluar'])){
?>
    <div id="alert-animation" class="alert-form">
        <h3><?php echo $_SESSION['sukses-tambah-barang-keluar']; ?></h3>
    </div>
<?php
    unset($_SESSION['sukses-tambah-barang-keluar']);
    }
?>
<div class="table-responsive">
    <table id="datamaster_barangkeluar" class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal Keluar</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Jual</th>
                <th>Jumlah</th>
            </tr>
        </thead>
    </table>
</div>