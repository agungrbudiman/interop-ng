<?php
    if (isset($_GET['id']) && isset($_GET['status'])) {
        $id = $_GET['id'];
        $status = $_GET['status'];
        $stmt = $conn->prepare("UPDATE notifikasi SET status=? WHERE id=?");
        $stmt->execute([$status, $id]);
        header('location: ' . $_ENV['BASE_URL'] . $path[1] . '/inbox');
    }

    if (isset($_GET['kategori']) && isset($_GET['nip']) && $_GET['nama'] && $_GET['keterangan']) {
        $kategori = $_GET['kategori'];
        $nip = $_GET['nip'];
        $nama = $_GET['nama'];
        $keterangan = $_GET['keterangan'];
        $stmt = $conn->prepare("INSERT INTO notifikasi VALUES (0, ?, ?, ?, ?, DEFAULT)");
        $stmt->execute([$kategori, $nip, $nama, $keterangan]);
        exit();
    }
?>