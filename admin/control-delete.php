<?php
require_once ('koneksi.php');

if (isset($_GET['modul'])) {
    $modul = $_GET['modul'];
} else {
    $modul = "";
}


if($modul == 'delete') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    $sql1       = "update purbalingga set SD = 0, SMP = 0, SMA = 0, SMK = 0, SLB = 0 where id = :id";
    $q1         = oci_parse($conn, $sql1);
    oci_bind_by_name($q1, ":id", $id);
    oci_execute($q1, OCI_COMMIT_ON_SUCCESS);
}
ini_set('display_errors', 1);    

}  header ('location: tabel.php'); 
    ?>