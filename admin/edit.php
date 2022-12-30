?<?php
include ('koneksi.php');
$id         = "";
$kecamatan  = "";
$sd 		= "";
$smp	 	= "";
$sma	 	= "";
$smk	 	= "";
$slb	 	= "";


if (isset($_GET['modul'])) {
    $modul = $_GET['modul'];
} else {
    $modul = "";
}


//Fungsi Edit//
if ($modul == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select kecamatan, sd, smp, sma, smk, slb from purbalingga where id = '$id'";
    $q1         = oci_parse($conn, $sql1);
    oci_execute($q1);
    $row = oci_fetch_array($q1, OCI_ASSOC+OCI_RETURN_NULLS);
    if (is_array($row)) {
      $kecamatan = $row['KECAMATAN'];
      $sd = $row['SD'];
      $smp = $row['SMP'];
      $sma = $row['SMA'];
      $smk = $row['SMK'];
      $slb = $row['SLB'];
    }
    if ($id == '') {
        $error = "Data tidak ditemukan";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
		<!--Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
		<link rel="stylesheet" href="/percob/style.css" />
		<link rel="stylesheet" href="/percob/style768.css"/>
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
		
		<title>SIG Purbalingga</title>
</head>

<body>
	<div class="main-container d-flex justify-content-between">
		<!-- Buat Side Bar Kiri-->
		<div class="sidebar" id="side_nav">
			<div class="header-box px-2 pt-3 pb-4 d-flex">
				<h1 class="fs-2"><span class="bg-white text-dark rounded shadow px-2 me-2">SIG</span> <span class="text-white">KABUPATEN PURBALINGGA</span></h1>
			</div>

			<ul class="list-unstyled px-2">
				<li class=""><a href="index.html" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-home"></i>Beranda</a></li>
				<li class=""><a href="peta-sd.html" class="text-decoration-none px-3 py-2 d-block"><i class="fad fa-school"></i>Peta Siswa SD</a></li>
				<li class=""><a href="peta_smp.html" class="text-decoration-none px-3 py-2 d-block"><i class="fad fa-school"></i>Peta Siswa SMP</a></li>
				<li class=""><a href="peta_sma.html" class="text-decoration-none px-3 py-2 d-block"><i class="fad fa-school"></i>Peta Siswa SMA</a></li>
				<li class=""><a href="peta-smk.html" class="text-decoration-none px-3 py-2 d-block"><i class="fad fa-school"></i>Peta Siswa SMK</a></li>
				<li class=""><a href="peta-slb" class="text-decoration-none px-3 py-2 d-block"><i class="fad fa-school"></i>Peta Siswa SLB</a></li>
                <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-user-edit"></i>Tabel Data</a></li>
			</ul>

		</div>
		<div class="content">
			<!--buat navigasi Bar-->
			<nav class="navbar navbar-expand-md navbar-dark ">
				<div class="container-fluid">

					<div class=" d-md-none d-block">

						<button class="btn px-1 py-0 open-btn me-2"><i class="far fa-stream"></i></button>
				  <a class="navbar-brand fs-4" href="#"><span class="bg-dark rounded px-2 py-0 text-white">PURBALINGGA</span></a>
				</div>
				  <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<i class="far fa-bars"></i>
				  </button>
				  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
					<ul class="navbar-nav mb-2 mb-lg-0 ">
					  <a class="nav-item"><a class="nav-link " aria-current="page" href="#">Profile</a></a>
					  <a href="/percob/index.html" class="btn btn-outline-danger mr-3 " style="color : white">Log out</a>
					</ul>
				  </div>
				</div>
			  </nav>

		<div class="dashboard">
			<h3 style="text-align: center; font-weight: bold;">Tabel Edit Data Siswa Pada Kabupaten Purbalingga</h3>
			<h4 style="text-align: center; font-weight: bold;">Per Oktober 2022 (Semester Ganjil)</h3>
			  </div>

				<!--MULAI-->
					<div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div style="color: #025147; font-weight: bold; font-family: Futura, Trebuchet MS, Arial, sans-serif; " class="card-header">
                EDIT DATA
            </div>
            <div class="card-body">
                <form action="control.php" method="POST">
                <div class="mb-3 row">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ID" name="id" value="<?php echo $id ?>" readonly>
                        </div>
                    </div>
				<div class="mb-3 row">
                        <label for="kecamatan" class="col-sm-2 col-form-label">KECAMATAN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kecamatan" name="KECAMATAN" value="<?php echo $kecamatan ?>" readonly>
                        </div>
                    </div>
					<div class="mb-3 row">
                        <label for="sd" class="col-sm-2 col-form-label">SD</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sd" name="sd" value="<?php echo $sd ?>">
                        </div>
                    </div>
					<div class="mb-3 row">
                        <label for="sd" class="col-sm-2 col-form-label">SMP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="smp" name="smp" value="<?php echo $smp ?>">
                        </div>
                    </div>
					<div class="mb-3 row">
                        <label for="sma" class="col-sm-2 col-form-label">SMA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sma" name="sma" value="<?php echo $sma ?>">
                        </div>
                    </div>
					<div class="mb-3 row">
                        <label for="smk" class="col-sm-2 col-form-label">SMK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="smk" name="smk" value="<?php echo $smk ?>">
                        </div>
                    </div>
					<div class="mb-3 row">
                        <label for="slb" class="col-sm-2 col-form-label">SLB</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slb" name="slb" value="<?php echo $slb ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input style="margin-top: 1rem; margin-left: 22rem;" type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
				<!--selesai-->

		</div>
	</div>

        <!-- Script JavaScript-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<script>
			/*Membuat Jquery Listener pada Side Bar*/
			$(".sidebar ul li").on('click' , function(){
				$(".sidebar ul li.active").removeClass('active');
				$(this).addClass('active');
		});
            /*Selesai*/
            
            /*Membuat navbar tetap pada posisi*/
            window.onscroll = function() {
            var navbar = document.querySelector('.navbar');
            if (window.pageYOffset > 0) {
            navbar.classList.add('sticky');
            } else {
            navbar.classList.remove('sticky');
            }
        };
            /*Selesai*/

		</script>
</body>

</html>