        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Riwayat Pendidikan</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index">Home</a></li>
                            <li><a href="data">Data Pegawai</a></li>
                            <li class="active">Riwayat Pendidikan</li>
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
                                    $tp_id = $_POST['jenjang'];
                                    $rp_negara = $_POST['negara'];
                                    $rp_sekolah = $_POST['sekolah'];
                                    $rp_tahun_lulus = $_POST['tahun-lulus'];
                                    $rp_no_ijazah = $_POST['no-ijazah'];
                                    $rp_jurusan = $_POST['jurusan'];
                                    $rp_bidang = $_POST['bidang'];
                                    $rp_gelar = $_POST['gelar'];
                                    $rp_bkn = $_POST['bkn'];

                                    $sql = "INSERT INTO riwayat_pendidikan VALUES (0, '$pe_id', '$tp_id', '$rp_negara', '$rp_sekolah', '$rp_tahun_lulus', '$rp_no_ijazah', '$rp_jurusan', '$rp_bidang', '$rp_gelar', '$rp_bkn')";
                                    $query = $conn->query($sql);
                                    if ($query) {
                                        echo "
                                        <div class='alert alert-success'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Success!</strong> Data is successfully added.
                                        </div>";
                                        http_request($_ENV['BASE_URL'] . 'gpp/api/?kategori=pendidikan&nip=' . $peg->pe_nip . '&nama=' . $peg->pe_nama . '&keterangan=Penambahan data pendidikan');
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
                                    $rp_id = $_POST['rp_id'];
                                    $tp_id = $_POST['jenjang'];
                                    $rp_negara = $_POST['negara'];
                                    $rp_sekolah = $_POST['sekolah'];
                                    $rp_tahun_lulus = $_POST['tahun-lulus'];
                                    $rp_no_ijazah = $_POST['no-ijazah'];
                                    $rp_jurusan = $_POST['jurusan'];
                                    $rp_bidang = $_POST['bidang'];
                                    $rp_gelar = $_POST['gelar'];
                                    $rp_bkn = $_POST['bkn'];

                                    $sql = "UPDATE riwayat_pendidikan SET tp_id='$tp_id', rp_negara='$rp_negara', rp_sekolah='$rp_sekolah', rp_tahun_lulus='$rp_tahun_lulus', rp_no_ijazah='$rp_no_ijazah', rp_jurusan='$rp_jurusan', rp_bidang='$rp_bidang', rp_gelar='$rp_gelar', rp_bkn='$rp_bkn' WHERE rp_id='$rp_id'";
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
                                    $rp_id = $_POST['rp_id'];
                                    $sql = "DELETE FROM riwayat_pendidikan WHERE rp_id='$rp_id'";
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
                            <a href="pendidikan-add/<?php echo $id ?>" class="btn btn-default pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus-square fa-fw" aria-hidden="true"></i> Add Data</a>
                            <p class="text-muted">Pada halaman ini anda dapat mengelola riwayat pendidikan setiap pegawai.</p><br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tingat pendidikan</th>
                                            <th>Negara</th>
                                            <th>Sekolah</th>
                                            <th>Tahun Lulus</th>
                                            <th>No Ijazah</th>
                                            <th>Jurusan</th>
                                            <th>Bidang</th>
                                            <th>Gelar</th>
                                            <th>Diakui BKN</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM riwayat_pendidikan JOIN tingkat_pendidikan USING(tp_id) WHERE pe_id='$id' ORDER BY tp_id";
                                            $query = $conn->query($sql);
                                            $check = $query->rowCount();
                                            if ($check >= 1) {
                                                while($data = $query->fetch(PDO::FETCH_OBJ)){
                                                    echo '
                                                    <tr>
                                                    <td>'.$data->tp_id.'</td>
                                                    <td>'.$data->tp_jenjang.'</td>
                                                    <td>'.$data->rp_negara.'</td>
                                                    <td>'.$data->rp_sekolah.'</td>
                                                    <td>'.$data->rp_tahun_lulus.'</td>
                                                    <td>'.$data->rp_no_ijazah.'</td>
                                                    <td>'.$data->rp_jurusan.'</td>
                                                    <td>'.$data->rp_bidang.'</td>
                                                    <td>'.$data->rp_gelar.'</td>
                                                    <td>'.$data->rp_bkn.'</td>
                                                    <td>
                                                        <a href="pendidikan-edit/'.$data->rp_id.'" class="btn btn-default waves-effect waves-light"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                                                    </td>
                                                    </tr>';
                                                }
                                            }
                                            else{
                                                echo "
                                                <tr>
                                                <td colspan='11' style='text-align:center;'>Table is empty</td>
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

