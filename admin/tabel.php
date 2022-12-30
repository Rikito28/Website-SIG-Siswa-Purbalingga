?<?php
include ('koneksi.php');
$id         = "";
$kecamatan  = "";
$sd 		= "";
$smp	 	= "";
$sma	 	= "";
$smk	 	= "";
$slb	 	= "";
$sukses     = "";
$error      = "";
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
				<li class=""><a href="peta-slb.html" class="text-decoration-none px-3 py-2 d-block"><i class="fad fa-school"></i>Peta Siswa SLB</a></li>
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
			<h3 style="text-align: center; font-weight: bold;">Tabel Data Siswa Pada Kabupaten Purbalingga</h3>
			<h4 style="text-align: center; font-weight: bold;">Per Oktober 2022 (Semester Ganjil)</h3>
			  </div>

			  <!--Buat Tabel-->
			  <table style="margin-top: 3rem;" class="table table-striped">
				<thead class="tabel">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">KECAMATAN</th>
						<th scope="col">SD</th>
						<th scope="col">SMP</th>
						<th scope="col">SMA</th>
						<th scope="col">SMK</th>
						<th scope="col">SLB</th>
						<th scope="col"></th>
					  </tr>
					</thead>
					<!--Selesai Tabel-->
					<?php
					include ('koneksi.php');
					$query = 'select ID, KECAMATAN, sd, SMP, SMA, SMK, SLB from purbalingga';
					oci_commit($conn);
					$stid = oci_parse($conn, $query);
					oci_execute($stid);
					while($row = oci_fetch_array($stid,OCI_DEFAULT)) { ?>
							  <tr>
								<td class="table-danger"><?php echo $row['ID']; ?></td> 
								<td class="table-primary"><?php echo $row['KECAMATAN']; ?></td>
								<td class="table-primary"><?php echo $row['SD']; ?></td>
								<td class="table-primary"><?php echo $row['SMP']; ?></td>
								<td class="table-primary"><?php echo $row['SMA']; ?></td>
								<td class="table-primary"><?php echo $row['SMK']; ?></td>
								<td class="table-primary"><?php echo $row['SLB']; ?></td>
								<td class="table-primary">
								<a href="edit.php?modul=edit&id=<?php echo $row['ID']; ?>"><i class="fas fa-edit"></i></a>
								<a href="control-delete.php?modul=delete&id=<?php echo $row['ID']; ?>" onclick="return confirm('Yakin Menghapus Data?')"><i class="fas fa-trash"></i></a>
								</td>
							  </tr>
							  <?php } ?>
			  </table>			
			  <!--Selesai Koneksi-->
		</div>
	</div>


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