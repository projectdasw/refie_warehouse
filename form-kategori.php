<?php
    $id = '';
    $nm = '';

    if(isset($_GET['ubah_kategori'])){
        $id = $_GET['ubah_kategori'];

        $query = "select * from kategori where id_kategori = '$id'";
        $sql = mysqli_query($conn, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        $nm = $view_edit['nama_kategori'];
    }
?>
<div class="dashboard-form">
    <form method="POST" action="inc/process.php" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="id_kategori" id="id_kategori" value="<?php echo $id; ?>">
        <div class="dashboard-form-list">
            <label for="id_kategori">ID Kategori</label>
            <?php
                $word = "CAT-";
                $number = random_int(100, 999);
                $auto_no = $word . sprintf("%03s", $number);
                if(isset($_GET['ubah_kategori'])){
            ?>
                <input type="text" name="id_kategori" id="id_kategori" value="<?php echo $id; ?>" disabled>
            <?php
                } else {
            ?>
                <input type="text" name="id_kategori" id="id_kategori" value="<?php echo $auto_no; ?>" readonly>
            <?php
                }
            ?>
        </div>
        <div class="dashboard-form-list">
            <label for="nama_kategori">Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" value="<?php echo $nm; ?>" required>
        </div>
        <div class="dashboard-button-group">
            <?php
                if(isset($_GET['ubah_kategori'])){
            ?>
                <button class="btn btn-success" name="form_process" value="update_kategori">
                    <i class="fa-solid fa-pencil"></i>
                    <span>Edit Data</span>
                </button>
            <?php
                } else {
            ?>
            <button class="btn btn-primary" name="form_process" value="tambah_kategori">
                <i class="fa-solid fa-plus"></i>
                <span>Simpan Data</span>
            </button>
            <?php
                }
            ?>
            <a href="dashboard.php?kategori=kategori.php" class="btn btn-danger">
                <i class="fa-solid fa-reply"></i>
                <span>Batal</span>
            </a>
        </div>
    </form>
</div>