        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Data Pegawai</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index">Home</a></li>
                            <li class="active">Data Pegawai</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?php 
                            require_once(__DIR__.'/lib/config.php');
                            if (isset($_POST['add'])) {
                                $nama = $_POST['nama'];
                                $nip = $_POST['nip'];
                                $pangkat = $_POST['pangkat'];
                                $tempat_lahir = $_POST['tempat-lahir'];
                                $tanggal_lahir = $_POST['tanggal-lahir'];
                                $jenis_kelamin = $_POST['jenis-kelamin'];
                                $agama = $_POST['agama'];
                                $status = $_POST['status'];
                                $no_hp = $_POST['no-hp'];
                                $email = $_POST['email'];
                                $no_bpjs = $_POST['no-bpjs'];
                                $provinsi = $_POST['provinsi'];
                                $kabupaten = $_POST['kabupaten'];
                                $kecamatan = $_POST['kecamatan'];
                                $kelurahan = $_POST['kelurahan'];
                                $alamat = $_POST['alamat'];
                                $hobi = $_POST['hobi'];

                                $sql = "INSERT INTO pegawai VALUES('','$nama','$nip','$pangkat','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$status','$no_hp','$email','$no_bpjs','$provinsi','$kabupaten','$kecamatan','$kelurahan','$alamat','$hobi')";
                                $query = $conn->query($sql);
                                if ($query) {
                                    echo "
                                    <div class='alert alert-success'>
                                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                        <strong>Success!</strong> Data is successfully added.
                                    </div>";
                                }
                                else{
                                    echo "
                                    <div class='alert alert-danger'>
                                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                        <strong>Failed!</strong> Data is failed to add.
                                    </div>";
                                }
                            }
                            elseif (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $sql = "DELETE FROM pegawai WHERE pe_id='$id'";
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
                            elseif (isset($_POST['edit'])) {
                                $id = $_POST['pe_id'];
                                $nama = $_POST['nama'];
                                $nip = $_POST['nip'];
                                $pangkat = $_POST['pangkat'];
                                $tempat_lahir = $_POST['tempat-lahir'];
                                $tanggal_lahir = $_POST['tanggal-lahir'];
                                $jenis_kelamin = $_POST['jenis-kelamin'];
                                $agama = $_POST['agama'];
                                $status = $_POST['status'];
                                $no_hp = $_POST['no-hp'];
                                $email = $_POST['email'];
                                $no_bpjs = $_POST['no-bpjs'];
                                $provinsi = $_POST['provinsi'];
                                $kabupaten = $_POST['kabupaten'];
                                $kecamatan = $_POST['kecamatan'];
                                $kelurahan = $_POST['kelurahan'];
                                $alamat = $_POST['alamat'];
                                $hobi = $_POST['hobi'];

                                $sql = "UPDATE pegawai SET pe_nama = '$nama', pe_nip = '$nip', pa_id = '$pangkat', pe_tempat_lahir = '$tempat_lahir', pe_tanggal_lahir = '$tanggal_lahir', pe_jenis_kelamin = '$jenis_kelamin', ag_id = '$agama', st_id = '$status', pe_no_hp = '$no_hp', pe_email = '$email', pe_no_bpjs = '$no_bpjs', pr_id = '$provinsi', kb_id = '$kabupaten', kc_id = '$kecamatan', kl_id = '$kelurahan', pe_alamat = '$alamat', pe_hobi = '$hobi' WHERE pe_id = '$id'";
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
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <a href="data-add" class="btn btn-default pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus-square fa-fw" aria-hidden="true"></i> Add Data</a>
                            <p class="text-muted">Pada halaman ini anda dapat mengelola data pegawai.</p><br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Detail</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Pangkat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>Status</th>
                                            <th>No Hp</th>
                                            <th>Email</th>
                                            <th>Provinsi</th>
                                            <th>Kabupaten</th>
                                            <th>Kecamatan</th>
                                            <th>Kelurahan</th>
                                            <th>Alamat</th>
                                            <th>Hobi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql = "SELECT * FROM pegawai JOIN pangkat USING(pa_id) JOIN agama USING(ag_id) JOIN status USING(st_id) JOIN provinsi USING(pr_id) JOIN kabupaten USING(kb_id) JOIN kecamatan USING(kc_id) JOIN kelurahan USING(kl_id) ORDER BY pe_id";
                                            $query = $conn->query($sql);
                                            $check = $query->rowCount();
                                            if ($check >= 1) {
                                                while($data = $query->fetch(PDO::FETCH_OBJ)){
                                                    echo '
                                                    <tr>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-bars fa-fw" aria-hidden="true"></i><span class="caret"></span></button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="kepangkatan/'.$data->pe_id.'">Riwayat Kepangkatan</a></li>
                                                                <li><a href="pendidikan/'.$data->pe_id.'">Riwayat Pendidikan</a></li>
                                                                <li><a href="jabatan/'.$data->pe_id.'">Riwayat Jabatan</a></li>
                                                                <li><a href="keluarga/'.$data->pe_id.'">Data Keluarga</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>'.$data->pe_nama.'</td>
                                                    <td>'.$data->pe_nip.'</td>
                                                    <td>'.$data->pa_keterangan.'</td>
                                                    <td>'.$data->pe_jenis_kelamin.'</td>
                                                    <td>'.$data->ag_keterangan.'</td>
                                                    <td>'.$data->st_keterangan.'</td>
                                                    <td>'.$data->pe_no_hp.'</td>
                                                    <td>'.$data->pe_email.'</td>
                                                    <td>'.$data->pr_nama.'</td>
                                                    <td>'.$data->kb_nama.'</td>
                                                    <td>'.$data->kc_nama.'</td>
                                                    <td>'.$data->kl_nama.'</td>
                                                    <td>'.$data->pe_alamat.'</td>
                                                    <td>'.$data->pe_hobi.'</td>
                                                    <td>
                                                        <a href="data-edit/'.$data->pe_id.'" class="btn btn-default waves-effect waves-light"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                                                        <a href="data/'.$data->pe_id.'" class="btn btn-default waves-effect waves-light"><i class="fa fa-trash fa-fw" aria-hidden="true"></i></a>
                                                    </td>
                                                    </tr>';
                                                }
                                            }
                                            else{
                                                echo "
                                                <tr>
                                                <td colspan='16' style='text-align:center;'>Table is empty</td>
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

