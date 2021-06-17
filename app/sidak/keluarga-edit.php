        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <?php 
            require_once(__DIR__.'/lib/config.php');
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM keluarga WHERE ke_id='$id'";
                $query = $conn->query($sql);
                $edit = $query->fetch(PDO::FETCH_OBJ);
            }
        ?>
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
                            <li><a href="keluarga/<?php echo $edit->pe_id;?>">Data Keluarga</a></li>
                            <li class="active">Edit Data Keluarga</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Edit Data Keluarga</h3><br>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="keluarga">
                                        <input type="hidden" name="pe_id" value="<?php echo $edit->pe_id;?>">
                                        <input type="hidden" name="ke_id" value="<?php echo $edit->ke_id;?>">
                                        <div class="form-group">
                                            <label class="col-sm-2">Nama Anggota Keluarga</label>
                                            <div class="col-sm-10"><input type="text" name="nama-kel" class="form-control" value="<?php echo $edit->ke_nama; ?>"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Status Tanggungan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="tanggungan">
                                                    <?php
                                                        $sql = "SELECT*FROM tanggungan";
                                                        $query = $conn->query($sql);
                                                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                                            if ($edit->ta_id == $data->ta_id) {
                                                                echo '
                                                                <option value='.$data->ta_id.' selected>'.$data->ta_keterangan.'</option>
                                                                ';
                                                            }
                                                            else{
                                                                echo ' 
                                                                <option value='.$data->ta_id.'>'.$data->ta_keterangan.'</option>
                                                                ';
                                                            }  
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <br><br>
                                        </div>     
                                        <div class="form-group">
                                            <label class="col-sm-3">Jenis Kelamin</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="jenis-kelamin" value="Laki-laki" <?php echo ($edit->ke_jenis_kelamin=='Laki-laki')?'checked':''?> >Laki-laki</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="jenis-kelamin" value="Perempuan" <?php echo ($edit->ke_jenis_kelamin=='Perempuan')?'checked':''?>>Perempuan</label>
                                            <br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Tanggal Lahir</label>
                                            <div class="col-sm-10"><input type="date" name="tanggal-lahir" class="form-control" value="<?php echo $edit->ke_tanggal_lahir; ?>"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Tanggal Menikah</label>
                                            <div class="col-sm-10"><input type="date" name="tanggal-menikah" class="form-control" value="<?php echo $edit->ke_tanggal_menikah; ?>"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">Tunjangan</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="tunjangan" value="Ya" <?php echo ($edit->ke_tunjangan=='Ya')?'checked':''?> >Ya</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="tunjangan" value="Tidak" <?php echo ($edit->ke_tunjangan=='Tidak')?'checked':''?> >Tidak</label>
                                            <br>
                                        </div>
                                        <button type="submit" name="edit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                                        <a href="keluarga/<?php echo $edit->pe_id;?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                        <button type="submit" name="delete" class="btn btn-danger waves-effect waves-light m-r-10 pull-right">Delete</button>
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
