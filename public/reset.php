<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once __DIR__ . '/lib/lib-plugins.php'; ?> 
</head>
<body>
    <section id="wrapper" class="new-login-register">
        <div class="lg-info-panel">
            <div class="inner-panel"></div>
        </div>
        <div class="new-login-box">
            <div class="white-box">
                <?php 
                    define(LIB_DIR, './lib/');
                    require_once(LIB_DIR . 'config.php');
                    
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM user WHERE us_password='$id'";
                        $query = $conn->query($sql);
                        $data = $query->fetch(PDO::FETCH_OBJ);
                    }
                ?>
                <form class="form-horizontal new-lg-form" id="loginform" action="reset" method="post">
                    <input type="hidden" name="id" value="<?php echo $data->us_id;?>">     
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Reset Password</h3>
                            <p class="text-muted">Hi, <?php echo $data->us_email; ?>! Please enter your new password :</p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label id="hasil"></label>
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="New Password" name="newpass" id="pass" required="" onkeyup="validasi(event,1)" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label id="cocok"></label>
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Retype New Password" name="newpass2" id="pass" required="" onkeyup="validasi(event,2)" />
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="reset">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

<script type="text/javascript">
    var ajaxRequest;

    function getAjax()  //mengecek apakah web browser support AJAX atau tidak
    {
       try
       {
            // Opera 8.0+, Firefox, Safari
            ajaxRequest = new XMLHttpRequest();
       }
       catch (e)
       {
            // Internet Explorer Browsers
            try
            {
                 ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e)
            {
                 try
                 {
                       ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                 }
                 catch (e)
                 {
                       // Something went wrong
                       alert("Your browser broke!");
                       return false;
                 }
            }
       }
    }

    function validasi (keyEvent,pilihan) //fungsi untuk mengambil nilai setiap huruf yang dimasukkan
    {
       keyEvent = (keyEvent) ? keyEvent: window.event;
       input = (keyEvent.target) ? keyEvent.target: keyEvent.srcElement;
       if (input.value) //jika input dimasukkan, masuk ke fungsi cekEmail
       {
            if (pilihan == 1)
            {
                cekPass("user-pass.php?password=1&input=" + input.value,1); //mengirim inputan ke file cekpass
            }
            else if (pilihan == 2)
            {
                pass = document.getElementById("pass").value; //mengambil nilai dari form password yang telah dicek
                cekPass("user-pass.php?password=2&re-password=" + pass + "&input=" + input.value,2);  //mengirim inputan konfirmasi password
            }
       }
    }

    function cekPass(fileCek,keterangan) //fungsi untuk menampilkan hasil pengecekan
    {
       getAjax();
       ajaxRequest.open("GET",fileCek);
       ajaxRequest.onreadystatechange = function()
       {
            if (keterangan == 1)
            {
                document.getElementById("hasil").innerHTML = ajaxRequest.responseText; //hasil cek kekuatan password
            }
            else if (keterangan == 2)
            {
                document.getElementById("cocok").innerHTML = ajaxRequest.responseText; //hasil cek konfirmasi password
            }
       }
       ajaxRequest.send(null);
    }
</script>

<?php 
    define(LIB_DIR, './lib/');
    require_once(LIB_DIR . 'config.php');
    require_once "lib/lib-chiper.php";
    $cipher = new Cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $key = "Z%$!@uew?RoI3taID3;b47%52#4!*F0bQhB2EP$yh!Wi4k";

    if (isset($_POST['reset'])) {
        $id= $_POST['id'];
        $sql = "SELECT * FROM user WHERE us_id='$id'";
        $query = $conn->query($sql);
        $data = $query->fetch(PDO::FETCH_OBJ);
        $password = $_POST['newpass'];
        $re_password = $_POST['newpass2'];
        $encrypt = $cipher->encrypt($re_password, $key);
        
        if($password != $re_password) {
            echo "<script type='text/javascript'>alert('Failed! Password not match, please input again.'); location.replace('http://bambini.sch.id/webadmin/reset/$data->us_password');</script>";
        }
        else{
            $sql = "UPDATE user SET us_password = '$encrypt' WHERE us_id = '$id'";
            $query = $conn->query($sql);
            if ($query) {
                echo "<script type='text/javascript'>alert('Success! The password has been reset.'); location.replace('http://bambini.sch.id/webadmin/');</script>";
            }
            else{
                echo "<script type='text/javascript'>alert('Failed! The password failed to reset.'); location.replace('http://bambini.sch.id/webadmin/reset/$data->us_password');</script>";
            }
        }
    }
?>