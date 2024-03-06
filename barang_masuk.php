<div class="barang-masuk-button-group">
    <button class="btn btn-primary"
        onclick="location.href='dashboard.php?form-barang-masuk=form-barang-masuk.php'">
        <i class="fa-solid fa-circle-plus"></i>
        <span>Tambah Barang Masuk Baru</span>
    </button>
    <button class="btn btn-primary"
        onclick="location.href='dashboard.php?form-barang-masuk-sudah-ada=form-barang-masuk-sudah-ada.php'">
        <i class="fa-solid fa-circle-plus"></i>
        <span>Tambah Barang Masuk yang sudah ada</span>
    </button>
</div>
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
<table id="table-barang-masuk">
    <thead>
        <tr>
            <th hidden>No.</th>
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
    <tbody>
        <?php
            $query = "select * from barang_masuk";
            $sql = mysqli_query($conn, $query);
            $no = 0;

            while($result = mysqli_fetch_assoc($sql)){
                $tgl_masuk = $result['tanggal_masuk'];
                $id = $result['id_barang'];
                $nm = $result['nama_barang'];
                $cat = $result['kategori'];
                $knd = $result['kondisi'];
                $hrg_beli = $result['harga_beli'];
                $hrg_jual = $result['harga_jual'];
                $jml_masuk = $result['jumlah_masuk'];
        ?>
        <tr>
            <td hidden><?php echo ++$no; ?></td>
            <td><?php echo $tgl_masuk; ?></td>
            <td><?php echo $id; ?></td>
            <td>
                <i class="fa-solid fa-circle-plus"
                style="
                    font-size: 20px;
                    color: #008300;
                    ">
                </i>
                <?php echo $nm; ?>
            </td>
            <td><?php echo $cat; ?></td>
            <td><?php echo $knd; ?></td>
            <td><?php echo $hrg_beli; ?></td>
            <td><?php echo $hrg_jual; ?></td>
            <td><?php echo $jml_masuk; ?></td>
        </tr>
        <?php
            }
            mysqli_free_result($sql);
            mysqli_close($conn);
        ?>
    </tbody>
</table>