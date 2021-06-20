<?php
    if (isset($_GET['id']) && isset($_GET['status'])) {
        $id = $_GET['id'];
        $status = $_GET['status'];
        $stmt = $conn->prepare("UPDATE notifikasi SET status='$status' WHERE id=$id");
        $stmt->execute();
        header('location: ' . $_ENV['BASE_URL'] . $path[1] . '/inbox');
    }

    if (isset($_GET['nip'])) {
        $kategori = $_GET['kategori'];
        $nip = $_GET['nip'];
        $nama = $_GET['nama'];
        $keterangan = $_GET['keterangan'];
        $stmt = $conn->prepare("INSERT INTO notifikasi VALUES (0, ?, ?, ?, ?, DEFAULT)");
        $stmt->execute([$kategori, $nip, $nama, $keterangan]);
        exit();
    }
?>