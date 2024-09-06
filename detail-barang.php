<?php
    $nm = '';
    $ft = '';
    $cat = '';
    $knd = '';
    $jml = '';
    $hrg = '';
    $desc = '';

    if(isset($_GET['detail-barang'])){
        $nm = $_GET['detail-barang'];

        $query = "select * from barang where nama_barang = '$nm'";
        $sql = mysqli_query($conn, $query);
        $view_edit = mysqli_fetch_assoc($sql);
        
        // $nm = $view_edit['nama_barang'];
        $ft = $view_edit['foto'];
        $cat = $view_edit['kategori'];
        $knd = $view_edit['kondisi'];
        $jml = $view_edit['jumlah'];
        $hrg = $view_edit['harga'];
        $desc = $view_edit['deskripsi'];
    }
?>
<div class="container kanit-regular p-4">
    <div class="row g-3">
        <div class="col-3">
            <img src="gambar-barang/<?php echo $ft; ?>" class="w-100">
        </div>
        <div class="col-6">
            <h4 class="kanit-semibold m-0">
                <?php echo $nm; ?>
            </h4>
            <?php
                $query = "select stok_keluar from laporan_barang_masuk_keluar where nama_barang = '$nm'";
                $sql = mysqli_query($conn, $query);
                $view_stock = mysqli_fetch_assoc($sql);

                $sold = $view_stock['stok_keluar'];
            ?>
            <span class="fs-5">
                Terjual <?php echo $sold; ?>
            </span>
            <h2 class="kanit-medium mt-4 mb-4">
                Rp. <?php echo $hrg; ?>
            </h2>
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Detail
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <p class="m-0">
                                <span class="text-body-secondary">Kondisi</span> : <?php echo $knd; ?>
                            </p>
                            <p class="m-0">
                                <span class="text-body-secondary">Min. Pemesanan</span> : 1
                            </p>
                            <p class="m-0">
                                <span class="text-body-secondary">Kategori</span> : <?php echo $cat; ?>
                            </p>
                            <p class="mt-3">
                                <?php echo $desc; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Info Penting
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Stok :
                        <?php
                            if($jml < 10){
                        ?>
                            <small class="text-warning">
                                sisa <?php echo $jml; ?>
                            </small>
                        <?php
                            }
                            else if($jml == 0){
                        ?>
                            <small class="text-danger">
                                Habis
                            </small>
                        <?php
                            }
                            else{
                        ?>
                            <small class="text-success">
                                <?php echo $jml; ?>
                            </small>
                        <?php } ?>
                    </h5>
                    <p class="card-text"></p>
                </div>
                <div class="card-footer">
                    <small class="text-body-secondary"></small>
                </div>
            </div>
        </div>
    </div>
</div>