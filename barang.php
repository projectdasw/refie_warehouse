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
<table id="table-barang">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Foto Barang</th>
            <th>Kategori</th>
            <th>Kondisi</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "select * from barang";
            $sql = mysqli_query($conn, $query);
            $no = 0;

            while($result = mysqli_fetch_assoc($sql)){
                $id = $result['id_barang'];
                $nm = $result['nama_barang'];
                $ft = $result['foto'];
                $cat = $result['kategori'];
                $knd = $result['kondisi'];
                $jml = $result['jumlah'];
                $hrg = $result['harga'];
        ?>
        <tr>
            <td><?php echo ++$no; ?></td>
            <td><?php echo $id; ?></td>
            <td><?php echo $nm; ?></td>
            <td width="200">
                <img src="gambar-barang/<?php echo $ft; ?>" style="width: 100%;" loading="lazy">
            </td>
            <td><?php echo $cat; ?></td>
            <td><?php echo $knd; ?></td>
            <td><?php echo $jml; ?></td>
            <td><?php echo $hrg; ?></td>
            <td>
                <div class="table-button" style="flex-direction: column;">
                    <a href="dashboard.php?form-barang=form-barang.php&ubah_barang=<?php echo $id; ?>"
                        class="btn btn-success"
                        style="margin: 0 0 0.5em 0; width: 100%;">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a href="inc/process.php?hapus_barang=<?php echo $id; ?>" class="btn btn-danger"
                        onclick="return confirm('Apakah Anda yakin menghapus data dengan ID <?php echo $id; ?>?')"
                        style="width: 100%;">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                </div>
            </td>
        </tr>
        <?php
            }
            mysqli_free_result($sql);
            mysqli_close($conn);
        ?>
    </tbody>
</table>