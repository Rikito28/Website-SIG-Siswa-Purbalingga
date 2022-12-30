<?php
require_once('koneksi.php');
if (isset($_POST['simpan'])) { //untuk create
    $id         = $_POST['id'];
    $kecamatan  = $_POST['kecamatan'];
    $sd         = $_POST['sd'];
    $smp        = $_POST['smp'];
    $sma        = $_POST['sma'];
    $smk        = $_POST['smk'];
    $slb        = $_POST['slb'];

        $sql1       = "update purbalingga set SD = '$sd' ,SMP = '$smp' ,SMA = '$sma' ,SMK = '$smk' ,SLB = '$slb' where ID = '$id'";
        $q1         = oci_parse($conn, $sql1);
        // Jalankan query
        $result = oci_execute($q1,OCI_DEFAULT);
        oci_commit($conn);
    } 
    header ('location: tabel.php');

        ?>