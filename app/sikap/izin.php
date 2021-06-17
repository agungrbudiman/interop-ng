<?php
  $stmt = $conn->prepare("SELECT pe_nama,jenis_izin.izin_val, izin.* FROM pegawai join izin on pegawai.pe_id=izin.pe_id join jenis_izin on jenis_izin.id=izin.izin_id ORDER BY izin.id DESC");
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index">Home</a></li>
                    <li><a href="cuti">Izin</a></li>
                    <li class="active">Data Izin</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Data Izin</h3><br>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jenis</th>
                                            <th>Mulai</th>
                                            <th>Berakhir</th>
                                            <th>Durasi</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php foreach($result as $row) { ?>
                                          <tr>
                                            <td><?php echo $row['pe_nama']; ?></td>
                                            <td><?php echo $row['izin_val']; ?></td>
                                            <td><?php echo $row['start']; ?></td>
                                            <td><?php echo $row['end']; ?></td>
                                            <td><?php echo $row['durasi']; ?></td>
                                            <td><?php echo $row['keterangan']; ?></td>
                                          </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <a href="izin-add"><button type="button" class="btn btn-primary">Pengajuan Izin</button></a>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
