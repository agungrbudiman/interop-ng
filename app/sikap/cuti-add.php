<?php
    $stmt = $conn->prepare("SELECT pe_id,pe_nama from pegawai ORDER BY pe_nama ASC");
    $stmt->execute();
    $pegawai = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("SELECT * from jenis_cuti ORDER BY id DESC");
    $stmt->execute();
    $kategori = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="tambahkategori">
    <div class="modal-dialog" role="document">
        <form id="form-kategoricuti" action='api' method="post">
        <div class="modal-content">
            <div class="modal-body">
                <div id="alert-success" class="alert alert-success" role="alert" style="display: none">
                    <strong>Berhasil!</strong>
                </div>
                <div id="alert-danger" class="alert alert-danger" role="alert" style="display: none">
                    <strong>Gagal!</strong>
                </div>
                <label>Kategori Cuti</label>
                <input type="text" id="add-kategoricuti" name="add-kategoricuti" value="true" hidden>
                <input id="kategori" type="text" name="kategori" class="form-control" value="" placeholder="Cuti Tahunan">
            </div>
            <div class="modal-footer">
                <button id="btn-tutup" type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button id="btn-simpan" type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href=".">Home</a></li>
                    <li><a href="cuti">Cuti</a></li>
                    <li class="active">Pengajuan Cuti</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Pengajuan Cuti</h3><br>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                                <form id="form-addcuti" class="form card-body" action="api" method="post">
                                    <input type="text" id="add-cuti" name="add-cuti" value="true" hidden>
                                    <div class="form-group">
                                        <label>Pegawai</label>
                                        <select class="form-control" id="pegawai" name="pegawai">
                                            <?php foreach($pegawai as $row) { ?>
                                                <option value="<?php echo $row['pe_id']; ?>"><?php echo $row['pe_nama']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control" id="cuti_id" name="cuti_id">
                                            <?php foreach($kategori as $row) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['cuti_val']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <button type="button" class="btn btn-link" aria-label="Left Align" style="padding-left: 0;" data-toggle="modal" data-target="#tambahkategori">Tambah Kategori</button>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mulai</label>
                                        <input type="date" class="form-control" id="mulai" name="mulai" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Berakhir</label>
                                        <input type="date" class="form-control" id="berakhir" name="berakhir" value="<?php $tomorrow = new DateTime('tomorrow'); echo $tomorrow->format('Y-m-d') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Durasi</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" id="durasi" name="durasi" value="1">
                                            <span class="input-group-addon">hari</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat</label>
                                        <textarea rows="5" class="form-control" id="alamat" name="alamat" placeholder="Jl. Garuda Nomor 17"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Keterangan</label>
                                        <textarea rows="5" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan tambahan jika ada"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File Pendukung</label>
                                        <input type="file" id="filependukung" name="pendukung">
                                    </div> 
                                    <a href="cuti"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $us_id = $_SESSION['id'];
    $jenis_cuti = $_POST['jenis_cuti'];
    $jenis_cuti_val = $_POST['jenis_cuti_val'];
    $durasi = $_POST['durasi'];
    $cuti_start = $_POST['cuti_start'];
    $cuti_end = $_POST['cuti_end'];
    $alamat = $_POST['alamat'];
    $keterangan = $_POST['keterangan'];
    $kategori = $_POST['kategori'];

    if (empty($kategori)) {
        $sql = "INSERT INTO cuti VALUES('0','$us_id','$jenis_cuti','$jenis_cuti_val','0','$durasi','$cuti_start','$cuti_end','$alamat','$keterangan')";
    }
    else {
        $sql = "INSERT INTO jenis_cuti VALUES('0','$kategori')";
    }
    $query = $conn->query($sql);
    if ($query == FALSE) {

    }
}
?>
<script>
$("#form-addcuti, #form-addizin").submit(function (e){
    e.preventDefault();
    var values = $(this).serialize();
    $.ajax({
        url: 'api',
        type: 'POST',
        data: values,
        success: function(){
            alert("Pengajuan Berhasil");
        },
        error: function(){
            alert("Pengajuan Gagal");
        }
    });
});

$("#form-kategoricuti, #form-kategoriizin").submit(function (e){
    e.preventDefault();
    var values = $(this).serialize();
    $.ajax({
        url: 'api',
        type: 'POST',
        data: values,
        success: function(data){
            $("#alert-success").show();
            $("#btn-simpan").prop("disabled", true);
            $("#cuti_id, #izin_id").html(data);
        },
        error: function(){
            $("#alert-danger").show();
        }
    });
});

$("#durasi").change(function(){
    var end_date = addDays($("#mulai").val(),parseInt($("#durasi").val()));
    $("#berakhir").val(formatDate(end_date));
});
$("#berakhir, #mulai").change(function(){
    var start_date = new Date($("#mulai").val());
    var end_date = new Date($("#berakhir").val());
    var days = (end_date-start_date)/(1000*60*60*24);
    $("#durasi").val(days);
});

function addDays(date, days) {
      var result = new Date(date);
      result.setDate(result.getDate() + days);
      return result;
}
function formatDate(date) {
    var result_date = date.getFullYear() + '-'
         + ('0' + (date.getMonth()+1)).slice(-2) + '-'
         + ('0' + date.getDate()).slice(-2);
    return result_date;
}
</script>