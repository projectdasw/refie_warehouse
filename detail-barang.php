<?php
    $nm = '';
    $ft = '';
    $cat = '';
    $knd = '';
    $jml = '';
    $hrg = '';

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
    }
?>
<div class="container kanit-regular">
    <div class="row">
        <div class="col-4 p-2">
            <img src="gambar-barang/<?php echo $ft; ?>" class="w-100">
        </div>
        <div class="col-8 p-2">
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
            <h3 class="kanit-medium">
                Detail
            </h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Iste magni dignissimos praesentium repellendus.
                Ipsum minima vero harum culpa debitis sit eius fugit repellat et neque,
                quia repellendus esse cumque accusamus.
            </p>
        </div>
    </div>
</div>