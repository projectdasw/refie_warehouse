<?php
    if(isset($_SESSION['sukses-tambah-kondisi'])){
?>
    <div id="alert-animation" class="alert-form">
        <h3><?php echo $_SESSION['sukses-tambah-kondisi']; ?></h3>
    </div>
<?php
    unset($_SESSION['sukses-tambah-kondisi']);
    } elseif(isset($_SESSION['sukses-ubah-kondisi'])){
?>
    <div id="alert-animation" class="alert-form">
        <h3><?php echo $_SESSION['sukses-ubah-kondisi']; ?></h3>
    </div>
<?php
    unset($_SESSION['sukses-ubah-kondisi']);
    } elseif(isset($_SESSION['sukses-hapus-kondisi'])){
?>
    <div id="alert-animation" class="alert-form">
        <h3><?php echo $_SESSION['sukses-hapus-kondisi']; ?></h3>
    </div>
<?php
    unset($_SESSION['sukses-hapus-kondisi']);
    }
?>
<table id="table-kondisi">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID Kondisi</th>
            <th>Nama Kondisi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "select * from kondisi";
            $sql = mysqli_query($conn, $query);
            $no = 0;

            while($result = mysqli_fetch_assoc($sql)){
                $id = $result['id_kondisi'];
                $nm = $result['nama_kondisi'];
        ?>
        <tr>
            <td><?php echo ++$no; ?></td>
            <td><?php echo $id; ?></td>
            <td><?php echo $nm; ?></td>
            <td>
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editkondisi<?php echo $id; ?>">
                    <i class="fa-solid fa-pencil"></i>
                </a>
                <?php include "edit_kondisi.php"; ?>
                <a href="inc/process.php?hapus_kondisi=<?php echo $id; ?>" class="btn btn-danger"
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