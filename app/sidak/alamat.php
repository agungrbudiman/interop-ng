<?php 
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
?>