<?php
// DB table to use
$table = 'barang_masuk';
 
// Table's primary key
$primaryKey = 'no';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'no', 'dt' => 0 ),
    array( 'db' => 'tanggal_masuk',  'dt' => 1 ),
    array( 'db' => 'id_barang',  'dt' => 2 ),
    array( 'db' => 'nama_barang',  'dt' => 3 ),
    array( 'db' => 'kategori',  'dt' => 4 ),
    array( 'db' => 'kondisi',  'dt' => 5 ),
    array( 'db' => 'harga_beli',  'dt' => 6 ),
    array( 'db' => 'harga_jual',  'dt' => 7 ),
    array( 'db' => 'jumlah_masuk',  'dt' => 8 ),
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'warehouse',
    'host' => '127.0.0.1'
    ,'charset' => 'utf8' // Depending on your PHP and MySQL config, you may need this
);

$output = array(
    'draw' => intval($_POST['draw']),
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $output)
);