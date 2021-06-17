<?php 
    require_once(__DIR__.'/lib/config.php');

    if(isset($_GET['id_prov']))
    {
          $id_prov = $_GET['id_prov'];
          $sql = "SELECT  * FROM kabupaten WHERE pr_id ='$id_prov' ORDER BY kb_nama ASC";
          $query = $conn->query($sql);
          $check = $query->rowCount();
          if ($check >= 1) {
               while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value='.$data->kb_id.'>'.$data->kb_nama.'</option>';
               }
          }
    }
    elseif(isset($_GET['id_kabupaten']))
    {
          $id_kabupaten = $_GET['id_kabupaten'];
          $sql = "SELECT  * FROM kecamatan WHERE kb_id ='$id_kabupaten' ORDER BY kc_nama ASC";
          $query = $conn->query($sql);
          $check = $query->rowCount();
          if ($check >= 1) {
               while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value='.$data->kc_id.'>'.$data->kc_nama.'</option>';
               }
          }
    }
    elseif(isset($_GET['id_kec']))
    {
          $id_kec = $_GET['id_kec'];
          $sql = "SELECT  * FROM kelurahan WHERE kc_id ='$id_kec' ORDER BY kl_nama ASC";
          $query = $conn->query($sql);
          $check = $query->rowCount();
          if ($check >= 1) {
               while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value='.$data->kl_id.'>'.$data->kl_nama.'</option>';
               }
          }
    }

    //dari commit #a68c2be05893bef63c953b0c9fa680c54798febf
    // switch ($_GET['jenis']) {
    //       //ambil data kota / kabupaten
    //       case 'kota':
    //       $id_provinces = $_POST['id_provinces'];
    //       if($id_provinces == ''){
    //            exit;
    //       }else{
    //            $getcity = mysqli_query($con,"SELECT  * FROM regencies WHERE province_id ='$id_provinces' ORDER BY name ASC") or die ('Query Gagal');
    //            while($data = mysqli_fetch_array($getcity)){
    //                 echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
    //            }
    //            exit;    
    //       }
    //       break;
    //       //ambil data kecamatan
    //       case 'kecamatan':
    //       $id_regencies = $_POST['id_regencies'];
    //       if($id_regencies == ''){
    //            exit;
    //       }else{
    //            $getcity = mysqli_query($con,"SELECT  * FROM districts WHERE regency_id ='$id_regencies' ORDER BY name ASC") or die ('Query Gagal');
    //            while($data = mysqli_fetch_array($getcity)){
    //                 echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
    //            }
    //            exit;    
    //       }
    //       break;
    //       //ambil data kelurahan
    //       case 'kelurahan':
    //       $id_district = $_POST['id_district'];
    //       if($id_district == ''){
    //            exit;
    //       }else{
    //            $getcity = mysqli_query($con,"SELECT  * FROM villages WHERE district_id ='$id_district' ORDER BY name ASC") or die ('Query Gagal');
    //            while($data = mysqli_fetch_array($getcity)){
    //                 echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
    //            }
    //            exit;    
    //       }
    //       break;
    //  }
?>