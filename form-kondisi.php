<?php
    $id = '';
    $nm = '';

    if(isset($_GET['ubah_kondisi'])){
        $id = $_GET['ubah_kondisi'];

        $query = "select * from kondisi where id_kondisi = '$id'";
        $sql = mysqli_query($conn, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        $nm = $view_edit['nama_kondisi'];
    }
?>
<div class="dashboard-form">
    <form method="POST" action="inc/process.php" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="id_kondisi" id="id_kondisi" value="<?php echo $id; ?>">
        <div class="dashboard-form-list">
            <label for="id_kondisi">ID Kondisi</label>
            <?php
                $word = "KND-";
                $number = random_int(100, 999);
                $auto_no = $word . sprintf("%03s", $number);
                if(isset($_GET['ubah_kondisi'])){
            ?>
                <input type="text" name="id_kondisi" id="id_kondisi" value="<?php echo $id; ?>" disabled>
            <?php
                } else {
            ?>
                <input type="text" name="id_kondisi" id="id_kondisi" value="<?php echo $auto_no; ?>" readonly>
            <?php
                }
            ?>
        </div>
        <div class="dashboard-form-list">
            <label for="nama_kondisi">Kondisi</label>
            <input type="text" name="nama_kondisi" id="nama_kondisi" value="<?php echo $nm; ?>" required>
        </div>
        <div class="dashboard-button-group">
            <?php
                if(isset($_GET['ubah_kondisi'])){
            ?>
                <button class="btn btn-success" name="form_process" value="update_kondisi">
                    <i class="fa-solid fa-pencil"></i>
                    <span>Edit Data</span>
                </button>
            <?php
                } else {
            ?>
            <button class="btn btn-primary" name="form_process" value="tambah_kondisi">
                <i class="fa-solid fa-plus"></i>
                <span>Simpan Data</span>
            </button>
            <?php
                }
            ?>
            <a href="dashboard.php?kondisi=kondisi.php" class="btn btn-danger">
                <i class="fa-solid fa-reply"></i>
                <span>Batal</span>
            </a>
        </div>
    </form>
</div>