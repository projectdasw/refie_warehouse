<?php
    if(isset($_SESSION['sukses-tambah-kategori'])){
?>
    <div id="alert-animation" class="alert-form">
        <h3><?php echo $_SESSION['sukses-tambah-kategori']; ?></h3>
    </div>
<?php
    unset($_SESSION['sukses-tambah-kategori']);
    } elseif(isset($_SESSION['sukses-ubah-kategori'])){
?>
    <div id="alert-animation" class="alert-form">
        <h3><?php echo $_SESSION['sukses-ubah-kategori']; ?></h3>
    </div>
<?php
    unset($_SESSION['sukses-ubah-kategori']);
    } elseif(isset($_SESSION['sukses-hapus-kategori'])){
?>
    <div id="alert-animation" class="alert-form">
        <h3><?php echo $_SESSION['sukses-hapus-kategori']; ?></h3>
    </div>
<?php
    unset($_SESSION['sukses-hapus-kategori']);
    }
?>
<table id="table-kategori">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID Kategori</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "select * from kategori";
            $sql = mysqli_query($conn, $query);
            $no = 0;

            while($result = mysqli_fetch_assoc($sql)){
                $id = $result['id_kategori'];
                $nm = $result['nama_kategori'];
        ?>
        <tr>
            <td><?php echo ++$no; ?></td>
            <td><?php echo $id; ?></td>
            <td><?php echo $nm; ?></td>
            <td>
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editkategori<?php echo $id; ?>">
                    <i class="fa-solid fa-pencil"></i>
                </a>
                <?php include "edit_kategori.php"; ?>
                <a href="inc/process.php?hapus_kategori=<?php echo $id; ?>" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin menghapus data dengan ID <?php echo $id; ?>?')">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            </td>
        </tr>
        <?php
            }
            mysqli_free_result($sql);
            mysqli_close($conn);
        ?>
    </tbody>
</table>