<?php
    date_default_timezone_set('Asia/Jakarta');
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    
    include 'inc/connect.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/logo/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.css"
            integrity="sha512-ESK1vT1m7NYUq7h7moDOb4+MwsXn/19LSt1AnIPjSWRdkS1gnF9IVg5v/KZHCMN6K6sapd0OkkcSpOeYlwABeQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/solid.css"
            integrity="sha512-1Yji5rHbPJjwaFFUCEE3uLVcIiElHUKsGJN7A6XA6AzfrNohu+7DhJ67J65ZdeXjuYTiL8cdCUAG2nNJDWk8KQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.css"
            integrity="sha512-/0+jCMeks7Sm7B2Jai6K8JDYQqiwWiY73tw+G6BQkisKhUC0fqKt9Sd8noZvHPHl5rm9/cJ5hcuzzONlFvLMQQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8.4.7/swiper-bundle.min.css"
            integrity="sha256-Mi0V2Z77eSyUGlIC+o/H7p6TKEcic4P/lgUWMzigjqw="
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
        <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="assets/css/style.css">
        <?php
            if(isset($_GET['katalog'])){
                echo "
                    <title>Katalog - REFIE Sport & Fashion</title>
                ";
            }
            else{
                echo "
                    <title>REFIE Sport & Fashion</title>
                ";
            }
        ?>
    </head>
    <body>