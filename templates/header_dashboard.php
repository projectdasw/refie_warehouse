<?php
    date_default_timezone_set('Asia/Jakarta');
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/logo/favicon.ico" type="image/x-icon">
        <!-- CSS CUSTOM -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- CSS CUSTOM -->

        <!-- CSS CORE -->
        <!-- BOOTSTRAP CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous">
        <!-- BOOTSTRAP CSS -->

        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.css"
            integrity="sha512-ESK1vT1m7NYUq7h7moDOb4+MwsXn/19LSt1AnIPjSWRdkS1gnF9IVg5v/KZHCMN6K6sapd0OkkcSpOeYlwABeQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/solid.css"
            integrity="sha512-1Yji5rHbPJjwaFFUCEE3uLVcIiElHUKsGJN7A6XA6AzfrNohu+7DhJ67J65ZdeXjuYTiL8cdCUAG2nNJDWk8KQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.css"
            integrity="sha512-/0+jCMeks7Sm7B2Jai6K8JDYQqiwWiY73tw+G6BQkisKhUC0fqKt9Sd8noZvHPHl5rm9/cJ5hcuzzONlFvLMQQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- FONT AWESOME -->

        <!-- SWIPER CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8.4.7/swiper-bundle.min.css"
            integrity="sha256-Mi0V2Z77eSyUGlIC+o/H7p6TKEcic4P/lgUWMzigjqw="
            crossorigin="anonymous">
        <!-- SWIPER CSS -->

        <!-- DATATABLE CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
        <!-- DATATABLE CSS -->

        <!-- SWEETALERT2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css">
        <!-- SWEETALERT2 -->

        <!-- JS CORE -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
            
        <!-- BOOTSTRAP JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <!-- BOOTSTRAP JS -->

        <!-- DATATABLE JS -->
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <!-- DATATABLE JS -->

        <!-- SWEETALERT2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
        <!-- SWEETALERT2 -->
        <?php
            if(isset($_GET['barang'])){
                echo "<title>REFIE - Barang</title>";
            }
            elseif(isset($_GET['barang_masuk'])){
                echo "<title>REFIE - Barang Masuk</title>";
            }
            elseif(isset($_GET['barang_keluar'])){
                echo "<title>REFIE - Barang Keluar</title>";
            }
            elseif(isset($_GET['kategori'])){
                echo "<title>REFIE - Kategori</title>";
            }
            elseif(isset($_GET['kondisi'])){
                echo "<title>REFIE - Kondisi</title>";
            }
            elseif(isset($_GET['laporan'])){
                echo "<title>REFIE - Laporan</title>";
            }
            elseif(isset($_GET['aktivitas'])){
                echo "<title>REFIE - Aktivitas Toko</title>";
            }
            else{
                echo "<title>REFIE - Dashboard</title>";
            }
        ?>
    </head>
    <body>
        <?php
            require_once "inc/connect.php";
            if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
            {
        ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Silahkan Login terlebih dahulu",
                confirmButtonColor: "#d33",
                confirmButtonText: "OK",
                backdrop: "rgb(99, 29, 139)"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php';
                }
            });
        </script>
    <?php } ?>