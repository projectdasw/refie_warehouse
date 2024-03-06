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
<table id="table-barang-keluar">
    <thead>
        <tr>
            <th hidden>No.</th>
            <th>Tanggal Keluar</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga Jual</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "select * from barang_keluar";
            $sql = mysqli_query($conn, $query);
            $no = 0;

            while($result = mysqli_fetch_assoc($sql)){
                $tgl_keluar = $result['tanggal_keluar'];
                $id = $result['id_barang'];
                $nm = $result['nama_barang'];
                $cat = $result['kategori'];
                $hrg_jual = $result['harga_jual'];
                $jml_klr = $result['jumlah_keluar'];
        ?>
        <tr>
            <td hidden><?php echo ++$no; ?></td>
            <td><?php echo $tgl_keluar; ?></td>
            <td><?php echo $id; ?></td>
            <td>
                <i class="fa-solid fa-circle-minus"
                style="
                    font-size: 20px;
                    color: #ff0000;
                    ">
                </i>
                <?php echo $nm; ?>
            </td>
            <td><?php echo $cat; ?></td>
            <td><?php echo $hrg_jual; ?></td>
            <td><?php echo $jml_klr; ?></td>
        </tr>
        <?php
            }
            mysqli_free_result($sql);
            mysqli_close($conn);
        ?>
    </tbody>
</table>