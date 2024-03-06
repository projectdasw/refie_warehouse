<?php
    date_default_timezone_set('Asia/Jakarta');
    setlocale(LC_ALL, 'id-ID', 'id_ID');

    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/img/logo/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.css"
            integrity="sha512-ESK1vT1m7NYUq7h7moDOb4+MwsXn/19LSt1AnIPjSWRdkS1gnF9IVg5v/KZHCMN6K6sapd0OkkcSpOeYlwABeQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/solid.css"
            integrity="sha512-1Yji5rHbPJjwaFFUCEE3uLVcIiElHUKsGJN7A6XA6AzfrNohu+7DhJ67J65ZdeXjuYTiL8cdCUAG2nNJDWk8KQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.css"
            integrity="sha512-/0+jCMeks7Sm7B2Jai6K8JDYQqiwWiY73tw+G6BQkisKhUC0fqKt9Sd8noZvHPHl5rm9/cJ5hcuzzONlFvLMQQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
        <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="../assets/css/style.css">
        <title>Cetak Laporan Toko</title>
    </head>
    <body style="padding: 2em 0 0 0;">
        <div class="brand-report">
            <img src="../assets/img/logo/refie_logo.png" alt="image" loading="lazy">
            <div class="desc-report">
                <h1>REFIE Sport Fashion</h1>
                <h3>
                    Data Laporan Terbaru
                    per <?php echo strftime("%A, %d %B %Y"); ?>
                </h3>
            </div>
        </div>
        <table id="cetak-laporan1">
            <h1 style="margin: 0 0 10px 0; border-bottom: 1px solid #000;">
                Data Stok Barang
            </h1>
            <thead>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stock Awal</th>
                    <th>Stock Masuk</th>
                    <th>Stock Keluar</th>
                    <th>Stock Akhir</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $query = "select * from laporan_barang_masuk_keluar";
                $sql = mysqli_query($conn, $query);

                while($result = mysqli_fetch_assoc($sql)){
                    $id = $result['id_barang'];
                    $nm = $result['nama_barang'];
                    $cat = $result['kategori'];
                    $stok_awal = $result['stok_awal'];
                    $stok_masuk = $result['stok_masuk'];
                    $stok_keluar = $result['stok_keluar'];
                    $stok_akhir = $result['stok_akhir'];
            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nm; ?></td>
                    <td><?php echo $cat; ?></td>
                    <td><?php echo $stok_awal; ?></td>
                    <td><?php echo $stok_masuk; ?></td>
                    <td><?php echo $stok_keluar; ?></td>
                    <td><?php echo $stok_akhir; ?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <table id="cetak-laporan2">
            <div class="laporan-heading">
                <h1>Transaksi Masuk Keluar Barang</h1>
                <h4>
                    Jumlah Transaksi :
                    <?php
                        $query = "select count(*) as total from transaksi_barang";
                        $sql = mysqli_query($conn, $query);
                        $countdata = mysqli_fetch_assoc($sql);
                        echo "<span>$countdata[total]</span>";
                    ?>
                </h4>
            </div>
            <div class="table-note">
                <div class="data-increase">
                    <i class="fa-solid fa-circle-plus"
                        style="font-size: 20px; color: #008300; margin: 0 2px 0 0;"></i>
                    <strong>Barang Masuk</strong>
                </div>
                <div class="data-decrease">
                    <i class="fa-solid fa-circle-minus"
                        style="font-size: 20px; color: #ff0000; margin: 0 2px 0 0;"></i>
                    <strong>Barang Keluar</strong>
                </div>
            </div>
            <thead>
                <tr>
                    <th hidden>No.</th>
                    <th>Tanggal</th>
                    <th>No. Faktur</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $query = "select * from transaksi_barang order by tanggal desc";
                $sql = mysqli_query($conn, $query);
                $no = 0;

                while($result = mysqli_fetch_assoc($sql)){
                    $tgl_trans = $result['tanggal'];
                    $no_fkt = $result['no_faktur'];
                    $id = $result['id_barang'];
                    $nm = $result['nama_barang'];
                    $cat = $result['kategori'];
                    $jml = $result['jumlah_keluar_masuk'];
            ?>
                <tr>
                    <td hidden><?php echo ++$no; ?></td>
                    <td><?php echo $tgl_trans; ?></td>
                    <td><?php echo $no_fkt; ?></td>
                    <td><?php echo $id; ?></td>
                    <td style="display: flex; align-items: center;">
                        <?php
                            if(substr($no_fkt, 0, 4) == "RFAM"){
                        ?>
                            <i class="fa-solid fa-circle-plus"
                            style="
                                font-size: 20px;
                                color: #008300;
                                margin: 0 5px 0 0;
                                ">
                            </i>
                            <?php echo $nm; ?>
                        <?php
                            }
                            else{
                        ?>
                            <i class="fa-solid fa-circle-minus"
                            style="
                                font-size: 20px;
                                color: #ff0000;
                                margin: 0 5px 0 0;
                                ">
                            </i>
                            <?php echo $nm; ?>
                        <?php } ?>
                    </td>
                    <td><?php echo $cat; ?></td>
                    <td><?php echo $jml; ?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <?php
            mysqli_free_result($sql);
            mysqli_close($conn);
        ?>
        <script src="../assets/js/script.js" type="text/javascript"></script>
        <script>
            window.print();
        </script>
    </body>
</html>