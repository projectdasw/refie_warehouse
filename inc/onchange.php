<?php
    include "connect.php";
    $qry = mysqli_query($conn, "select * from barang where id_barang=id_barang");
    $data = array();
    while($row = mysqli_fetch_array($qry)){
        array_push($data, $row);
    }
    echo json_encode($data);
?>