<?php
try {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST["add-cuti"])) {
		    $pe_id = $_POST['pegawai'];
		    $cuti_id = $_POST['cuti_id'];
		    $durasi = $_POST['durasi'];
		    $start = $_POST['mulai'];
		    $end = $_POST['berakhir'];
		    $alamat = $_POST['alamat'];
		    $keterangan = $_POST['keterangan'];
		    $stmt = $conn->prepare("INSERT into cuti values ('0', ?, ?, '0', ?, ?, ?, ?, ?)");
	    	$stmt->execute([$pe_id, $cuti_id, $durasi, $start, $end, $alamat, $keterangan]);
	    	exit();
		}

		if (isset($_POST["add-kategoricuti"])) {
			$kategori = $_POST['kategori'];
	    	$stmt = $conn->prepare("INSERT into jenis_cuti values ('0', ?)");
	    	$stmt->execute([$kategori]);

	    	$stmt = $conn->prepare("SELECT * from jenis_cuti ORDER BY id DESC");
			$stmt->execute();
			$kategori = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach($kategori as $row) { ?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row['cuti_val']; ?></option>
			<?php }
			exit();
		}

		if (isset($_POST["add-izin"])) {
		    $pe_id = $_POST['pegawai'];
		    $izin_id = $_POST['izin_id'];
		    $durasi = $_POST['durasi'];
		    $start = $_POST['mulai'];
		    $end = $_POST['berakhir'];
		    $keterangan = $_POST['keterangan'];
		    $stmt = $conn->prepare("INSERT into izin values ('0', ?, ?, ?, ?, ?, ?)");
	    	$stmt->execute([$pe_id, $izin_id, $durasi, $start, $end, $keterangan]);
	    	exit();
		}

		if (isset($_POST["add-kategoriizin"])) {
			$kategori = $_POST['kategori'];
	    	$stmt = $conn->prepare("INSERT into jenis_izin values ('0', ?)");
	    	$stmt->execute([$kategori]);

	    	$stmt = $conn->prepare("SELECT * from jenis_izin ORDER BY id DESC");
			$stmt->execute();
			$kategori = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach($kategori as $row) { ?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row['izin_val']; ?></option>
			<?php }
			exit();
		}
		http_response_code(400);
	}
	else {
		http_response_code(400);
	}
}
catch (Exception $e){
	http_response_code(500);
	echo $e;
}
?>