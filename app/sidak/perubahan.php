        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Ajukan Perubahan</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index">Home</a></li>
                            <li class="active">Ajukan Perubahan</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?php                           
                            $id = $_SESSION[$path[1] . 'id'];
                            $peg_sql = "SELECT * FROM pegawai JOIN pangkat USING(pa_id) WHERE pe_id=".$id;
                            $peg_query = $conn->query($peg_sql);
                            $peg = $peg_query->fetch(PDO::FETCH_OBJ);
                            // print_r($peg);
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
                    <div class="col-sm-4">
                        <div class="white-box analytics-info red-info">
                            <h3 class="box-title">Data Pegawai</h3>
                            <ul class="list-inline two-part">
                                <li><a href="<?php echo 'data-edit/' . $id ?>" class="btn btn-rounded btn-outline btn-default">Ubah Data</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="white-box analytics-info yellow-info">
                            <h3 class="box-title">Riwayat Kepangakatan</h3>
                            <ul class="list-inline two-part">
                                <li><a href="<?php echo 'kepangkatan-edit/' . $id ?>" class="btn btn-rounded btn-outline btn-default">Ubah Data</a></li>
                                <li class="text-right"><a href="<?php echo 'kepangkatan-add/' . $id ?>" class="btn btn-rounded btn-outline btn-default">Tambah Data</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="white-box analytics-info green-info">
                            <h3 class="box-title">Riwayat Jabatan</h3>
                            <ul class="list-inline two-part">
                                <li><a href="<?php echo 'jataban-edit/' . $id ?>" class="btn btn-rounded btn-outline btn-default">Ubah Data</a></li>
                                <li class="text-right"><a href="<?php echo 'jabatan-add/' . $id ?>" class="btn btn-rounded btn-outline btn-default">Tambah Data</a></li>
                            </ul>
                        </div>
                    </div>
                </div>    
                <div class="row">
                    <div class="col-sm-4">
                        <div class="white-box analytics-info blue-info">
                            <h3 class="box-title">Riwayat Pendidikan</h3>
                            <ul class="list-inline two-part">
                                <li><a href="<?php echo 'pendidikan-edit/' . $id ?>" class="btn btn-rounded btn-outline btn-default">Ubah Data</a></li>
                                <li class="text-right"><a href="<?php echo 'pendidikan-add/' . $id ?>" class="btn btn-rounded btn-outline btn-default">Tambah Data</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="white-box analytics-info purple-info">
                            <h3 class="box-title">Data Keluarga</h3>
                            <ul class="list-inline two-part">
                                <li><a href="<?php echo 'keluarga-edit/' . $id ?>" class="btn btn-rounded btn-outline btn-default">Ubah Data</a></li>
                                <li class="text-right"><a href="<?php echo 'keluarga-add/' . $id ?>" class="btn btn-rounded btn-outline btn-default">Tambah Data</a></li>
                            </ul>
                        </div>
                    </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->

