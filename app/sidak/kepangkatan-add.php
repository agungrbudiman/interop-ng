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
                            <li><a href="kepangkatan/<?php echo $_GET['id'];?>">Riwayat Kepangkatan</a></li>
                            <li class="active">Add Riwayat Kepangkatan</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Add Riwayat Kepangkatan</h3><br>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="kepangkatan">
                                        <input type="hidden" name="pe_id" value="<?php echo $_GET['id'];?>">
                                        <div class="form-group">
                                            <label class="col-sm-2">Jenis Kepangkatan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="jenis-kepangkatan">
                                                   <?php
                                                        require_once(__DIR__.'/lib/config.php');
                                                        $sql = "SELECT*FROM jenis_kepangkatan";
                                                        $query = $conn->query($sql);
                                                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                                            echo '
                                                            <option value='.$data->jp_id.'>'.$data->jp_keterangan.'</option>
                                                            ';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Nomor SK</label>
                                            <div class="col-sm-10"><input type="text" name="no-sk" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Oleh</label>
                                            <div class="col-sm-10"><input type="text" name="oleh" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Tanggal SK</label>
                                            <div class="col-sm-10"><input type="date" name="tanggal-sk" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Pendidikan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="pendidikan">
                                                   <?php
                                                        require_once(__DIR__.'/lib/config.php');
                                                        $sql = "SELECT*FROM tingkat_pendidikan";
                                                        $query = $conn->query($sql);
                                                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                                            echo '
                                                            <option value='.$data->tp_id.'>'.$data->tp_jenjang.'</option>
                                                            ';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Golongan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="golongan">
                                                   <?php
                                                        require_once(__DIR__.'/lib/config.php');
                                                        $sql = "SELECT*FROM pangkat";
                                                        $query = $conn->query($sql);
                                                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                                            echo '
                                                            <option value='.$data->pa_id.'>'.$data->pa_keterangan.'</option>
                                                            ';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">TMT Golongan</label>
                                            <div class="col-sm-10"><input type="date" name="tmt-golongan" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Tahun Masa Kerja</label>
                                            <div class="col-sm-10"><input type="text" name="tahun-masa-kerja" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Bulan Masa Kerja</label>
                                            <div class="col-sm-10"><input type="text" name="bulan-masa-kerja" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Nomor BKN</label>
                                            <div class="col-sm-10"><input type="text" name="no-bkn" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Tanggal BKN</label>
                                            <div class="col-sm-10"><input type="date" name="tanggal-bkn" class="form-control"></div>
                                            <br><br>
                                        </div>    
                                        <div class="form-group">
                                            <label class="col-sm-2">Gaji Pokok</label>
                                            <div class="col-sm-10"><input type="text" name="gaji" class="form-control"></div>
                                            <br><br>
                                        </div>       
                                        <button type="submit" name="add" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                                        <a href="kepangkatan/<?php echo $_GET['id'];?>" class="btn btn-default waves-effect waves-light">Cancel</a>
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

