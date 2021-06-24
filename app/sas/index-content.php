        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3>Hello, <?php echo $_SESSION[$path[1] . 'us_username'];?>! &nbsp;Selamat datang di Sistem Aplikasi Satker.</h3>
                            <div class="comment-center p-t-10">
                                <div class="comment-body b-none">
                                    <div class="mail-contnet">
                                        <h5>Perbaruan Data Kehadiran Bulan Juni</h5>
                                        <span class="time">30 Juni 2021 / 10:20 AM</span> 
                                        <span class="label label-rouded label-warning">PENDING</span>
                                        <br/>
                                        <div><span class="mail-desc">Informasi kehadiran dapat dilihat di <button type="button" class="btn btn-link" aria-label="Left Align" style="padding-left: 0;" data-toggle="modal" data-target="#kehadiran">sini</button></div>
                                        <a href="" class="btn btn btn-rounded btn-default btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Approve</a>
                                        <a href="" class="btn-rounded btn btn-default btn-outline"><i class="ti-close text-danger m-r-5"></i>Reject</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->

<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="kehadiran">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <label>Kehadiran Bulan Juni</label>
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
                            $data = http_request("http://localhost:8000/api/laporan");
                            $result = json_decode($data, TRUE);
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
            </div>
            <div class="modal-footer">
                <button id="btn-tutup" type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>