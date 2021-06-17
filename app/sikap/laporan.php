        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================test================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Laporan</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index">Home</a></li>
                            <li class="active">Laporan</li>
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
                                          <th class="align-middle" rowspan="2">Nama</th>
                                          <th class="align-middle" rowspan="2">Jumlah Hadir</th>
                                          <th class="text-center" colspan="5">Jumlah Tidak Hadir</th>
                                          <th class="text-center" colspan="4">Jam Kerja</th>
                                          <th class="align-middle" rowspan="2">Kinerja</th>
                                        </tr>
                                        <tr>
                                          <td>Cuti</td>
                                          <td>Izin</td>
                                          <td>Sakit</td>
                                          <td>Tugas</td>
                                          <td>Absen</td>
                                          <td>Total</td>
                                          <td>Selisih</td>
                                          <td>Lembur</td>
                                          <td>Persentasi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $pegawai = $conn->query("SELECT pegawai.pe_id, pegawai.pe_nama FROM pegawai");
                                        while($row = $pegawai->fetch()) {
                                          $kehadiran = $conn->query("SELECT count(*) as count FROM kehadiran where pe_id=" . $row['pe_id'])->fetch();
                                          $izin = $conn->query("SELECT count(*) as count FROM izin where pe_id=" . $row['pe_id'])->fetch();
                                          $cuti = $conn->query("SELECT count(*) as count FROM cuti where pe_id=" . $row['pe_id'])->fetch();
                                        ?>
                                          <tr>
                                            <td><?php echo $row['pe_nama']; ?></td>
                                            <td><?php echo $kehadiran['count']; ?></td>
                                            <td><?php echo $izin['count']; ?></td>
                                            <td><?php echo $cuti['count']; ?></td>
                                            <td>0</td>
                                            <td>0</td>  
                                            <td>0</td>  
                                            <td>0</td>  
                                            <td>0</td>  
                                            <td>0</td>  
                                            <td>0</td>  
                                            <td>0</td>  
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

