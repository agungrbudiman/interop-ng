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
                            <li><a href="pendidikan/<?php echo $path[3];?>">Riwayat Pendidikan</a></li>
                            <li class="active">Add Riwayat Pendidikan</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Add Riwayat Pendidikan</h3><br>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="pendidikan">
                                        <input type="hidden" name="pe_id" value="<?php echo $path[3];?>">
                                        <div class="form-group">
                                            <label class="col-sm-2">Tingkat Pendidikan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="jenjang">
                                                   <?php
                                                        
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
                                            <label class="col-sm-2">Negara</label>
                                            <div class="col-sm-10"><input type="text" name="negara" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Sekolah</label>
                                            <div class="col-sm-10"><input type="text" name="sekolah" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Tahun Lulus</label>
                                            <div class="col-sm-10"><input type="text" name="tahun-lulus" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">No Ijazah</label>
                                            <div class="col-sm-10"><input type="text" name="no-ijazah" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Jurusan</label>
                                            <div class="col-sm-10"><input type="text" name="jurusan" class="form-control"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Bidang</label>
                                            <div class="col-sm-10"><input type="text" name="bidang" class="form-control"></div>
                                            <br><br>
                                        </div>   
                                        <div class="form-group">
                                            <label class="col-sm-2">Gelar</label>
                                            <div class="col-sm-10"><input type="text" name="gelar" class="form-control"></div>
                                            <br><br>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3">Diakui BKN</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="bkn" value="Ya">Ya</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="bkn" value="Tidak">Tidak</label>
                                            <br>
                                        </div>
                                        <button type="submit" name="add" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                                        <a href="pendidikan/<?php echo $path[3];?>" class="btn btn-default waves-effect waves-light">Cancel</a>
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