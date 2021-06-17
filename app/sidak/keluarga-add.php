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
                            <li><a href="keluarga/<?php echo $_GET['id'];?>">Data Keluarga</a></li>
                            <li class="active">Tambah Data Keluarga</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Tambah Data Keluarga</h3><br>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="keluarga">
                                        <input type="hidden" name="pe_id" value="<?php echo $_GET['id'];?>">
                                        <div class="form-group">
                                            <label class="col-sm-2">Nama Anggota Keluarga</label>
                                            <div class="col-sm-10"><input type="text" name="nama-kel" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Status Tanggungan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="tanggungan">
                                                   <?php
                                                        require_once(__DIR__.'/lib/config.php');
                                                        $sql = "SELECT*FROM tanggungan";
                                                        $query = $conn->query($sql);
                                                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                                            echo '
                                                            <option value='.$data->ta_id.'>'.$data->ta_keterangan.'</option>
                                                            ';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <br><br>
                                        </div>     
                                        <div class="form-group">
                                            <label class="col-sm-3">Jenis Kelamin</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="jenis-kelamin" value="Laki-laki">Laki-laki</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="jenis-kelamin" value="Perempuan">Perempuan</label>
                                            <br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Tanggal Lahir</label>
                                            <div class="col-sm-10"><input type="date" name="tanggal-lahir" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Tanggal Menikah</label>
                                            <div class="col-sm-10"><input type="date" name="tanggal-menikah" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">Tunjangan</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="tunjangan" value="Ya">Ya</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="tunjangan" value="Tidak">Tidak</label>
                                            <br>
                                        </div> 
                                        <button type="submit" name="add" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                                        <a href="keluarga/<?php echo $_GET['id'];?>" class="btn btn-default waves-effect waves-light">Cancel</a>
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