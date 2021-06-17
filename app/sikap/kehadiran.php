<?php
  $stmt = $conn->prepare("SELECT pe_nama, kehadiran.* FROM kehadiran JOIN pegawai on kehadiran.pe_id=pegawai.pe_id ORDER BY kehadiran.id");
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================test================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Kehadiran</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href=".">Home</a></li>
                            <li class="active">Kehadiran</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Masuk</th>
                                            <th>Keluar</th>
											<th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($result as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['pe_nama']; ?></td>
                                            <td><?php echo $row['tanggal']; ?></td>
                                            <td><?php echo $row['jam_masuk']; ?></td>
                                            <td><?php echo $row['jam_keluar']; ?></td>
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
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->

