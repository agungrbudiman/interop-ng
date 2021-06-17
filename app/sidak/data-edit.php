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
                            <li><a href="data">Data</a></li>
                            <li class="active">Edit Data</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Edit Data</h3><br>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <?php 
                                        
                                        if (isset($path[3])) {
                                            $id = $path[3];
                                            $sql = "SELECT * FROM pegawai WHERE pe_id='$id'";
                                            $query = $conn->query($sql);
                                            $edit = $query->fetch(PDO::FETCH_OBJ);
                                        }
                                    ?>
                                    <form method="post" action="data">
                                        <input type="hidden" name="pe_id" value="<?php echo $edit->pe_id;?>">
                                        <div class="form-group">
                                            <label class="col-sm-2">Nama</label>
                                            <div class="col-sm-10"><input type="text" name="nama" class="form-control" value="<?php echo $edit->pe_nama; ?>"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">NIP</label>
                                            <div class="col-sm-10"><input type="text" name="nip" class="form-control" value="<?php echo $edit->pe_nip; ?>"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Pangkat dan Golongan Ruang</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="pangkat">
                                                    <?php
                                                        
                                                        $sql = "SELECT*FROM pangkat";
                                                        $query = $conn->query($sql);
                                                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                                            if ($edit->pa_id == $data->pa_id) {
                                                                echo '
                                                                <option value='.$data->pa_id.' selected>'.$data->pa_keterangan.'</option>
                                                                ';
                                                            }
                                                            else{
                                                                echo ' 
                                                                <option value='.$data->pa_id.'>'.$data->pa_keterangan.'</option>
                                                                ';
                                                            }  
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <br><br>
                                        </div>     
                                        <div class="form-group">
                                            <label class="col-sm-2">Tempat Lahir</label>
                                            <div class="col-sm-10"><input type="text" name="tempat-lahir" class="form-control" value="<?php echo $edit->pe_tempat_lahir; ?>"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Tanggal Lahir</label>
                                            <div class="col-sm-10"><input type="date" name="tanggal-lahir" class="form-control" value="<?php echo $edit->pe_tanggal_lahir; ?>"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">Jenis Kelamin</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="jenis-kelamin" value="Laki-laki" <?php echo ($edit->pe_jenis_kelamin=='Laki-laki')?'checked':''?> >Laki-laki</label>
                                            <label class="radio-inline col-sm-2"><input type="radio" name="jenis-kelamin" value="Perempuan" <?php echo ($edit->pe_jenis_kelamin=='Perempuan')?'checked':''?>>Perempuan</label>
                                            <br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Agama</label>
                                            <div class="col-sm-10">
                                            <select class="form-control" name="agama">
                                               <?php
                                                    $sql = "SELECT*FROM agama";
                                                    $query = $conn->query($sql);
                                                    while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                                        echo '
                                                        <option value='.$data->ag_id.'>'.$data->ag_keterangan.'</option>
                                                        ';
                                                    }
                                                ?>
                                            </select>
                                            </div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Status Perkawinan</label>
                                            <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                                <?php
                                                    $sql = "SELECT*FROM status";
                                                    $query = $conn->query($sql);
                                                    while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                                        if ($edit->st_id == $data->st_id) {
                                                            echo '
                                                            <option value='.$data->st_id.' selected>'.$data->st_keterangan.'</option>
                                                            ';
                                                        }
                                                        else{
                                                            echo ' 
                                                            <option value='.$data->st_id.'>'.$data->st_keterangan.'</option>
                                                            ';
                                                        }  
                                                    }
                                                ?>
                                            </select>
                                            </div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">No.HP</label>
                                            <div class="col-sm-10"><input type="text" name="no-hp" class="form-control" value="<?php echo $edit->pe_no_hp; ?>"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Email</label>
                                            <div class="col-sm-10"><input type="email" name="email" class="form-control" value="<?php echo $edit->pe_email; ?>"></div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">No BPJS</label>
                                            <div class="col-sm-10"><input type="text" name="no-bpjs" class="form-control" value="<?php echo $edit->pe_no_bpjs; ?>"></div>
                                            <br><br>
                                        </div>   
                                        <div class="form-group">
                                            <label class="col-sm-2">Provinsi</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="provinsi" id="provinsi">
                                                <?php
                                                    $sql = "SELECT*FROM provinsi ORDER BY pr_nama ASC";
                                                    $query = $conn->query($sql);
                                                    while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                                        if ($edit->pr_id == $data->pr_id) {
                                                            $pr_id = $data->pr_id;
                                                            echo '
                                                            <option value='.$data->pr_id.' selected>'.$data->pr_nama.'</option>
                                                            ';
                                                        }
                                                        else{
                                                            echo ' 
                                                            <option value='.$data->pr_id.'>'.$data->pr_nama.'</option>
                                                            ';
                                                        }  
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Kota/Kabupaten</label>
                                            <div class="col-sm-10">          
                                                <select class="form-control" name="kabupaten" id="kabupaten">
                                                    <?php
                                                        $sql = "SELECT*FROM kabupaten WHERE pr_id ='" . $pr_id . "' ORDER BY kb_nama ASC";
                                                        $query = $conn->query($sql);
                                                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                                            if ($edit->kb_id == $data->kb_id) {
                                                                $kb_id = $data->kb_id;
                                                                echo '
                                                                <option value='.$data->kb_id.' selected>'.$data->kb_nama.'</option>
                                                                ';
                                                            }
                                                            else{
                                                                echo ' 
                                                                <option value='.$data->kb_id.'>'.$data->kb_nama.'</option>
                                                                ';
                                                            }  
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Kecamatan</label>
                                            <div class="col-sm-10">          
                                                <select class="form-control" name="kecamatan" id="kecamatan">
                                                    <?php
                                                        $sql = "SELECT*FROM kecamatan WHERE kb_id='" . $kb_id . "' ORDER BY kc_nama ASC";
                                                        $query = $conn->query($sql);
                                                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                                            if ($edit->kc_id == $data->kc_id) {
                                                                $kc_id = $data->kc_id;
                                                                echo '
                                                                <option value='.$data->kc_id.' selected>'.$data->kc_nama.'</option>
                                                                ';
                                                            }
                                                            else{
                                                                echo ' 
                                                                <option value='.$data->kc_id.'>'.$data->kc_nama.'</option>
                                                                ';
                                                            }  
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <br><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Kelurahan</label>
                                            <div class="col-sm-10">          
                                                <select class="form-control" name="kelurahan" id="kelurahan">
                                                    <?php
                                                        $sql = "SELECT*FROM kelurahan WHERE kc_id='" . $kc_id . "' ORDER BY kl_nama ASC";
                                                        $query = $conn->query($sql);
                                                        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                                                            if ($edit->kl_id == $data->kl_id) {
                                                                echo '
                                                                <option value='.$data->kl_id.' selected>'.$data->kl_nama.'</option>
                                                                ';
                                                            }
                                                            else{
                                                                echo ' 
                                                                <option value='.$data->kl_id.'>'.$data->kl_nama.'</option>
                                                                ';
                                                            }  
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <br><br>
                                        </div>                                       
                                        <div class="form-group">
                                            <label class="col-sm-2">Alamat</label>
                                            <div class="col-sm-10"><input type="text" name="alamat" class="form-control" value="<?php echo $edit->pe_alamat; ?>"></div>
                                            <br><br>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-2">Hobi</label>
                                            <div class="col-sm-10"><input type="text" name="hobi" class="form-control" value="<?php echo $edit->pe_hobi; ?>"></div>
                                            <br><br>
                                        </div>
                                        <button type="submit" name="edit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                                        <a href="data" class="btn btn-inverse waves-effect waves-light">Cancel</a>
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

        <script>
            $(document).ready(function () 
            {
                $("#provinsi").change(function () 
                {
                    var id_prov = $(this).val();
                    $.ajax({url: "alamat/?id_prov="+id_prov}).done(function(data){$("#kabupaten").html(data); $("#kabupaten").trigger("change")});
                });

                $("#kabupaten").change(function () 
                {
                    var id_kabupaten = $(this).val();
                    $.ajax({url: "alamat/?id_kabupaten="+id_kabupaten}).done(function(data){$("#kecamatan").html(data); $("#kecamatan").trigger("change")});
                });

                $("#kecamatan").change(function () 
                {
                    var id_kec = $(this).val();
                    $.ajax({url: "alamat/?id_kec="+id_kec}).done(function(data){$("#kelurahan").html(data);});
                });
            });


            var ajaxRequest;
            function getAjax()
            {
                try{
                    ajaxRequest = new XMLHttpRequest();
                }
                catch (e){
                    try{
                        ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                    }
                    catch (e){
                        try{
                            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        catch (e){
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }
            }
        </script>