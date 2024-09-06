<?php
    $id = '';
    $usnm = '';
    $pass = '';
    $lvl = '';

    if(isset($_GET['ubah_user'])){
        $id = $_GET['ubah_user'];

        $query = "select * from login where id_user = '$id'";
        $sql = mysqli_query($conn, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        $usnm = $view_edit['username'];
        $pass = $view_edit['password'];
        $lvl = $view_edit['level'];
    }
?>
<form method="POST" class="row g-3 needs-validation" action="inc/process.php" enctype="multipart/form-data"
    autocomplete="off" novalidate>
    <input type="hidden" name="id_barang" id="id_barang" value="<?php echo $id; ?>">
    <div class="col-6">
        <label for="id_user" class="form-label">ID User</label>
        <input type="text" class="form-control" name="id_user" id="id_user"
            value="<?php echo $id; ?>" disabled>
    </div>
    <div class="col-6">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="username"
            value="<?php echo $usnm; ?>">
    </div>
    <div class="col-6">
        <label for="password" class="form-label">Password</label>
        <input type="text" class="form-control" name="password" id="password"
            value="<?php echo $pass; ?>">
    </div>
    <div class="col-6">
        <label for="level" class="form-label">Level</label>
        <select class="form-select" name="level" id="level_edit"
            data-placeholder="Pilih Level Akses" value="<?php echo $lvl; ?>">
            <option></option>
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
    <div class="mt-3">
        <button class="btn btn-success" name="form_process" value="update_akun">
            <i class="fa-solid fa-pencil"></i>
            <span>Edit Data</span>
        </button>
    </div>
</form>