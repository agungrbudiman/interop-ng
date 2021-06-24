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
                            <li><a href=".">Home</a></li>
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
                                          <th class="text-center" colspan="3">Jumlah Tidak Hadir</th>
                                          <th class="text-center" colspan="3">Jam Kerja</th>
                                          <th class="align-middle" rowspan="2">Kinerja</th>
                                        </tr>
                                        <tr>
                                          <td>Cuti</td>
                                          <td>Izin</td>
                                          <td>Absen</td>
                                          <td>Total</td>
                                          <td>Selisih</td>
                                          <td>Persentasi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $conn->prepare("
                                            SELECT pegawai.pe_id, pegawai.pe_nama,
                                                count(distinct(kehadiran.id)) as kehadiran,
                                                round(coalesce((sum(cuti.durasi)*count(distinct(cuti.cuti_id))/count(*)),0)) as cuti,
                                                round(coalesce((sum(izin.durasi)*count(distinct(izin.izin_id))/count(*)),0)) as izin,
                                                round(coalesce((sum(timestampdiff(minute,kehadiran.jam_masuk,kehadiran.jam_keluar))*count(distinct(kehadiran.id))/count(*)/60),0)) as jam_kerja
                                            FROM pegawai LEFT JOIN kehadiran ON pegawai.pe_id=kehadiran.pe_id
                                                LEFT JOIN cuti ON pegawai.pe_id=cuti.pe_id
                                                LEFT JOIN izin ON pegawai.pe_id=izin.pe_id
                                            GROUP BY pegawai.pe_id  
                                        ");
                                        $stmt->execute();
                                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($result as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['pe_nama']; ?></td>
                                            <td><?php echo $row['kehadiran']; ?></td>
                                            <td><?php echo $row['cuti']; ?></td>
                                            <td><?php echo $row['izin']; ?></td>
                                            <td><?php echo 20-$row['kehadiran']; ?></td> <!-- asumsi sebulan 20 hari kerja -->
                                            <td><?php echo $row['jam_kerja']; ?></td>  <!-- konversi menit ke jam -->
                                            <td><?php echo $row['jam_kerja']-170; ?></td>  <!-- asumsi sebulan 170 jam kerja -->
                                            <td>0</td>  
                                            <td>0</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="http://localhost:8000/api/laporan/export"><strong>Unduh Laporan</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->

