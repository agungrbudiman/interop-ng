        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Data Keluarga</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index">Home</a></li>
                            <li><a href="data">Data Pegawai</a></li>
                            <li class="active">Data Keluarga</li>
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
                                    $ke_nama = $_POST['nama-kel'];
                                    $ta_id = $_POST['tanggungan'];
                                    $ke_jenis_kelamin = $_POST['jenis-kelamin'];
                                    $ke_tanggal_lahir = $_POST['tanggal-lahir'];
                                    $ke_tanggal_menikah = $_POST['tanggal-menikah'];
                                    $ke_tunjangan = $_POST['tunjangan'];
                                    

                                    $sql = "INSERT INTO keluarga VALUES(0, '$id', '$ke_nama', '$ta_id', '$ke_jenis_kelamin', '$ke_tanggal_lahir', '$ke_tanggal_menikah', '$ke_tunjangan')";
                                    $query = $conn->query($sql);
                                    if ($query) {
                                        echo "
                                        <div class='alert alert-success'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Success!</strong> Data is successfully added.
                                        </div>";
                                        http_request($_ENV['BASE_URL'] . 'gpp/api/?kategori=keluarga&nip=' . $peg->pe_nip . '&nama=' . $peg->pe_nama . '&keterangan=Penambahan anggota keluarga');
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
                                    $ke_id = $_POST['ke_id'];
                                    $ke_nama = $_POST['nama-kel'];
                                    $ta_id = $_POST['tanggungan'];
                                    $ke_jenis_kelamin = $_POST['jenis-kelamin'];
                                    $ke_tanggal_lahir = $_POST['tanggal-lahir'];
                                    $ke_tanggal_menikah = $_POST['tanggal-menikah'];
                                    $ke_tunjangan = $_POST['tunjangan'];

                                    $sql = "UPDATE keluarga SET ke_nama='$ke_nama',ta_id='$ta_id',ke_jenis_kelamin='$ke_jenis_kelamin',ke_tanggal_lahir='$ke_tanggal_lahir',ke_tanggal_menikah='$ke_tanggal_menikah',ke_tunjangan='$ke_tunjangan' WHERE ke_id='$ke_id'";
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
                                    $ke_id = $_POST['ke_id'];
                                    $sql = "DELETE FROM keluarga WHERE ke_id='$ke_id'";
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
                            <a href="keluarga-add/<?php echo $id ?>" class="btn btn-default pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus-square fa-fw" aria-hidden="true"></i> Tambah Data</a>
                            <p class="text-muted">Pada halaman ini anda dapat mengelola data keluarga setiap pegawai.</p><br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Nama Anggota Keluarga</th>
                                            <th>Status Tanggungan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Tanggal Menikah</th>
                                            <th>Tunjangan</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM keluarga JOIN tanggungan USING(ta_id) WHERE pe_id='$id'";
                                            $query = $conn->query($sql);
                                            $check = $query->rowCount();
                                            if ($check >= 1) {
                                                while($data = $query->fetch(PDO::FETCH_OBJ)){
                                                    if ($data->ke_tanggal_menikah == '0000-00-00') {
                                                        $data->ke_tanggal_menikah = '-';
                                                    }
                                                    else{
                                                        $data->ke_tanggal_menikah = date("d/m/Y", strtotime($data->ke_tanggal_menikah));
                                                    }
                                                    echo '
                                                    <tr>
                                                    <td>'.$data->ke_nama.'</td>
                                                    <td>'.$data->ta_keterangan.'</td>
                                                    <td>'.$data->ke_jenis_kelamin.'</td>
                                                    <td>'.date("d/m/Y", strtotime($data->ke_tanggal_lahir)).'</td>
                                                    <td>'.$data->ke_tanggal_menikah.'</td>
                                                    <td>'.$data->ke_tunjangan.'</td>
                                                    <td>
                                                        <a href="keluarga-edit/'.$data->ke_id.'" class="btn btn-default waves-effect waves-light"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                                                    </td>
                                                    </tr>';
                                                }
                                            }
                                            else{
                                                echo "
                                                <tr>
                                                <td colspan='7' style='text-align:center;'>Table is empty</td>
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

