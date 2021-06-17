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
                            <li><a href="jabatan/<?php echo $_GET['id'];?>">Riwayat Jabatan</a></li>
                            <li class="active">Add Riwayat Jabatan</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Add Riwayat Jabatan</h3><br>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="jabatan">
                                        <input type="hidden" name="pe_id" value="<?php echo $_GET['id'];?>">
                                        <div class="form-group">
                                            <label class="col-sm-3">Jenis Instansi</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="jenis-instansi" value="Internal">Internal</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="jenis-instansi" value="Eksternal">Eksternal</label>
                                            <br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Eselon</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="eselon">
                                                   <?php
                                                        require_once(__DIR__.'/lib/config.php');
                                                        $sql = "SELECT*FROM pangkat";
                                                        $query = $conn->query($sql);
                                                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                                            echo '
                                                            <option value='.$data->pa_id.'>'.substr($data->pa_keterangan,0,5).'</option>
                                                            ';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Nama Jabatan</label>
                                            <div class="col-sm-10"><input type="text" name="nama-jabatan" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Nama Unit</label>
                                            <div class="col-sm-10"><input type="text" name="nama-unit" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">Status Jabatan</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="status-jabatan" value="Definitif">Definitif</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="status-jabatan" value="Pelaksana Tugas">Pelaksana Tugas</label>
                                            <br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">TMT Golongan</label>
                                            <div class="col-sm-10"><input type="date" name="tmt-golongan" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Nomor SK Pengangkatan</label>
                                            <div class="col-sm-10"><input type="text" name="no-sk-pengangkatan" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Tanggal SK Pengangkatan</label>
                                            <div class="col-sm-10"><input type="date" name="tanggal-sk-pengangkatan" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">TMT Pengangkatan</label>
                                            <div class="col-sm-10"><input type="date" name="tmt-pengangkatan" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">Aktif Jabatan</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="aktif-jabatan" value="Aktif">Aktif</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="aktif-jabatan" value="Non Aktif">Non Aktif</label>
                                            <br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Nomor SK Pemberhentian</label>
                                            <div class="col-sm-10"><input type="text" name="no-sk-pemberhentian" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Tanggal SK Pemberhentian</label>
                                            <div class="col-sm-10"><input type="date" name="tanggal-sk-pemberhentian" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">TMT Pemberhentian</label>
                                            <div class="col-sm-10"><input type="date" name="tmt-pemberhentian" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <button type="submit" name="add" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                                        <a href="jabatan/<?php echo $_GET['id'];?>" class="btn btn-default waves-effect waves-light">Cancel</a>
                                    </form>
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

