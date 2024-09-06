<?php
    if(isset($_SESSION['sukses-tambah-akun'])){
?>
    <div id="alert-animation" class="alert-form">
        <h3><?php echo $_SESSION['sukses-tambah-akun']; ?></h3>
    </div>
<?php
    unset($_SESSION['sukses-tambah-akun']);
    } elseif(isset($_SESSION['sukses-ubah-akun'])){
?>
    <div id="alert-animation" class="alert-form">
        <h3><?php echo $_SESSION['sukses-ubah-akun']; ?></h3>
    </div>
<?php
    unset($_SESSION['sukses-ubah-akun']);
    } elseif(isset($_SESSION['sukses-hapus-akun'])){
?>
    <div id="alert-animation" class="alert-form">
        <h3><?php echo $_SESSION['sukses-hapus-akun']; ?></h3>
    </div>
<?php
    unset($_SESSION['sukses-hapus-akun']);
    }
?>
<table id="table-akun">
    <thead>
        <th>No.</th>
        <th>ID User</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th>Aksi</th>
    </thead>
    <tbody>
    <?php
        $query = "select * from login";
        $sql = mysqli_query($conn, $query);
        $no = 0;

        while($result = mysqli_fetch_assoc($sql)){
            $id = $result['id_user'];
            $usnm = $result['username'];
            $pass = $result['password'];
            $lvl = $result['level'];
    ?>
    <tr>
        <td><?php echo ++$no; ?></td>
        <td><?php echo $id; ?></td>
        <td><?php echo $usnm; ?></td>
        <td><?php echo $pass; ?></td>
        <td><?php echo $lvl; ?></td>
        <td>
            <a href="dashboard.php?ubah_user=edit_akun.php&ubah_user=<?php echo $id; ?>"
                class="btn btn-success">
                <i class="fa-solid fa-pencil"></i>
            </a>
            <a href="inc/process.php?hapus_user=<?php echo $id; ?>" class="btn btn-danger"
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