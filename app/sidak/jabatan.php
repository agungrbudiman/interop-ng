        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Riwayat Jabatan</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index">Home</a></li>
                            <li><a href="data">Data Pegawai</a></li>
                            <li class="active">Riwayat Jabatan</li>
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
                                    $jb_jenis_instansi = $_POST['jenis-instansi'];
                                    $pa_id = $_POST['eselon'];
                                    $jb_nama_jabatan = $_POST['nama-jabatan'];
                                    $jb_nama_unit = $_POST['nama-unit'];
                                    $jb_status_jabatan = $_POST['status-jabatan'];
                                    $jb_tmt_golongan = $_POST['tmt-golongan'];
                                    $jb_no_sk_pengangkatan = $_POST['no-sk-pengangkatan'];
                                    $jb_tanggal_sk_pengangkatan = $_POST['tanggal-sk-pengangkatan'];
                                    $jb_tmt_pengangkatan = $_POST['tmt-pengangkatan'];
                                    $jb_aktif_jabatan = $_POST['aktif-jabatan'];
                                    $jb_no_sk_pemberhentian = $_POST['no-sk-pemberhentian'];
                                    $jb_tanggal_sk_pemberhentian = $_POST['tanggal-sk-pemberhentian'];
                                    $jb_tmt_pemberhentian = $_POST['tmt-pemberhentian'];

                                    $sql = "INSERT INTO jabatan VALUES (0, '$pe_id', '$jb_jenis_instansi', '$pa_id', '$jb_nama_jabatan', '$jb_nama_unit', '$jb_status_jabatan', '$jb_tmt_golongan', '$jb_no_sk_pengangkatan', '$jb_tanggal_sk_pengangkatan', '$jb_tmt_pengangkatan', '$jb_aktif_jabatan', '$jb_no_sk_pemberhentian', '$jb_tanggal_sk_pemberhentian', '$jb_tmt_pemberhentian')";
                                    $query = $conn->query($sql);
                                    if ($query) {
                                        echo "
                                        <div class='alert alert-success'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Success!</strong> Data is successfully added.
                                        </div>";
                                        http_request($_ENV['BASE_URL'] . 'gpp/api/?kategori=jabatan&nip=' . $peg->pe_nip . '&nama=' . $peg->pe_nama . '&keterangan=Penambahan data jabatan');
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
                                    $jb_id = $_POST['jb_id'];
                                    $jb_jenis_instansi = $_POST['jenis-instansi'];
                                    $pa_id = $_POST['eselon'];
                                    $jb_nama_jabatan = $_POST['nama-jabatan'];
                                    $jb_nama_unit = $_POST['nama-unit'];
                                    $jb_status_jabatan = $_POST['status-jabatan'];
                                    $jb_tmt_golongan = $_POST['tmt-golongan'];
                                    $jb_no_sk_pengangkatan = $_POST['no-sk-pengangkatan'];
                                    $jb_tanggal_sk_pengangkatan = $_POST['tanggal-sk-pengangkatan'];
                                    $jb_tmt_pengangkatan = $_POST['tmt-pengangkatan'];
                                    $jb_aktif_jabatan = $_POST['aktif-jabatan'];
                                    $jb_no_sk_pemberhentian = $_POST['no-sk-pemberhentian'];
                                    $jb_tanggal_sk_pemberhentian = $_POST['tanggal-sk-pemberhentian'];
                                    $jb_tmt_pemberhentian = $_POST['tmt-pemberhentian'];

                                    $sql = "UPDATE jabatan SET jb_jenis_instansi='$jb_jenis_instansi', pa_id='$pa_id', jb_nama_jabatan='$jb_nama_jabatan', jb_nama_unit='$jb_nama_unit', jb_status_jabatan='$jb_status_jabatan', jb_tmt_golongan='$jb_tmt_golongan', jb_no_sk_pengangkatan='$jb_no_sk_pengangkatan', jb_tanggal_sk_pengangkatan='$jb_tanggal_sk_pengangkatan', jb_tmt_pengangkatan='$jb_tmt_pengangkatan', jb_aktif_jabatan='$jb_aktif_jabatan', jb_no_sk_pemberhentian='$jb_no_sk_pemberhentian', jb_tanggal_sk_pemberhentian='$jb_tanggal_sk_pemberhentian', jb_tmt_pemberhentian='$jb_tmt_pemberhentian' WHERE jb_id='$jb_id'";
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
                                    $jb_id = $_POST['jb_id'];
                                    $sql = "DELETE FROM jabatan WHERE jb_id='$jb_id'";
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
                            <a href="jabatan-add/<?php echo $id ?>" class="btn btn-default pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus-square fa-fw" aria-hidden="true"></i> Add Data</a>
                            <p class="text-muted">Pada halaman ini anda dapat mengelola data riwayat jabatan setiap pegawai.</p><br>			
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Jenis Instansi</th>
                                            <th>Eselon</th>
                                            <th>Nama Jabatan</th>
                                            <th>Nama Unit</th>
                                            <th>Status Jabatan</th>
                                            <th>TMT Golongan</th>
                                            <th>Nomor SK Pengangkatan</th>
                                            <th>Tanggal SK Pengangkatan</th>
                                            <th>TMT Pengangkatan</th>
                                            <th>Aktif Jabatan</th>
                                            <th>Nomor SK Pemberhentian</th>
                                            <th>Tanggal SK Pemberhentian</th>
                                            <th>TMT Pemberhentian</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM jabatan JOIN pangkat USING(pa_id) WHERE pe_id='$id'";
                                            $query = $conn->query($sql);
                                            $check = $query->rowCount();
                                            if ($check >= 1) {
                                                while($data = $query->fetch(PDO::FETCH_OBJ)){
                                                    echo '
                                                    <tr>
                                                    <td>'.$data->jb_jenis_instansi.'</td>
                                                    <td>'.substr($data->pa_keterangan,0,5).'</td>
                                                    <td>'.$data->jb_nama_jabatan.'</td>
                                                    <td>'.$data->jb_nama_unit.'</td>
                                                    <td>'.$data->jb_status_jabatan.'</td>
                                                    <td>'.date("d/m/Y", strtotime($data->jb_tmt_golongan)).'</td>
                                                    <td>'.$data->jb_no_sk_pengangkatan.'</td>
                                                    <td>'.date("d/m/Y", strtotime($data->jb_tanggal_sk_pengangkatan)).'</td>
                                                    <td>'.date("d/m/Y", strtotime($data->jb_tmt_pengangkatan)).'</td>
                                                    <td>'.$data->jb_aktif_jabatan.'</td>
                                                    <td>'.$data->jb_no_sk_pemberhentian.'</td>
                                                    <td>'.date("d/m/Y", strtotime($data->jb_tanggal_sk_pemberhentian)).'</td>
                                                    <td>'.date("d/m/Y", strtotime($data->jb_tmt_pemberhentian)).'</td>
                                                    <td>
                                                        <a href="jabatan-edit/'.$data->jb_id.'" class="btn btn-default waves-effect waves-light"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                                                    </td>
                                                    </tr>';
                                                }
                                            }
                                            else{
                                                echo "
                                                <tr>
                                                <td colspan='12' style='text-align:center;'>Table is empty</td>
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

