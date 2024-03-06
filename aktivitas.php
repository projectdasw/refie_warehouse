<table id="track-add">
    <h1 style="margin: 0 0 1em 0; border-bottom: 1px solid #000;">
        Track Record Aktivitas
    </h1>
    <thead>
        <tr>
            <th hidden></th>
            <th>Hari/Tanggal</th>
            <th>User</th>
            <th>Aktivitas</th>
        </tr>
    </thead>
    <tbody>
    <?php
            $query = "select * from aktivitas";
            $sql = mysqli_query($conn, $query);
            $no = 0;

            while($result = mysqli_fetch_assoc($sql)){
                $tgl_akt = $result['tanggal_aktivitas'];
                $user_akt = $result['user'];
                $ket_akt = $result['keterangan'];
        ?>
        <tr>
            <td hidden><?php echo ++$no; ?></td>
            <td><?php echo $tgl_akt; ?></td>
            <td><?php echo $user_akt; ?></td>
            <td><?php echo $ket_akt; ?></td>
        </tr>
        <?php
            }
            mysqli_free_result($sql);
            mysqli_close($conn);
        ?>
    </tbody>
</table>