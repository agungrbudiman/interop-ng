        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Kepangkatan</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index">Home</a></li>
                            <li><a href="data">Data Pegawai</a></li>
                            <li class="active">Riwayat Kepangkatan</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?php 
                            
                            if (isset($path[3])) {
                                $id = $path[3];
                                $peg_sql = "SELECT * FROM pegawai JOIN pangkat USING(pa_id) WHERE pe_id='$id'";
                                $peg_query = $conn->query($peg_sql);
                                $peg = $peg_query->fetch(PDO::FETCH_OBJ);
                            }
                            elseif(isset($_POST['pe_id'])){
                                $id = $_POST['pe_id'];
                                $peg_sql = "SELECT * FROM pegawai JOIN pangkat USING(pa_id) WHERE pe_id='$id'";
                                $peg_query = $conn->query($peg_sql);
                                $peg = $peg_query->fetch(PDO::FETCH_OBJ);

                                if (isset($_POST['add'])) {
                                    $pe_id = $_POST['pe_id'];
                                    $jp_id = $_POST['jenis-kepangkatan'];
                                    $kp_no_sk = $_POST['no-sk'];
                                    $kp_oleh = $_POST['oleh'];
                                    $kp_tanggal_sk = $_POST['tanggal-sk'];
                                    $tp_id = $_POST['pendidikan'];
                                    $pa_id = $_POST['golongan'];
                                    $kp_tmt_golongan = $_POST['tmt-golongan'];
                                    $kp_tahun_masa_kerja = $_POST['tahun-masa-kerja'];
                                    $kp_bulan_masa_kerja = $_POST['bulan-masa-kerja'];
                                    $kp_no_bkn = $_POST['no-bkn'];
                                    $kp_tanggal_bkn = $_POST['tanggal-bkn'];
                                    $kp_gaji = $_POST['gaji'];

                                    $sql = "INSERT INTO kepangkatan VALUES (0, '$pe_id', '$jp_id', '$kp_no_sk', '$kp_oleh', '$kp_tanggal_sk', '$tp_id', '$pa_id', '$kp_tmt_golongan', '$kp_tahun_masa_kerja', '$kp_bulan_masa_kerja', '$kp_no_bkn', '$kp_tanggal_bkn', '$kp_gaji')";
                                    $query = $conn->query($sql);
                                    if ($query) {
                                        echo <<<HTML
                                        <div class='alert alert-success'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Success!</strong> Data is successfully added.<br>
                                            Pengajuan anda telah diterima, silahkan <a href="../../nota-dinas.pdf">unduh</a> nota dinas.
                                        </div>
                                        HTML;
                                        http_request($_ENV['BASE_URL'] . 'gpp/api/?kategori=pangkat&nip=' . $peg->pe_nip . '&nama=' . $peg->pe_nama . '&keterangan=Penambahan data pangkat');
                                    }
                                    else{
                                        echo "
                                        <div class='alert alert-danger'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Failed!</strong> Data is failed to add.
                                        </div>";
                                    }
                                }
                                elseif (isset($_POST['edit'])) {
                                    $kp_id = $_POST['kp_id'];
                                    $jp_id = $_POST['jenis-kepangkatan'];
                                    $kp_no_sk = $_POST['no-sk'];
                                    $kp_oleh = $_POST['oleh'];
                                    $kp_tanggal_sk = $_POST['tanggal-sk'];
                                    $tp_id = $_POST['pendidikan'];
                                    $pa_id = $_POST['golongan'];
                                    $kp_tmt_golongan = $_POST['tmt-golongan'];
                                    $kp_tahun_masa_kerja = $_POST['tahun-masa-kerja'];
                                    $kp_bulan_masa_kerja = $_POST['bulan-masa-kerja'];
                                    $kp_no_bkn = $_POST['no-bkn'];
                                    $kp_tanggal_bkn = $_POST['tanggal-bkn'];
                                    $kp_gaji = $_POST['gaji'];

                                    $sql = "UPDATE kepangkatan SET jp_id='$jp_id', kp_no_sk='$kp_no_sk', kp_oleh='$kp_oleh', kp_tanggal_sk='$kp_tanggal_sk', tp_id='$tp_id', pa_id='$pa_id', kp_tmt_golongan='$kp_tmt_golongan', kp_tahun_masa_kerja='$kp_tahun_masa_kerja', kp_bulan_masa_kerja='$kp_bulan_masa_kerja', kp_no_bkn='$kp_no_bkn', kp_tanggal_bkn='$kp_tanggal_bkn', kp_gaji='$kp_gaji' WHERE kp_id='$kp_id'";
                                    $query = $conn->query($sql);
                                    if ($query) {
                                        echo "
                                        <div class='alert alert-success'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Success!</strong> Data is successfully edited.
                                        </div>";
                                    }
                                    else{
                                        echo "
                                        <div class='alert alert-danger'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Failed!</strong> Data is failed to edit.
                                        </div>";
                                    }
                                }
                                elseif (isset($_POST['delete'])) {
                                    $kp_id = $_POST['kp_id'];
                                    $sql = "DELETE FROM kepangkatan WHERE kp_id='$kp_id'";
                                    $query = $conn->query($sql);
                                    if ($query) {
                                        echo "
                                        <div class='alert alert-success'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Success!</strong> Data is successfully deleted.
                                        </div>";
                                    }
                                    else{
                                        echo "
                                        <div class='alert alert-danger'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Failed!</strong> Data is failed to delete.
                                        </div>";
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="white-box">
                            <form>
                                <div class="form-group">
                                    <label class="col-sm-3">NIP</label>
                                    <div class="col-sm-9"><input type="text" name="nip" class="form-control" value="<?php echo $peg->pe_nip; ?>" disabled></div>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3">Nama</label>
                                    <div class="col-sm-9"><input type="text" name="nama" class="form-control" value="<?php echo $peg->pe_nama; ?>" disabled></div>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3">Pangkat dan Golongan Ruang</label>
                                    <div class="col-sm-9"><input type="text" name="pangkat" class="form-control" value="<?php echo $peg->pa_keterangan; ?>" disabled></div>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <a href="kepangkatan-add/<?php echo $id ?>" class="btn btn-default pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus-square fa-fw" aria-hidden="true"></i> Add Data</a>
                            <p class="text-muted">Pada halaman ini anda dapat mengelola data riwayat kepangkatan setiap pegawai.</p><br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Jenis Kepangkatan</th>
                                            <th>Nomor SK</th>
                                            <th>Oleh</th>
                                            <th>Tanggal SK</th>
                                            <th>Pendidikan</th>
                                            <th>Golongan</th>
                                            <th>TMT Golongan</th>
                                            <th>Tahun Masa Kerja</th>
                                            <th>Bulan Masa Kerja</th>
                                            <th>No BKN</th>
                                            <th>Tanggal BKN</th>
                                            <th>Gaji Pokok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM kepangkatan JOIN jenis_kepangkatan USING(jp_id) JOIN tingkat_pendidikan USING(tp_id) JOIN pangkat USING(pa_id) WHERE pe_id='$id'";
                                            $query = $conn->query($sql);
                                            $check = $query->rowCount();
                                            if ($check >= 1) {
                                                while($data = $query->fetch(PDO::FETCH_OBJ)){
                                                    echo '
                                                    <tr>
                                                    <td>'.$data->jp_keterangan.'</td>
                                                    <td>'.$data->kp_no_sk.'</td>
                                                    <td>'.$data->kp_oleh.'</td>
                                                    <td>'.date("d/m/Y", strtotime($data->kp_tanggal_sk)).'</td>
                                                    <td>'.$data->tp_jenjang.'</td>
                                                    <td>'.$data->pa_keterangan.'</td>
                                                    <td>'.date("d/m/Y", strtotime($data->kp_tmt_golongan)).'</td>
                                                    <td>'.$data->kp_tahun_masa_kerja.' tahun</td>
                                                    <td>'.$data->kp_bulan_masa_kerja.' bulan</td>
                                                    <td>'.$data->kp_no_bkn.'</td>
                                                    <td>'.date("d/m/Y", strtotime($data->kp_tanggal_bkn)).'</td>
                                                    <td>'.$data->kp_gaji.'</td>
                                                    <td>
                                                        <a href="kepangkatan-edit/'.$data->kp_id.'" class="btn btn-default waves-effect waves-light"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                                                    </td>
                                                    </tr>';
                                                }
                                            }
                                            else{
                                                echo "
                                                <tr>
                                                <td colspan='8' style='text-align:center;'>Table is empty</td>
                                                </tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table><br><br><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->

