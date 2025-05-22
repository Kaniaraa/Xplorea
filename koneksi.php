<?php

	//membuat koneksi ke basis data
	$koneksi = mysqli_connect("localhost", "root", "", "xplorea");

	//mengecek apakah koneksi basis data gagal
	if (!$koneksi) {
		echo "
			<script>alert('Koneksi Database Gagal!');</script>
		";
        die("Koneksi gagal: " . mysqli_connect_error());

	}

?>