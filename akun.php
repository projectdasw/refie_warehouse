<style>
    .dashboard-form form{
        display: flex;
        flex-direction: column;
    }

    .dashboard-form-list{
        width: 23%;
    }

    .dashboard-form-list input, .dashboard-form-list select{
        width: 100%;
    }

    .dashboard-button-group,
    .dashboard-button-group .btn{
        width: max-content;
    }

    .akun-heading{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #000;
        padding: 0 0 10px 0;
    }

    .akun-form{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
    }
</style>
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
<?php
    $id = '';
    $user = '';
    $pass = '';
    $lvl = '';

    if(isset($_GET['ubah_user'])){
        $id = $_GET['ubah_user'];

        $query = "select * from login where id_user = '$id'";
        $sql = mysqli_query($conn, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        $user = $view_edit['username'];
        $pass = $view_edit['password'];
        $lvl = $view_edit['level'];
    }
?>
<div class="dashboard-form">
    <form method="POST" action="inc/process.php" enctype="multipart/form-data" autocomplete="off">
        <div class="akun-heading">
            <h1>Form Akun Toko</h1>
            <div class="dashboard-button-group">
                <?php if(isset($_GET['ubah_user'])){ ?>
                    <button class="btn btn-success" name="form_process" value="update_akun">
                        <i class="fa-solid fa-pencil"></i>
                        <span>Edit Data</span>
                    </button>
                <?php } else {?>
                    <button class="btn btn-primary" name="form_process" value="tambah_akun">
                        <i class="fa-solid fa-plus"></i>
                        <span>Simpan Data</span>
                    </button>
                <?php } ?>
            </div>
        </div>
        <div class="akun-form">
            <input type="hidden" name="id_user" id="id_user" value="<?php echo $id; ?>">
            <div class="dashboard-form-list">
                <label for="id_user">ID User</label>
                <?php
                    $word = "LOG-";
                    $number = random_int(100, 999);
                    $auto_no = $word . sprintf("%03s", $number);
                    if(isset($_GET['ubah_user'])){
                ?>
                    <input type="text" name="id_user" id="id_user" value="<?php echo $id; ?>" disabled>
                <?php
                    } else {
                ?>
                    <input type="text" name="id_user" id="id_user" value="<?php echo $auto_no; ?>" readonly>
                <?php
                    }
                ?>
            </div>
            <div class="dashboard-form-list">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?php echo $user; ?>" required>
            </div>
            <div class="dashboard-form-list">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" value="<?php echo $pass; ?>" required>
            </div>
            <div class="dashboard-form-list">
                <label for="level">Level</label>
                <select name="level" id="level" value="<?php echo $lvl; ?>" required>
                    <option value="" disabled selected>--- Pilih Level ---</option>
                    <?php
                        $query = "select * from level_login";
                        $sql = mysqli_query($conn, $query);
            
                        while($result = mysqli_fetch_assoc($sql)){
                            $nm_lvl = $result['level'];
                    ?>
                    <?php
                        if(isset($_GET['ubah_user']) && $lvl == $nm_lvl){
                    ?>
                        <option value="<?php echo $lvl?>" selected>
                            <?php echo $lvl?>
                        </option>
                    <?php
                        } else {
                    ?>
                        <option value="<?php echo $nm_lvl?>">
                            <?php echo $nm_lvl?>
                        </option>
                    <?php
                        }
                    ?>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>
    </form>
</div>
<div class="data-akun">
    <h1 style="border-bottom: 1px solid #000; margin: 0 0 15px 0;">
        Data Akun Toko
    </h1>
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
                <div class="table-button" style="flex-direction: row;">
                    <a href="dashboard.php?akun=akun.php&ubah_user=<?php echo $id; ?>"
                        class="btn btn-success"
                        style="margin: 0 8px 0 0; width: 100%;">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a href="inc/process.php?hapus_user=<?php echo $id; ?>" class="btn btn-danger"
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
</div>